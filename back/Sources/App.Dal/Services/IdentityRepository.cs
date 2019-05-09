using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using App.Dal.Interface.Services.Abstract;
using App.Domain.Interface.Entity;
using Microsoft.EntityFrameworkCore;
using Raffle.Dal;
using Raffle.Domain.Interface.Entity;

namespace App.Dal.Services
{
    public class IdentityRepository: IIdentityRepository
    {
        private readonly ApplicationDbContext _context;

        public IdentityRepository(ApplicationDbContext context)
        {
            this._context = context;
        }

        public async Task AddUser(ApplicationUser user)
        {
            await this._context.AddAsync(user);
            await this._context.SaveChangesAsync();
        }

        public async Task<ApplicationUser> GetUser(string userName)
        {
            if (string.IsNullOrEmpty(userName))
            {
                throw new ArgumentNullException(nameof(userName));
            }

            return await this._context.Users.SingleOrDefaultAsync(u => u.UserName == userName || u.Email == userName);
        }

        public async Task<ApplicationUser> GetUser(Guid userId)
        {
            return await this._context.Users.SingleOrDefaultAsync(u => u.Id == userId.ToString());
        }

        public async Task<ICollection<ApplicationUser>> GetUsers(bool activeOnly)
        {
            return await this._context.Users.Where(u => !activeOnly || u.IsActive).ToListAsync();
        }

        public Task DeleteUser(int userId)
        {
            throw new NotImplementedException();
        }

        public async Task UpdateUser(ApplicationUser user)
        {
            this._context.Users.Update(user);
            await this._context.SaveChangesAsync();
        }

        public async Task<bool> DoesEmailExist(string email, Guid userId)
        {
            return await this._context.Users.AnyAsync(t => t.Id != userId.ToString() && t.Email.ToLower() == email.ToLower());
        }

        public async Task<bool> DoesUserNameExist(string userName, Guid userId)
        {
            return await this._context.Users.AnyAsync(t => t.Id != userId.ToString() && t.UserName.ToLower() == userName.ToLower());
        }
    }
}
