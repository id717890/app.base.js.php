using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;
using Microsoft.EntityFrameworkCore;
using Raffle.Dal.Interface.Services;
using Raffle.Domain.Interface.Entity;

namespace Raffle.Dal.Services
{
    public class GiftDrawRepository: Repository<GiftDraw>, IGiftDrawRepository
    {
        private readonly ApplicationDbContext _db;

        public GiftDrawRepository(ApplicationDbContext dbContext) : base(dbContext)
        {
            _db = dbContext;
        }

        public override async Task<List<GiftDraw>> GetAll()
        {
            return await _db.Set<GiftDraw>().AsNoTracking().Include(x => x.Gift).Where(x=>!x.IsDeleted).ToListAsync();
        }

        public async Task<IEnumerable<GiftDraw>> GetAllForAdmin()
        {
            return await _db.Set<GiftDraw>().AsNoTracking().Include(x => x.Gift).ToListAsync();
        }

        public async Task<List<string>> GetAllKeyOfGiftDraw(long id)
        {
            var keyList = new List<string>();
            using (var command = _db.Database.GetDbConnection().CreateCommand())
            {
                command.CommandText = $@"
                    select gduk.id, gduk.[key] from giftdrawuserkeys gduk
                    JOIN GiftDrawUsers gdu ON gdu.id = gduk.giftDrawUserId AND gdu.GiftDrawId = {id}
                    where gduk.IsDeleted = 0";
                _db.Database.OpenConnection();
                using( var reader = await command.ExecuteReaderAsync())
                {
                    while (await reader.ReadAsync())
                    {
                        if (!await reader.IsDBNullAsync(1)) keyList.Add(reader.GetString(1));
                    }
                }
            }
            return keyList.ToList();
        }

        public async Task<long> GetCountOfGifts()
        {
            return await _db.Set<GiftDraw>().CountAsync(x => x.IsDeleted == false);
        }

        public async Task<decimal> GetTotalReachedByGiftDraw(long id)
        {
            using (var command = _db.Database.GetDbConnection().CreateCommand())
            {
                command.CommandText = $@"
                    select sum(gduk.price) AS price from GiftDrawUserKeys gduk
                    JOIN GiftDrawUsers gdu ON gdu.Id = gduk.GiftDrawUserId
                    JOIN GiftDraws gd ON gd.id = gdu.GiftDrawId AND gd.Id = {id}";
                _db.Database.OpenConnection();
                var price = await command.ExecuteScalarAsync();
                if (price == DBNull.Value || price == null) price = (decimal)0;
                return (decimal)price;
            }

            //return _db.Set<GiftDraw>().FromSql(@"select sum(gduk.price) AS price from GiftDrawUserKeys gduk
            //        JOIN GiftDrawUsers gdu ON gdu.Id = gduk.GiftDrawUserId
            //        JOIN GiftDraws gd ON gd.id = gdu.GiftDrawId AND gd.Id = {0}", id).SingleOrDefaultAsync;
            //throw new NotImplementedException();
        }
    }
}
