using System.Collections.Generic;
using Raffle.Dal.Interface.Services;
using Raffle.Domain.Interface.Entity;
using Raffle.Domain.Interface.Services;
using System.Threading.Tasks;

namespace Raffle.Domain.Services
{
    public class GiftDrawUserService : IGiftDrawUserService
    {
        private readonly IGiftDrawUserRepository _giftDrawUserRepository;

        public GiftDrawUserService(IGiftDrawUserRepository giftDrawUserRepository)
        {
            _giftDrawUserRepository = giftDrawUserRepository;
        }

        public async Task<long> CreateGiftDrawUser(long giftDrawId, string userId)
        {
            return await _giftDrawUserRepository.Create(new GiftDrawUser { GiftDrawId = giftDrawId, UserId = userId});
        }

        public async Task<GiftDrawUser> FindGiftDrawUserByGiftIdAndUser(long giftId, string userId)
        {
            return await _giftDrawUserRepository.FindGiftDrawUserByGiftIdAndUserId(giftId, userId);
        }

        public async Task<GiftDrawUser> FindGiftDrawUserByIdWithKeys(long id)
        {
            return await _giftDrawUserRepository.FindGiftDrawUserById(id);
        }

        public async Task<ICollection<GiftDrawUser>> GetGiftDrawUserByUserId(string userId)
        {
            return await _giftDrawUserRepository.GetGiftDrawUserByUserId(userId);
        }

        public async Task CreateKeysForGiftDrawUser(long giftDrawUserId, int countKeys)
        {
            var giftDrawUser = await FindGiftDrawUserByIdWithKeys(giftDrawUserId);
            await _giftDrawUserRepository.CreateKeysForGiftDrawUser(giftDrawUser, countKeys);
        }
    }
}
