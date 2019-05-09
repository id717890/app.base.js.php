using System.ComponentModel.DataAnnotations;

namespace App.Api.ViewModels
{
    public class ForgotPasswordViewModel
    {
        [Required, EmailAddress]
        public string Email { get; set; }
    }
}
