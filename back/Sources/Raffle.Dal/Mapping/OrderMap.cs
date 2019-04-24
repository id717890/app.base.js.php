using Microsoft.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore.Metadata.Builders;
using Raffle.Domain.Interface.Entity;

namespace Raffle.Dal.Mapping
{
    public class OrderMap : IEntityTypeConfiguration<Order>
    {
        public void Configure(EntityTypeBuilder<Order> builder)
        {
            builder.ToTable("Orders");
            builder.HasKey(x => x.Id);
            builder.Property(x=> x.Id).ValueGeneratedOnAdd();
            builder.Property(x=>x.OperationId);
            builder.Property(x=>x.NotificationType);
            builder.Property(x=>x.Date);
            builder.Property(x=>x.Amount);
            builder.Property(x=>x.WithdrawAmount);
            builder.Property(x=>x.Sender);
            builder.Property(x=>x.Codepro);
            builder.Property(x=>x.Label);
            builder.Property(x=>x.Sha1Hash);
            builder.Property(x=>x.Unaccepted);
            builder.Property(x => x.YandexString);
            builder.Property(x => x.Errors);
            builder.Property(x => x.Sha1HashServer);
        }
    }
}
