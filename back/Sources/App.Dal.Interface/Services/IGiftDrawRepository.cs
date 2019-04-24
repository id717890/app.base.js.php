using System.Collections.Generic;
using System.Threading.Tasks;
using Raffle.Domain.Interface.Entity;

namespace Raffle.Dal.Interface.Services
{
    public interface IGiftDrawRepository: IRepository<GiftDraw>
    {
        Task<IEnumerable<GiftDraw>> GetAllForAdmin();
        Task<long> GetCountOfGifts();
        Task<decimal> GetTotalReachedByGiftDraw(long id);
        Task<List<string>> GetAllKeyOfGiftDraw(long id);
    }
}
