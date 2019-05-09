using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using App.Domain.Interface.Entity;
using App.Domain.Interface.Services;
using AutoMapper;
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Cors;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Identity;
using Microsoft.AspNetCore.Mvc;
using App.Api.ViewModels;
using Raffle.Infrastructure.Interface;
using Serilog;

namespace App.Api.Controllers
{
    [Route("api/[controller]")]
    [ApiController, Authorize]
    public class UserController : ControllerBase
    {
        private readonly IMessageModelBuilder _messageModelBuilder;
        private readonly IMapper _mapper;
        private readonly UserManager<ApplicationUser> _userManager;
        private readonly IAuthService _authService;

        public UserController(UserManager<ApplicationUser> userManager, IMessageModelBuilder messageModelBuilder, IMapper mapper, IAuthService authService)
        {
            _userManager = userManager;
            _messageModelBuilder = messageModelBuilder;
            _mapper = mapper;
            _authService = authService;
        }

        [HttpGet]
        public  async Task<IActionResult> Get()
        {
            try
            {
                var users = _mapper.Map<IEnumerable<ApplicationUser>, IEnumerable<UserViewModel.UserModel>>(await _authService.GetAllUsers());
                return Ok(users); ;
            }
            catch (Exception e)
            {
                Log.Error(e, "UserController.Get");
                return BadRequest(_messageModelBuilder.CreateModel("500", e.Message));
            }
        }

        [HttpGet, Route("{userId}")]
        public async Task<IActionResult> Get(string userId)
        {
            try
            {
                var user = _mapper.Map<ApplicationUser, UserViewModel.UserSettings>(await _userManager.FindByIdAsync(userId));
                if (user == null) return NotFound(_messageModelBuilder.CreateModel("404", "Пользователь не найден"));
                return Ok(user);
            }
            catch (Exception e)
            {
                Log.Error(e, "UserController.Get");
                return BadRequest(_messageModelBuilder.CreateModel("500", e.Message));
            }
        }

        [HttpPost("settings"), DisableCors]
        public async Task<IActionResult> SaveSettings([FromBody]UserViewModel.UserSettings model)
        {
            try
            {
                var user = await _userManager.FindByIdAsync(model.Id);
                if (user == null) return NotFound(_messageModelBuilder.CreateModel("404", "Пользователь не найден"));
                user.FirstName = model.FirstName;
                user.LastName = model.LastName;
                //user.Address = model.Address;
                await _userManager.UpdateAsync(user);
                return Ok();
            }
            catch (Exception e)
            {
                Log.Error(e, "UserController.SaveSettings", model);
                return BadRequest(_messageModelBuilder.CreateModel("500", e.Message));
            }
        }

    }
}