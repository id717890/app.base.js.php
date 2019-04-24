using System;
using System.Globalization;
using System.Threading.Tasks;
using AutoMapper;
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Mvc;
using Raffle.Api.ViewModels;
using Raffle.Domain.Interface.Entity;
using Raffle.Domain.Interface.Services;
using Raffle.Infrastructure.Interface;
using Raffle.Infrastructure;
using Microsoft.Extensions.Options;
using Raffle.Api.Models.ConfigOptions;
using System.Text.RegularExpressions;
using Microsoft.AspNetCore.Identity;
using Serilog;

namespace Raffle.Api.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class PayController : ControllerBase
    {
        private readonly IMessageModelBuilder _messageModelBuilder;
        private readonly IOrderService _orderService;
        private readonly IMapper _mapper;
        private readonly UserManager<ApplicationUser> _userManager;
        private readonly IGiftDrawService _giftDrawService;
        private readonly IGiftDrawUserService _giftDrawUserService;


        public YandexMoneySecretOptions Options { get; } //set only via Secret Manager

        public PayController(
            IMessageModelBuilder messageModelBuilder,
            IOrderService orderService,
            IMapper mapper,
            IOptions<YandexMoneySecretOptions> options,
            UserManager<ApplicationUser> userManager,
            IGiftDrawService giftDrawService,
            IGiftDrawUserService giftDrawUserService)
        {
            _messageModelBuilder = messageModelBuilder;
            _orderService = orderService;
            _mapper = mapper;
            _userManager = userManager;
            _giftDrawService = giftDrawService;
            _giftDrawUserService = giftDrawUserService;
            Options = options.Value;
            _userManager = userManager;
        }

        /// <summary>
        /// Парсит строку label пришедшую из Yandex HTTP уведомления и возвращает кортеж значений (string userId, long id)
        /// </summary>
        /// <param name="label"></param>
        /// <returns></returns>
        private static (string, long) ParseLabel(string label)
        {
            var pattern = @"\[(.*?)\]";
            var matches = Regex.Matches(label, pattern);
            string userId = null;
            try
            {
                userId = matches[0].Groups[1].Value;
            }
            catch { /* ignore */ }
            long id = 0;
            try
            {
                Int64.TryParse(matches[1].Groups[1].Value, out id);
            }
            catch { /* ignore */ }
            return (userId, id);
        }


        [HttpPost, AllowAnonymous, Route("notify")]
        public async Task<IActionResult> Notify([FromForm]OrderViewModel.YandexHttpNotify model)
        {
            try
            {
                var order = _mapper.Map<Order>(model);
                var str =
                    model.notification_type + "&"
                    + model.operation_id + "&"
                    + model.amount + "&"
                    + model.currency + "&"
                    + model.datetime + "&"
                    + model.sender + "&"
                    + model.codepro.ToString().ToLower() + "&"
                    + Options.YandexMoneySecret + "&"
                    + model.label;
                order.YandexString = str;
                order.Sha1HashServer = SHA1HexProvider.SHA1HashStringForUTF8String(str);

                // Если SHA1 от Яндекса не равен SHA1 сгенерированный из полей то ошибка
                if (model.sha1_hash != order.Sha1HashServer)
                {
                    order.Errors = "Sha1 Hash not correct; ";
                }
                else
                {
                    // Label не должен быть пустой
                    if (!string.IsNullOrEmpty(order.Label))
                    {
                        var tupleUserIdGiftId = ParseLabel(order.Label);
                        if (string.IsNullOrEmpty(tupleUserIdGiftId.Item1))
                        {
                            order.Errors = "Can`t parse userId from label; ";
                        }
                        else if (tupleUserIdGiftId.Item2 == 0)
                        {
                            order.Errors += "Can`t parse giftId from label; ";
                        }
                        else
                        {
                            var user = await _userManager.FindByIdAsync(tupleUserIdGiftId.Item1);
                            var giftDraw = await _giftDrawService.FindGiftDrawById(tupleUserIdGiftId.Item2);
                            if (user == null) order.Errors += "Can`t find user; ";
                            if (giftDraw == null) order.Errors += "Can`t find gift; ";
                            if (giftDraw != null && user != null)
                            {
                                if (!Decimal.TryParse(order.WithdrawAmount, NumberStyles.Number, CultureInfo.InvariantCulture, out var withdrawAmount))
                                {
                                    order.Errors += "Error during TryParse WithdrawAmount; ";
                                }
                                else
                                {
                                    var giftDrawUser = await _giftDrawUserService.FindGiftDrawUserByGiftIdAndUser(giftDraw.Id, user.Id);
                                    if (giftDrawUser == null)
                                    {
                                        var giftDrawUserId = await _giftDrawUserService.CreateGiftDrawUser(giftDraw.Id, user.Id);
                                        if (giftDrawUserId > 0)
                                        {
                                            var countKeys = (int)(withdrawAmount / giftDraw.PriceKey);
                                            await _giftDrawUserService.CreateKeysForGiftDrawUser(giftDrawUserId, countKeys);
                                        }
                                        else
                                        {
                                            order.Errors += "Error during create new giftDrawUser; ";
                                        }
                                    }
                                    else
                                    {
                                        var countKeys = (int)(withdrawAmount / giftDraw.PriceKey);
                                        await _giftDrawUserService.CreateKeysForGiftDrawUser(giftDrawUser.Id, countKeys);
                                    }
                                }
                            }
                        }
                    }
                    else
                    {
                        order.Errors = "Label is empty; ";
                    }
                }
                await _orderService.CreateAsync(order);
                return Ok();
            }
            catch (Exception e)
            {
                Log.Error(e, "PayController.Notify", model);
                return BadRequest(_messageModelBuilder.CreateModel("500", e.Message));
            }
        }
    }
}