using System.Collections.Generic;

namespace App.Domain.Interface.Entity
{
    public class TagGroup : Entity
    {
        public ApplicationUser User { get; set; }
        public string UserId { get; set; }
        public string Name { get; set; }
        public string Description { get; set; }

        public ICollection<TagGroupItem> Items { get; set; }
    }
}
