using System.Collections.Generic;

namespace Raffle.Domain.Interface.Entity
{
    public class Vote: Entity
    {
        public Gift Gift { get; set; }
        public long GiftId { get; set; }
        public decimal Price { get; set; }

        public ICollection<VoteUser> VoteUsers { get; set; }
    }
}
