namespace Raffle.Domain.Interface.Entity
{
    public class GiftDrawUserKey: Entity
    {
        public GiftDrawUser GiftDrawUser { get; set; }
        public long GiftDrawUserId { get; set; }
        public string Key { get; set; }
        public decimal Price { get; set; }
    }
}
