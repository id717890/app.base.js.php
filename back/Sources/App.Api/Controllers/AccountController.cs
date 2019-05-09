using System;
using System.Collections.Generic;
using System.Linq;
using System.Security.Policy;
using System.Threading.Tasks;
using System.Web;
using App.Domain.Interface.Entity;
using AutoMapper;
using Microsoft.AspNetCore.Hosting;
using Microsoft.AspNetCore.Http;
using Microsoft.AspNetCore.Identity;
using Microsoft.AspNetCore.Identity.UI.Services;
using Microsoft.AspNetCore.Mvc;
using Microsoft.Extensions.Configuration;
using Microsoft.Extensions.Options;
using App.Api.Helpers;
using App.Api.Models;
using App.Api.Models.ConfigOptions;
using App.Api.ViewModels;
using Raffle.Dal;
using Raffle.Domain.Interface.Entity;
using Raffle.Infrastructure.Interface;
using Serilog;
using App.Desktop.Interface.Data;
using App.Domain.Interface.Services;
using App.RR.Response;

namespace App.Api.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class AccountController : ControllerBase
    {
        private readonly ApplicationDbContext _appDbContext;
        private readonly UserManager<ApplicationUser> _userManager;
        private readonly IMapper _mapper;
        private readonly IEmailSender _emailSender;
        private readonly IEmailBuilder _emailBuilder;
        private readonly IMessageModelBuilder _messageModelBuilder;
        private readonly IConfiguration _config;
        private readonly IAuthService _authService;
        private RoleOptions _roleOptions;
        private AlertOptions _alertOptions;


        private enum TypeMessage
        {
            Info,
            Success,
            Warning,
            Error
        }

        public AccountController(
            UserManager<ApplicationUser> userManager,
            IMapper mapper,
            ApplicationDbContext appDbContext,
            IEmailSender emailSender,
            IEmailBuilder emailBuilder,
            IMessageModelBuilder messageModelBuilder,
            IConfiguration config,
            IOptions<RoleOptions> roleOptions,
            IOptions<AlertOptions> alertOptions,
            IAuthService authService
            )
        {
            _userManager = userManager;
            _mapper = mapper;
            _appDbContext = appDbContext;
            _emailSender = emailSender;
            _emailBuilder = emailBuilder;
            _messageModelBuilder = messageModelBuilder;
            _config = config;
            _roleOptions = roleOptions.Value;
            _alertOptions = alertOptions.Value;
            _authService = authService;
        }

        [HttpPost, Route("register")]
        public async Task<IActionResult> Register([FromBody]RegistrationViewModel model)
        {
            if (!ModelState.IsValid)
            {
                return BadRequest(ModelState);
            }

            try
            {
                var userIdentity = _mapper.Map<ApplicationUser>(model);
                userIdentity.EmailConfirmed = true;
                var result = await _userManager.CreateAsync(userIdentity, model.Password);
                if (!result.Succeeded) return new BadRequestObjectResult(Errors.AddErrorsToModelState(result, ModelState));

                //var code = await _userManager.GenerateEmailConfirmationTokenAsync(userIdentity);
                //var callbackUrl = Url.Action($"ConfirmEmail", $"Account", new { userId = userIdentity.Id, code = code }, protocol: HttpContext.Request.Scheme);
                //await _emailSender.SendEmailAsync(model.Email, "Confirm your account", _emailBuilder.CreateConfirmEmailBody(callbackUrl));
                
                //await _signInManager.SignInAsync(user, isPersistent: false);
                //await _customerService.CreateAsync(new Customer {IdentityId = userIdentity.Id});
                //await _appDbContext.Customers.AddAsync(new Customer { IdentityId = userIdentity.Id});
                await _userManager.AddToRolesAsync(userIdentity, new List<string> { _roleOptions.StandartRole, _roleOptions.Admin });
                //await _appDbContext.SaveChangesAsync();
                return new OkObjectResult("Account created");
            }
            catch (Exception e)
            {
                Log.Error(e, "AccountController.Register", model);
                return BadRequest(_messageModelBuilder.CreateModel("500", e.Message));
            }
        }

        [HttpGet, Route("ConfirmEmail")]
        public IActionResult ConfirmEmail(string userId, string code)
        {
            try
            {
                string url = string.Empty;
                var user = _userManager.FindByIdAsync(userId).Result;
                if (user == null)
                {
                    url = CallbakUrlBuild("Ошибка", "Не удалось определить пользователя", TypeMessage.Error);
                    return Redirect(Uri.EscapeUriString(url));
                }
                var result = _userManager.ConfirmEmailAsync(user, code).Result;
                if (!result.Succeeded)
                {
                    url = CallbakUrlBuild("Ошибка", "Не удалось определить токен доступа", TypeMessage.Error);
                    return Redirect(Uri.EscapeUriString(url));
                }
                url = CallbakUrlBuild("Успешно", "Ваш E-mail успешно подтверждён. Теперь вы можете авторизоваться", TypeMessage.Success);
                return Redirect(Uri.EscapeUriString(url));
                //if (user == null) return BadRequest("Не удалось определить пользователя");
                //var result = _userManager.ConfirmEmailAsync(user, code).Result;
                //if (!result.Succeeded) return BadRequest("Не удалось определить токен доступа");
                //return Ok("Ваш E-mail успешно подтверждён. Теперь вы можете авторизоваться");
            }
            catch (Exception e)
            {
                Log.Error(e, "AccountController.ConfirmEmail", userId, code);
                return BadRequest(_messageModelBuilder.CreateModel("500", e.Message));
            }
        }

        [HttpPost, Route("ForgotPassword")]
        public async Task<IActionResult> ForgotPassword([FromBody] ForgotPasswordViewModel model)
        {
            if (!ModelState.IsValid)
            {
                return BadRequest(ModelState);
            }
            try
            {
                var user = await _userManager.FindByNameAsync(model.Email);
                if (user == null) return BadRequest(_messageModelBuilder.CreateModel("message", "Указанный пользователь не найден"));
                if (!await _userManager.IsEmailConfirmedAsync(user)) return BadRequest(_messageModelBuilder.CreateModel("message", "E-mail не подтвержден"));
                var code = await _userManager.GeneratePasswordResetTokenAsync(user);
                var webSiteUrl = _config.GetSection("WebSite").Value;
                var callbackUrl = string.Format(webSiteUrl + "resetpassword?id={0}&code={1}", user.Id, code);
                //var callbackUrl = Url.Action($"PasswordReset", $"Account", new {userId = user.Id, code = code}, HttpContext.Request.Scheme); 
                await _emailSender.SendEmailAsync(model.Email, "Reset your password",
                    _emailBuilder.CreateForgotPasswordEmailBody(callbackUrl));
                return Ok("На Ваш E-mail отправлено письмо для восстановления пароля.");
            }
            catch (Exception e)
            {
                Log.Error(e, "AccountController.ForgotPassword", model);
                return BadRequest(_messageModelBuilder.CreateModel("500", e.Message));
            }
        }

        [HttpPost, Route("PasswordReset")]
        public async Task<IActionResult> PasswordReset([FromBody] ResetPasswordViewModel model)
        {
            if (!ModelState.IsValid)
            {
                return BadRequest(ModelState);
            }
            try
            {
                model.Code = model.Code.Replace(" ", "+");
                var user = await _userManager.FindByIdAsync(model.UserId);
                if (user == null) return BadRequest(_messageModelBuilder.CreateModel("message", "Указанный пользователь не найден"));
                var resultVerifyToken = await _userManager.VerifyUserTokenAsync(user, "Default", "ResetPassword", model.Code);
                if (resultVerifyToken)
                {
                    var result = _userManager.ResetPasswordAsync(user, model.Code, model.Password).Result;
                    if (!result.Succeeded) return BadRequest(_messageModelBuilder.CreateModel("message", "Ошибка при сбросе пароля. Возможно ссылка не действительна"));

                    return Ok();
                }
                return BadRequest(_messageModelBuilder.CreateModel("message", "Ссылка для восттановления пароля не действительна!"));
            }
            catch (Exception e)
            {
                Log.Error(e, "AccountController.PasswordReset", model);
                return BadRequest(_messageModelBuilder.CreateModel("500", e.Message));
            }
        }

        private string CallbakUrlBuild (string headerText, string message, TypeMessage type)
        {
            string typeStr;
            var webSiteUrl = _config.GetSection("WebSite").Value;
            switch (type)
            {
                case TypeMessage.Info:
                    typeStr = "primary";
                    break;
                case TypeMessage.Success:
                    typeStr = "success";
                    break;
                case TypeMessage.Error:
                    typeStr = "error";
                    break;
                case TypeMessage.Warning:
                    typeStr = "warning";
                    break;
                default:
                    typeStr = "success";
                    break;
            }
            return string.Format(webSiteUrl + "notify?h={0}&m={1}&t={2}", headerText, message, typeStr); ;
        }

        [HttpGet, Route("GetAllUsers")]
        public async Task<IActionResult> GetAllUsers ()
        {
            try
            {
                return Ok(await _authService.GetAllUsers());
            }
            catch (Exception e)
            {
                Log.Error(e, "AccountController.GetAllUsers");
                return BadRequest(_messageModelBuilder.CreateModel("500", e.Message));
            }
            //var user1 = new DesktopUser() { Id = Guid.NewGuid(), FirstName = "f1" , LastName = "l1"};
            //var user2 = new DesktopUser() { Id = Guid.NewGuid(), FirstName = "f2" , LastName = "l2"};
            //return new DesktopUser[] { user1, user2 };
            ////return new object[] { new { id = "val1", text = "text1" }, new { id = "val2", text = "text2" } };
        }       

    }
}