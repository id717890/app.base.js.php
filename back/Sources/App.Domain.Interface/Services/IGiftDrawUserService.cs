using System.Collections.Generic;
using Raffle.Domain.Interface.Entity;
using System.Threading.Tasks;

namespace Raffle.Domain.Interface.Services
{
    public interface IGiftDrawUserService
    {
        Task<long> CreateGiftDrawUser(long giftDrawId, string userId);
        Task CreateKeysForGiftDrawUser(long giftDrawUserId, int countKeys);
        Task<GiftDrawUser> FindGiftDrawUserByGiftIdAndUser(long giftId, string userId);
        Task<GiftDrawUser> FindGiftDrawUserByIdWithKeys(long id);
        Task<ICollection<GiftDrawUser>> GetGiftDrawUserByUserId(string userId);
    }
}