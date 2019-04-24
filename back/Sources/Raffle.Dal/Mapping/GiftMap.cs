using Microsoft.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore.Metadata.Builders;
using Raffle.Domain.Interface.Entity;

namespace Raffle.Dal.Mapping
{
    public class GiftMap : IEntityTypeConfiguration<Gift>
    {
        public void Configure(EntityTypeBuilder<Gift> builder)
        {
            builder.ToTable("Gifts");
            builder.HasKey(x => x.Id);
            builder.Property(x=>x.Id).ValueGeneratedOnAdd();
            builder.Property(x=>x.Name).IsRequired();
            builder.Property(x=>x.Image).IsRequired(false);
            builder.Property(x=>x.ImageLocal).IsRequired(false);
            builder.Property(x=>x.DescriptionFull).IsRequired();
            builder.Property(x=>x.DescriptionShort).IsRequired(false);
            builder.Property(x=>x.IsDeleted).IsRequired();
        }
    }
}
