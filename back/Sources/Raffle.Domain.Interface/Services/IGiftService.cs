using Raffle.Domain.Interface.Entity;
using System.Collections.Generic;
using System.Threading.Tasks;

namespace Raffle.Domain.Interface.Services
{
    public interface IGiftService
    {
        Task<IEnumerable<Gift>> GetAllGiftsForAdmin();
        Task<Gift> FindGiftById(long id);
        Task UpdateGift(Gift gift);
        Task DeleteGift(long id);
    }
}
