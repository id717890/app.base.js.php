using System;
using System.Collections.Generic;
using System.Data;
using System.Data.SqlClient;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore.Internal;
using Microsoft.EntityFrameworkCore.Metadata.Internal;
using Raffle.Dal.Interface.Services;
using Raffle.Domain.Interface.Entity;

namespace Raffle.Dal.Services
{
    public class GiftDrawUserRepository: Repository<GiftDrawUser>, IGiftDrawUserRepository
    {
        private readonly ApplicationDbContext _db;

        public GiftDrawUserRepository(ApplicationDbContext dbContext) : base(dbContext)
        {
            _db = dbContext;
        }

        public async Task<GiftDrawUser> FindGiftDrawUserById(long id)
        {
            return await _db.Set<GiftDrawUser>().Include(x => x.Keys).Include(x=>x.GiftDraw).SingleOrDefaultAsync(x => x.Id == id);
        }

        public async Task<GiftDrawUser> FindGiftDrawUserByGiftIdAndUserId(long giftId, string userId)
        {
            return await _db.Set<GiftDrawUser>().Include(x=>x.Keys).SingleOrDefaultAsync(x => x.GiftDrawId == giftId && x.UserId == userId);
        }

        public async Task CreateKeysForGiftDrawUser(GiftDrawUser giftDrawUser, int countKeys)
        {
            //if (giftDrawUser.Keys ==null || !giftDrawUser.Keys.Any()) giftDrawUser.Keys = new List<GiftDrawUserKey>();
            //var list = new List<GiftDrawUserKey>();
            for (int i = 1; i <= countKeys; i++)
            {
                //list.Add(new GiftDrawUserKey
                //{
                //    GiftDrawUserId = giftDrawUser.Id,
                //    IsDeleted = false,
                //    Key = Guid.NewGuid().ToString()
                //});
                var n = new GiftDrawUserKey
                {
                    //GiftDrawUserId = giftDrawUser.Id,
                    IsDeleted = false,
                    Key = Guid.NewGuid().ToString(),
                    Price = giftDrawUser.GiftDraw.PriceKey
                };

                giftDrawUser.Keys.Add(n);
                await _db.SaveChangesAsync();
            }

            //await _db.AddRangeAsync(list);
            //await _db.SaveChangesAsync();

            //giftDrawUser.Keys.Add(new GiftDrawUserKey
            //{
            //    //GiftDrawUserId = giftDrawUser.Id,
            //    IsDeleted = false,
            //    Key = guid
            //});
            //if (list.Any())
            //{
            //await _db.Set<GiftDrawUser>()  AddRangeAsync(list);
            //}



            //_db.Set<GiftDrawUser>()
            //giftDrawUser.Keys.(list);
            //await _db.AddRangeAsync(giftDrawUser.Keys);
            //await _db.SaveChangesAsync();
        }

        public async Task<ICollection<GiftDrawUser>> GetGiftDrawUserByUserId(string userId)
        {
            return await _db.Set<GiftDrawUser>()
                .AsNoTracking()
                .Include(x => x.GiftDraw).ThenInclude(y => y.Gift)
                .Include(x=>x.Keys)
                .Where(x => x.UserId == userId)
                .ToListAsync();
        }
    }
}
