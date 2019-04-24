using System;
using System.Collections.Generic;
using System.Threading.Tasks;
using Raffle.Dal.Interface.Services;
using Raffle.Domain.Interface.Entity;
using Raffle.Domain.Interface.Services;

namespace Raffle.Domain.Services
{
    public class GiftDrawService: IGiftDrawService
    {
        private readonly IGiftDrawRepository _repository;

        public GiftDrawService(IGiftDrawRepository repository)
        {
            _repository = repository;
        }

        public async Task<GiftDraw> FindGiftDrawById(long id)
        {
            return await _repository.GetById(id);
        }

        public async Task<IEnumerable<GiftDraw>> GetAllGifts()
        {
            return await _repository.GetAll();
        }

        public async Task<IEnumerable<GiftDraw>> GetAllGiftsForAdmin()
        {
            return await _repository.GetAllForAdmin();
        }

        public async Task<long> GetCountOfGifts()
        {
            return await _repository.GetCountOfGifts();
        }

        public async Task<decimal> GetTotalReachedByGiftDraw(long id)
        {
            return await _repository.GetTotalReachedByGiftDraw(id);
        }

        public async Task SetWinnerOfGiftDraw(long giftDrawId, string key)
        {
            var giftDraw = await FindGiftDrawById(giftDrawId);
            if (giftDraw !=null)
            {
                giftDraw.WinnerKey = key;
                await _repository.Update(giftDraw);
            }
        }

        public async Task<(string, IEnumerable<string>)> TakeRandomWinnerKeyOfGiftDraw(long giftDrawId)
        {
            var keyList = await _repository.GetAllKeyOfGiftDraw(giftDrawId);
            if (keyList == null || keyList.Count == 0) return (string.Empty, null);
            var randList = ShuffleList(keyList);
            var countRepeat = new Random().Next(13);
            var randomNumberOfKey = 0;
            for (var i = 1; i<=countRepeat; i++)
                randomNumberOfKey = new Random().Next(randList.Count);
            return (randList[randomNumberOfKey], randList);
        }

        private List<E> ShuffleList<E>(List<E> inputList)
        {
            List<E> randomList = new List<E>();

            Random r = new Random();
            int randomIndex = 0;
            while (inputList.Count > 0)
            {
                randomIndex = r.Next(0, inputList.Count); //Choose a random object in the list
                randomList.Add(inputList[randomIndex]); //add it to the new, random list
                inputList.RemoveAt(randomIndex); //remove to avoid duplicates
            }

            return randomList; //return the new random list
        }
    }
}
