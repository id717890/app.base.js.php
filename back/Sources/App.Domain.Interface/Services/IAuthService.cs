using Microsoft.AspNetCore.Authentication.Cookies;
using Raffle.Domain.Interface.Entity;
using System.Collections.Generic;
using System.Threading.Tasks;

namespace App.Domain.Interface.Services
{
    public interface IAuthService
    {
        Task<ICollection<ApplicationUser>> GetAllUsers();
        //Task<string> IssueAuthToken(string userName, string password, bool rememberMe);

        //Task Validate(CookieValidatePrincipalContext context);

        //Task<bool> RemindPassword(string email, string resetPasswordUrl, string emailTemplate, bool isHtml);

        //Task<bool> ResetPassword(string token, string password);

        //Task<ApplicationUser> ValidateResetPassword(string token);
    }
}
