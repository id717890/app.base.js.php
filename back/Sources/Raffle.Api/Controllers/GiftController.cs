using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using AutoMapper;
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Options;
using Newtonsoft.Json;
using Raffle.Api.Models.ConfigOptions;
using Raffle.Api.ViewModels;
using Raffle.Domain.Interface.Entity;
using Raffle.Domain.Interface.Services;
using Raffle.Infrastructure.Interface;
using Serilog;

namespace Raffle.Api.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    [Authorize]
    public class GiftController : ControllerBase
    {
        private readonly IGiftService _giftService;
        private readonly IMessageModelBuilder _messageModelBuilder;
        private readonly IMapper _mapper;
        private readonly RoleOptions _roleOptions;

        public GiftController(IGiftService giftService, IMessageModelBuilder messageModelBuilder, IMapper mapper,
            IOptions<RoleOptions> roleOptions
            )
        {
            _giftService = giftService;
            _messageModelBuilder = messageModelBuilder;
            _mapper = mapper;
            _roleOptions = roleOptions.Value;
        }

        [HttpGet, Authorize(Roles = Config.AdminRole), Route("getallforadmin")]
        public async Task<IActionResult> GetAllForAdmin()
        {
            try
            {
                var gifts = _mapper.Map<IEnumerable<Gift>, IEnumerable<GiftViewModel.GiftView>>(
                    await _giftService.GetAllGiftsForAdmin());
                return Ok(gifts);
            }
            catch (Exception e)
            {
                Log.Error(e, "GiftController.GetAllForAdmin");
                return BadRequest(_messageModelBuilder.CreateModel("500", e.Message));
            }
        }

        [HttpPost("save/{id}"), Authorize(Roles = Config.AdminRole)]
        public async Task<IActionResult> Save(long id, [FromBody]GiftViewModel.GiftView model)
        {
            try
            {
                var gift = await _giftService.FindGiftById(id);
                if (gift == null) return NotFound(_messageModelBuilder.CreateModel("404", "ID приза не найден"));
                await _giftService.UpdateGift(_mapper.Map<GiftViewModel.GiftView, Gift>(model));
                return Ok();
            }
            catch (Exception e)
            {
                Log.Error(e, $"GiftController.Save model({0})", JsonConvert.SerializeObject(model));
                return BadRequest(_messageModelBuilder.CreateModel("500", e.Message));
            }
        }

        [HttpDelete("{id}"), Authorize(Roles = Config.AdminRole)]
        public async Task<IActionResult> Delete (long id)
        {
            try
            {
                var gift = await _giftService.FindGiftById(id);
                if (gift == null) return NotFound(_messageModelBuilder.CreateModel("404", "ID приза не найден"));
                await _giftService.DeleteGift(id);
                return Ok();
            }
            catch (Exception e)
            {
                Log.Error(e, $"GiftController.Delete giftId = {0}", id);
                return BadRequest(_messageModelBuilder.CreateModel("500", e.Message));
            }
        }
    }
}