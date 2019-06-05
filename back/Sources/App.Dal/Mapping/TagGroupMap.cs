using App.Domain.Interface.Entity;
using Microsoft.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore.Metadata.Builders;

namespace App.Dal.Mapping
{
    public class TagGroupMap : IEntityTypeConfiguration<TagGroup>
    {
        public void Configure(EntityTypeBuilder<TagGroup> builder)
        {
            builder.ToTable("TagGroups");
            builder.HasKey(x => x.Id);
            builder.Property(x => x.Id).ValueGeneratedOnAdd();
            builder.Property(x => x.Name).IsRequired(true);
            builder.Property(x => x.Description).IsRequired(false);
            builder.HasOne<ApplicationUser>(x => x.User);
            builder.HasMany<TagGroupItem>(x => x.Items).WithOne(x => x.TagGroup).IsRequired();
        }
    }
}
