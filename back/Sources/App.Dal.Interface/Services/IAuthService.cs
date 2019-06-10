using App.Domain.Interface.Entity;
using System;
using System.Collections.Generic;
using System.Text;
using System.Threading.Tasks;

namespace App.Dal.Interface.Services
{
    public interface IAuthService
    {
        Task<string> IssueAuthToken(string userName, string password, bool rememberMe);

        //Task Validate(CookieValidatePrincipalContext context);

        Task<bool> RemindPassword(string email, string resetPasswordUrl, string emailTemplate, bool isHtml);

        Task<bool> ResetPassword(string token, string password);

        Task<ApplicationUser> ValidateResetPassword(string token);
    }
}
