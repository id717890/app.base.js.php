using Microsoft.EntityFrameworkCore;
using Raffle.Dal.Interface.Services;
using Raffle.Domain.Interface.Entity;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace Raffle.Dal.Services
{
    public class GiftRepository : Repository<Gift>, IGiftRepository
    {
        private readonly ApplicationDbContext _db;

        public GiftRepository(ApplicationDbContext dbContext) : base(dbContext)
        {
            _db = dbContext;
        }

        public async Task<IEnumerable<Gift>> GetAllForAdmin()
        {
            return await _db.Set<Gift>().Where(x => !x.IsDeleted).AsNoTracking().ToListAsync();
        }
    }
}
