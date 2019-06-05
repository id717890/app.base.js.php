using System;
using System.Collections.Generic;
using System.Linq;
using System.Security.Claims;
using System.Threading.Tasks;
using App.Domain.Interface.Entity;
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Identity;
using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Options;
using Newtonsoft.Json;
using App.Api.Auth;
using App.Api.Helpers;
using App.Api.Models;
using App.Api.Models.ConfigOptions;
using App.Api.ViewModels;
using Raffle.Dal;
using Raffle.Infrastructure.Interface;
using Raffle.Infrastructure.Interface.Auth;
using Serilog;
using App.RR.Response;

namespace App.Api.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class AuthController : ControllerBase
    {
        //private readonly ApplicationDbContext _appDbContext;
        private readonly UserManager<ApplicationUser> _userManager;
        //private readonly SignInManager<ApplicationUser> _signInManager;
        private readonly IJwtFactory _jwtFactory;
        private readonly JwtIssuerOptions _jwtOptions;
        private readonly IMessageModelBuilder _messageModelBuilder;

        public AuthController(
            UserManager<ApplicationUser> userManager,
            //SignInManager<ApplicationUser> signInManager,
            IJwtFactory jwtFactory,
            //ApplicationDbContext appDbContext,
            IOptions<JwtIssuerOptions> jwtOptions,
            IMessageModelBuilder messageModelBuilder
            )
        {
            _userManager = userManager;
            _jwtFactory = jwtFactory;
            _jwtOptions = jwtOptions.Value;
            _messageModelBuilder = messageModelBuilder;
            //_signInManager = signInManager;
            //_appDbContext = appDbContext;
        }

        // POST api/auth/login
        [HttpPost("Login")]
        public async Task<IActionResult> Login([FromBody]LoginViewModel model)
        {
            if (!ModelState.IsValid)
            {
                return BadRequest(ModelState);
            }
            try
            {
                var identity = await GetClaimsIdentity(model.Email, model.Password);
                if (identity == null)
                {
                    return BadRequest(Errors.AddErrorToModelState("login_failure", "Invalid username or password.", ModelState));
                }
                var user = _userManager.FindByNameAsync(model.Email).Result;
                if (user != null)
                {
                    if (!_userManager.IsEmailConfirmedAsync(user).Result)
                    {
                        return BadRequest(_messageModelBuilder.CreateModel("403", "Email not confirmed!"));
                    }
                }
                var jwt = await Tokens.GenerateJwt(
                    identity, 
                    _jwtFactory, 
                    model.Email, 
                    _jwtOptions, 
                    new JsonSerializerSettings { Formatting = Formatting.Indented });
                return new OkObjectResult(jwt);
            }
            catch (Exception e)
            {
                Log.Error(e, "AuthController.Login", model);
                return BadRequest(_messageModelBuilder.CreateModel("500", e.Message));
            }
        }

        // POST api/auth/login
        [HttpPost("LoginDesktopUser")]
        public async Task<IActionResult> LoginDesktopUser(RR.Request.Auth.Login request)
        {
            try
            {
                var response = new DefaultResponse();
                var identity = await GetClaimsIdentity(request.Email, request.Password);
                if (identity == null)
                {
                    response.ErrorCode = 1;
                    response.Message = "Invalid username or password.";
                    return Ok(response);
                }
                var user = _userManager.FindByNameAsync(request.Email).Result;
                if (user != null)
                {
                    if (!_userManager.IsEmailConfirmedAsync(user).Result)
                    {
                        return BadRequest(_messageModelBuilder.CreateModel("403", "Email not confirmed!"));
                    }
                }
                var jwt = await Tokens.GenerateJwt(
                    identity,
                    _jwtFactory,
                    request.Email,
                    _jwtOptions,
                    new JsonSerializerSettings { Formatting = Formatting.Indented });
                return new OkObjectResult(response);
            }
            catch (Exception e)
            {
                Log.Error(e, "AuthController.Login", request);
                return BadRequest(_messageModelBuilder.CreateModel("500", e.Message));
            }
        }

        private async Task<ClaimsIdentity> GetClaimsIdentity(string userName, string password)
        {
            if (string.IsNullOrEmpty(userName) || string.IsNullOrEmpty(password))
                return await Task.FromResult<ClaimsIdentity>(null);

            // get the user to verifty
            var userToVerify = await _userManager.FindByNameAsync(userName);

            if (userToVerify == null) return await Task.FromResult<ClaimsIdentity>(null);

            // check the credentials
            if (await _userManager.CheckPasswordAsync(userToVerify, password))
            {
                var roles = await _userManager.GetRolesAsync(userToVerify);
                return await Task.FromResult(_jwtFactory.GenerateClaimsIdentity(userName, userToVerify.Id, roles));
            }

            // Credentials are invalid, or account doesn't exist
            return await Task.FromResult<ClaimsIdentity>(null);
        }

        [HttpPost("GetModules"), Authorize]
        public async Task<IActionResult> GetModules()
        {
            try
            {
                var email = User.FindFirst(ClaimTypes.NameIdentifier).Value;
                if (email == null) return Unauthorized();
                var user = await _userManager.FindByEmailAsync(email);
                if (user == null) return Unauthorized();

                if (await _userManager.IsInRoleAsync(user, Constants.Admin))
                    return Ok(new
                    {
                        modules = new[] { "manage", "dashboard" }
                    });
                if (await _userManager.IsInRoleAsync(user, Constants.StandartRole))
                    return Ok(new
                    {
                        modules = new [] {"dashboard"}
                    });
                return Ok();
            }
            catch (Exception e)
            {
                Log.Error(e, "AuthController.GetModules");
                return BadRequest(_messageModelBuilder.CreateModel("500", e.Message));
            }
        }

        [HttpPost, Authorize(Roles = Config.AdminRole), Route("checkadmin")]
        public IActionResult CheckAdmin()
        {
            try
            {
                return Ok();
            }
            catch (Exception e)
            {
                Log.Error(e, "AuthController.CheckAdmin");
                return BadRequest(_messageModelBuilder.CreateModel("500", e.Message));
            }
        }

    }
}