using Microsoft.AspNetCore.Identity;
using System;
using System.ComponentModel.DataAnnotations.Schema;

namespace App.Domain.Interface.Entity
{
    public class ApplicationUser: IdentityUser
    {
        public string FirstName { get; set; }

        public string LastName { get; set; }

        public string MiddleName { get; set; }

        public string PasswordResetToken { get; set; }

        public DateTime? PasswordResetExpiration { get; set; }

        public bool IsActive { get; set; }

        //public string Role { get; set; }

        //[NotMapped]
        //public Role RoleEnum
        //{
        //    get => Role.AsEnum<Role>();
        //    set => this.Role = value.ToString();
        //}

        [NotMapped]
        public string ShortName => $"{this.LastName} {this.FirstName}";
    }
}
