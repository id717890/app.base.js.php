using System;
using System.Collections.Generic;
using System.Threading.Tasks;
using AutoMapper;
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Cors;
using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Options;
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
    public class GiftDrawController : ControllerBase
    {
        private readonly IGiftDrawService _giftDrawService;
        private readonly IMessageModelBuilder _messageModelBuilder;
        private readonly IMapper _mapper;
        private readonly RoleOptions _roleOptions;

        public GiftDrawController(IGiftDrawService giftDrawService, IMessageModelBuilder messageModelBuilder, IMapper mapper, 
            IOptions<RoleOptions> roleOptions
            )
        {
            _giftDrawService = giftDrawService;
            _messageModelBuilder = messageModelBuilder;
            _mapper = mapper;
            _roleOptions = roleOptions.Value;
        }

        [HttpGet, AllowAnonymous]
        public async Task<IActionResult> Get()
        {
            try
            {
                var giftDraws = _mapper.Map<IEnumerable<GiftDraw>, IEnumerable<GiftViewModel.GiftDraw>>(
                    await _giftDrawService.GetAllGifts());
                foreach (var giftDraw in giftDraws)
                {
                    giftDraw.Reached = await _giftDrawService.GetTotalReachedByGiftDraw(giftDraw.IdRow);
                }
                return Ok(giftDraws); ;
            }
            catch (Exception e)
            {
                Log.Error(e, "GiftDrawController.Get");
                return BadRequest(_messageModelBuilder.CreateModel("500", e.Message));
            }
        }

        [HttpPost, Authorize(Roles = Config.AdminRole), Route("takerandomkeyofgiftdraw")] 
        public async Task<IActionResult> TakeRandomKeyOfGiftDraw([FromBody]GiftViewModel.GiftDrawId model)
        {
            try
            {
                var giftDraw = await _giftDrawService.FindGiftDrawById(model.Id);
                if (giftDraw == null) return NotFound(_messageModelBuilder.CreateModel("404", "ID приза не найден"));
                var data = await _giftDrawService.TakeRandomWinnerKeyOfGiftDraw(model.Id);
                return Ok(new { winner = data.Item1, keys = data.Item2 });
            }
            catch (Exception e)
            {
                Log.Error(e, "GiftDrawController.TakeRandomKeyOfGiftDraw");
                return BadRequest(_messageModelBuilder.CreateModel("500", e.Message));
            }
        }

        [HttpGet, Authorize(Roles = Config.AdminRole), Route("getallforadmin")]
        public async Task<IActionResult> GetAllForAdmin()
        {
            try
            {
                var giftDraws = _mapper.Map<IEnumerable<GiftDraw>, IEnumerable<GiftViewModel.GiftDraw>>(
                    await _giftDrawService.GetAllGiftsForAdmin());
                foreach (var giftDraw in giftDraws)
                {
                    giftDraw.Reached = await _giftDrawService.GetTotalReachedByGiftDraw(giftDraw.IdRow);
                }
                return Ok(giftDraws);
            }
            catch (Exception e)
            {
                Log.Error(e, "GiftDrawController.GetAllForAdmin");
                return BadRequest(_messageModelBuilder.CreateModel("500", e.Message));
            }
        }

        [HttpPost("savewinner/{id}"), Authorize(Roles = Config.AdminRole)]
        public async Task<IActionResult> SaveWinner(long id, [FromBody]GiftViewModel.GiftDrawWinnerKey model)
        {
            try
            {
                var giftDraw = await _giftDrawService.FindGiftDrawById(id);
                if (giftDraw == null) return NotFound(_messageModelBuilder.CreateModel("404", "ID приза не найден"));
                await _giftDrawService.SetWinnerOfGiftDraw(id, model.Key);
                return Ok();
            }
            catch (Exception e)
            {
                Log.Error(e, "GiftDrawController.SaveWinner (GiftDrawWinnerKey)");
                return BadRequest(_messageModelBuilder.CreateModel("500", e.Message));
            }
        }
    }
}