using Microsoft.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore.Metadata.Builders;
using Raffle.Domain.Interface.Entity;

namespace Raffle.Dal.Mapping
{
    public class GiftDrawUserKeyMap : IEntityTypeConfiguration<GiftDrawUserKey>
    {
        public void Configure(EntityTypeBuilder<GiftDrawUserKey> builder)
        {
            builder.ToTable("GiftDrawUserKeys");
            builder.HasKey(x => x.Id);
            builder.Property(x => x.Id).ValueGeneratedOnAdd();
            builder.Property(x => x.Key).IsRequired();
            builder.Property(x => x.Price).IsRequired();
            builder.HasOne(x => x.GiftDrawUser).WithMany(y => y.Keys).HasForeignKey(x=>x.GiftDrawUserId);
        }
    }
}
