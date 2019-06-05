namespace App.Domain.Interface.Entity
{
    public class TagGroupItem: Entity
    {
        public TagGroup TagGroup { get; set; }
        public long TagGroupId { get; set; }
        public Tag Tag { get; set; }
        public long TagId { get; set; }
    }
}
