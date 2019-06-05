using App.Dal.Interface.Services.Abstract;
using App.Domain.Interface.Entity;
using App.Domain.Interface.Services;
using Microsoft.AspNetCore.Authentication.Cookies;
using System;
using System.Collections.Generic;
using System.Text;
using System.Threading.Tasks;

namespace App.Domain.Services
{
    public class AuthService : IAuthService
    {
        //private readonly TokenProviderOptions _jwtOptions;
        private readonly IIdentityRepository _identityRepository;
        //private readonly IHttpContextAccessor _httpContextAccessor;
        //private readonly IMessageBuilder _messageBuilder;
        //private readonly IMailerService _mailerService;
        //private readonly IOptions<MailerOptions> _mailerOptions;

        public AuthService(
            //TokenProviderOptions jwtOptions, 
            IIdentityRepository identityRepository 
            //IHttpContextAccessor httpContextAccessor, 
            //IMessageBuilder messageBuilder, 
            //IMailerService mailerService, 
            //IOptions<MailerOptions> mailerOptions
            )
        {
            //this._jwtOptions = jwtOptions;
            this._identityRepository = identityRepository;
            //this._httpContextAccessor = httpContextAccessor;
            //_messageBuilder = messageBuilder;
            //_mailerService = mailerService;
            //_mailerOptions = mailerOptions;

            //ThrowIfInvalidOptions(this._jwtOptions);
        }

        //public async Task<string> IssueAuthToken(string userName, string password, bool rememberMe)
        //{
        //    if (string.IsNullOrEmpty(userName))
        //    {
        //        throw new ArgumentNullException(nameof(userName));
        //    }

        //    if (string.IsNullOrEmpty(password))
        //    {
        //        throw new ArgumentNullException(nameof(password));
        //    }

        //    var user = await _identityRepository.GetUser(userName);

        //    if (user == null || !user.IsActive)
        //    {
        //        return null;
        //    }

        //    if (!Utils.ValidatePassword(password, user.PasswordHash, user.PasswordSalt))
        //    {
        //        return null;
        //    }


        //    var expiration = rememberMe ? DateTime.UtcNow.AddYears(1) : _jwtOptions.Expiration;
        //    return await GetEncryptedJwtToken(user, expiration);
        //}

        //private async Task<string> GetEncryptedJwtToken(User user, DateTime expiration)
        //{
        //    var claims = new List<Claim>
        //    {
        //        new Claim(ClaimType.UserId.ToString(), user.Id.ToString()),
        //        new Claim(ClaimType.Email.ToString(), user.Email),
        //        new Claim(ClaimTypes.Name, $"{user.LastName} {user.FirstName}"),
        //        new Claim(ClaimTypes.Role, user.Role)
        //    };

        //    _jwtOptions.NotBefore = _jwtOptions.IssuedAt = DateTime.UtcNow;

        //    // Create the JWT security token and encode it.            
        //    var jwt = new JwtSecurityToken(
        //      issuer: _jwtOptions.Issuer,
        //      audience: _jwtOptions.Audience,
        //      claims: claims,
        //      notBefore: _jwtOptions.NotBefore,
        //      expires: expiration,
        //      signingCredentials: _jwtOptions.SigningCredentials);

        //    var encodedJwt = new JwtSecurityTokenHandler().WriteToken(jwt);
        //    claims.Add(new Claim(ClaimType.JwtRaw.ToString(), encodedJwt));

        //    //  authorize 
        //    var principal = new ClaimsPrincipal();
        //    principal.AddIdentity(new ClaimsIdentity(claims.AsEnumerable(), Constants.AuthenticationScheme));

        //    await this._httpContextAccessor.HttpContext.SignInAsync(Constants.AuthenticationScheme, principal,
        //        new AuthenticationProperties
        //        {
        //            IsPersistent = true,
        //            AllowRefresh = true
        //        });

        //    this._httpContextAccessor.HttpContext.Items.Add("UserId", user.Id.ToString());

        //    return encodedJwt;
        //}

        //private async Task<string> RefreshAuthToken(string userEmail, DateTime expiration)
        //{
        //    if (string.IsNullOrEmpty(userEmail))
        //    {
        //        throw new ArgumentNullException(nameof(userEmail));
        //    }

        //    var user = await _identityRepository.GetUser(userEmail);

        //    if (user == null || !user.IsActive)
        //    {
        //        return null;
        //    }

        //    return await GetEncryptedJwtToken(user, expiration);
        //}

        //public async Task Validate(CookieValidatePrincipalContext context)
        //{
        //    try
        //    {
        //        var encryptedJwt = _httpContextAccessor.GetCookie(Constants.JwtTokenCookieName);
        //        if (string.IsNullOrEmpty(encryptedJwt))
        //        {
        //            throw new InvalidCredentialException("no JWT token");
        //        }

