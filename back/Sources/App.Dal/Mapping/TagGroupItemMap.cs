using App.Domain.Interface.Entity;
using Microsoft.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore.Metadata.Builders;

namespace App.Dal.Mapping
{
    public class TagGroupItemMap : IEntityTypeConfiguration<TagGroupItem>
    {
        public void Configure(EntityTypeBuilder<TagGroupItem> builder)
        {
            builder.ToTable("TagGroupItems");
            builder.HasKey(x => x.Id);
            builder.Property(x => x.Id).ValueGeneratedOnAdd();
            builder.HasOne(x => x.Tag);
            builder.HasOne(x => x.TagGroup).WithMany(x=>x.Items).HasForeignKey(x=>x.TagGroupId);
        }
    }
}
