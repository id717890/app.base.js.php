using Raffle.Dal.Interface.Services;
using Raffle.Domain.Interface.Entity;
using Raffle.Domain.Interface.Services;
using System.Collections.Generic;
using System.Threading.Tasks;

namespace Raffle.Domain.Services
{
    public class GiftService : IGiftService
    {
        private readonly IGiftRepository _repository;

        public GiftService(IGiftRepository repository)
        {
            _repository = repository;
        }

        public async Task DeleteGift(long id)
        {
            await _repository.Delete(id);
        }

        public async Task<Gift> FindGiftById(long id)
        {
            return await _repository.GetById(id);
        }

        public async Task<IEnumerable<Gift>> GetAllGiftsForAdmin()
        {
            return await _repository.GetAllForAdmin();
        }

        public async Task UpdateGift(Gift gift)
        {
            await _repository.Update(gift);
        }
    }
}