        //        var jwt = new JwtSecurityTokenHandler().ReadJwtToken(encryptedJwt);
        //        if (jwt.ValidTo >= DateTime.UtcNow)
        //        {
        //            return;
        //        }

        //        if (jwt.Claims == null)
        //        {
        //            throw new InvalidCredentialException("no claims");
        //        }

        //        var userEmailClaim = jwt.Claims.SingleOrDefault(c => c.Type == ClaimType.Email.ToString());
        //        if (userEmailClaim == null)
        //        {
        //            throw new InvalidCredentialException("no user email claim");
        //        }

        //        await _httpContextAccessor.HttpContext.SignOutAsync(Constants.AuthenticationScheme);

        //        // re-authorize users
        //        encryptedJwt = await RefreshAuthToken(userEmailClaim.Value, jwt.ValidTo);
        //        if (string.IsNullOrEmpty(encryptedJwt))
        //        {
        //            throw new InvalidCredentialException("cannot refresh token");
        //        }

        //        jwt = new JwtSecurityTokenHandler().ReadJwtToken(encryptedJwt);

        //        var principal = new ClaimsPrincipal();
        //        principal.AddIdentity(new ClaimsIdentity(jwt.Claims, Constants.AuthenticationScheme));

        //        context.ReplacePrincipal(principal);
        //        context.ShouldRenew = true;
        //    }
        //    catch (Exception)
        //    {
        //        if (context != null)
        //        {
        //            context.ShouldRenew = false;
        //            context.RejectPrincipal();
        //        }

        //        await _httpContextAccessor.HttpContext.SignOutAsync(Constants.AuthenticationScheme);
        //    }
        //}

        //public async Task<bool> RemindPassword(string email, string resetPasswordUrl, string emailTemplate, bool isHtml)
        //{
        //    var user = await GetUserByLoginOrEmail(email);

        //    if (user == null)
        //    {
        //        return false;
        //    }

        //    var token = Utils.GeneratePasswordResetToken(email);
        //    var passwordResetLink = $"{resetPasswordUrl}/{token}";

        //    user.PasswordResetToken = token;
        //    user.PasswordResetExpiration = DateTime.UtcNow.AddHours(2);

        //    await this._identityRepository.UpdateUser(user);

        //    var emailTemplateModel = new ForgotPasswordEmailTemplateModel { Url = passwordResetLink, User = user };
        //    var message = await this._messageBuilder.RenderMessage(user.Email, $"{user.LastName} {user.FirstName}", "Восстановление пароля",
        //        emailTemplate, isHtml, emailTemplateModel);

        //    return this._mailerOptions.Value.Enabled && await this._mailerService.SendNowAsync(message);
        //}

        //public async Task<bool> ResetPassword(string token, string password)
        //{
        //    if (string.IsNullOrEmpty(password))
        //        return false;

        //    var user = await ValidateResetPassword(token);
        //    if (user == null)
        //        return false;

        //    user.PasswordResetToken = null;
        //    user.PasswordResetExpiration = null;

        //    var passwordHash = Utils.GenerateHash(password);
        //    user.PasswordHash = passwordHash.Hash;
        //    user.PasswordSalt = passwordHash.Salt;

        //    await this._identityRepository.UpdateUser(user);
        //    return true;
        //}

        //public async Task<User> ValidateResetPassword(string token)
        //{
        //    var email = Utils.DecodeEmailFromPasswordResetToken(token);

        //    if (string.IsNullOrWhiteSpace(email))
        //        return null;

        //    var user = await GetUserByLoginOrEmail(email);
        //    if (user == null || user.PasswordResetToken != token || user.PasswordResetExpiration <= DateTime.UtcNow)
        //        return null;

        //    return user;
        //}

        //private static void ThrowIfInvalidOptions(TokenProviderOptions options)
        //{
        //    if (options == null)
        //        throw new ArgumentNullException(nameof(options));

        //    if (options.ValidFor <= TimeSpan.Zero)
        //        throw new ArgumentException("Must be a non-zero TimeSpan.", nameof(TokenProviderOptions.ValidFor));

        //    if (options.SigningCredentials == null)
        //        throw new ArgumentNullException(nameof(TokenProviderOptions.SigningCredentials));

        //    if (options.JtiGenerator == null)
        //        throw new ArgumentNullException(nameof(TokenProviderOptions.JtiGenerator));
        //}

        //public static void RegisterRepositories(IServiceCollection services)
        //{
        //    services.AddScoped<IIdentityRepository, IdentityRepository>();
        //}

        //private async Task<User> GetUserByLoginOrEmail(string email)
        //{
        //    var user = await this._identityRepository.GetUser(email);
        //    return user != null && user.IsActive ? user : null;
        //}

        public async Task<ICollection<ApplicationUser>> GetAllUsers()
        {
            return await _identityRepository.GetUsers(false);
        }
    }
}
