using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using AutoMapper;
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Mvc;
using Raffle.Api.ViewModels;
using Raffle.Domain.Interface.Entity;
using Raffle.Domain.Interface.Services;
using Raffle.Infrastructure.Interface;
using Serilog;

namespace Raffle.Api.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class GiftDrawUserController : ControllerBase
    {
        private readonly IGiftDrawUserService _giftDrawUserService;
        private readonly IGiftDrawService _giftDrawService;
        private readonly IMessageModelBuilder _messageModelBuilder;
        private readonly IMapper _mapper;



        public GiftDrawUserController(IGiftDrawUserService giftDrawUserService, IMessageModelBuilder messageModelBuilder, IMapper mapper, IGiftDrawService giftDrawService)
        {
            _giftDrawUserService = giftDrawUserService;
            _messageModelBuilder = messageModelBuilder;
            _mapper = mapper;
            _giftDrawService = giftDrawService;
        }

        [Authorize, HttpGet, Route("{userId}")]
        public async Task<IActionResult> Get(string userId)
        {
            try
            {
                var giftDrawUser = _mapper.Map<IEnumerable<GiftDrawUser>, IEnumerable<GiftViewModel.GiftDrawUserView>>(await _giftDrawUserService.GetGiftDrawUserByUserId(userId));
                foreach (var gift in giftDrawUser)
                {
                    gift.Reached = await _giftDrawService.GetTotalReachedByGiftDraw(gift.IdGiftDraw);
                    gift.IsWin = gift.Keys.Any(x => x.Key == gift.WinnerKey);
                }
                return Ok(giftDrawUser);
            }
            catch (Exception e)
            {
                Log.Error(e, "GiftDrawUserController.Get", userId);
                return BadRequest(_messageModelBuilder.CreateModel("500", e.Message));
            }
        }

    }
}