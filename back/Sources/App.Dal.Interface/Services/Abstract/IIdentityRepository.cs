using App.Domain.Interface.Entity;
using System;
using System.Collections.Generic;
using System.Threading.Tasks;

namespace App.Dal.Interface.Services.Abstract
{
    public interface IIdentityRepository
    {
        #region users

        Task AddUser(ApplicationUser user);

        Task<ApplicationUser> GetUser(string userName);

        Task<ApplicationUser> GetUser(Guid userId);

        Task<ICollection<ApplicationUser>> GetUsers(bool activeOnly);

        Task DeleteUser(int userId);

        Task UpdateUser(ApplicationUser user);

        Task<bool> DoesEmailExist(string email, Guid userId);

        Task<bool> DoesUserNameExist(string userName, Guid userId);

        #endregion users
    }
}
