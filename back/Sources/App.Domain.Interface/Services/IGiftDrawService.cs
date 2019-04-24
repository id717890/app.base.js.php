using System.Collections.Generic;
using System.Threading.Tasks;
using Raffle.Domain.Interface.Entity;

namespace Raffle.Domain.Interface.Services
{
    public interface IGiftDrawService
    {
        Task<IEnumerable<GiftDraw>> GetAllGifts();
        Task<IEnumerable<GiftDraw>> GetAllGiftsForAdmin();
        Task<long> GetCountOfGifts();
        Task<GiftDraw> FindGiftDrawById(long id);
        Task<decimal> GetTotalReachedByGiftDraw(long id);
        Task<(string, IEnumerable<string>)> TakeRandomWinnerKeyOfGiftDraw(long giftDrawId);
        Task SetWinnerOfGiftDraw(long giftDrawId, string key);
    }
}
