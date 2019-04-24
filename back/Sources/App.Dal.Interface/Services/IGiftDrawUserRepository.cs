using System.Collections.Generic;
using Raffle.Domain.Interface.Entity;
using System.Threading.Tasks;

namespace Raffle.Dal.Interface.Services
{
    public interface IGiftDrawUserRepository: IRepository<GiftDrawUser>
    {
        Task<GiftDrawUser> FindGiftDrawUserById(long id);
        Task<GiftDrawUser> FindGiftDrawUserByGiftIdAndUserId(long giftId, string userId);
        Task CreateKeysForGiftDrawUser(GiftDrawUser giftDrawUser, int countKeys);
        Task<ICollection<GiftDrawUser>> GetGiftDrawUserByUserId(string userId);
    }
}