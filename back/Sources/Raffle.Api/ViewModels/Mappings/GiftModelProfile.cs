using AutoMapper;
using Raffle.Domain.Interface.Entity;

namespace Raffle.Api.ViewModels.Mappings
{
    public class GiftModelProfile: Profile
    {
        public GiftModelProfile()
        {
            CreateMap<Gift, GiftViewModel.GiftView>().ReverseMap();

            CreateMap<GiftDraw, GiftViewModel.GiftDraw>()
                .ForMember(d => d.ImageLocal, s => s.MapFrom(x => x.Gift.ImageLocal))
                .ForMember(d => d.Image, s => s.MapFrom(x => x.Gift.Image))
                .ForMember(d => d.IdRow, s => s.MapFrom(x => x.Id))
                .ForMember(d => d.IdGift, s => s.MapFrom(x => x.GiftId))
                .ForMember(d => d.GiftName, s => s.MapFrom(x => x.Gift.Name))
                .ForMember(d => d.GiftDescriptionFull, s => s.MapFrom(x => x.Gift.DescriptionFull))
                .ForMember(d => d.GiftDescriptionShort, s => s.MapFrom(x => x.Gift.DescriptionShort))
                .ForMember(d => d.IsDelete, s => s.MapFrom(x=>x.IsDeleted))
                .ForMember(d => d.WinnerKey, s => s.MapFrom(x=>x.WinnerKey))
                .ForMember(d => d.Reached, s => s.Ignore())
                ;

            CreateMap<GiftDrawUser, GiftViewModel.GiftDrawUserView>()
                .ForMember(d => d.IdRow, s => s.MapFrom(x => x.Id))
                .ForMember(d => d.IdGiftDraw, s => s.MapFrom(x => x.GiftDrawId))
                .ForMember(d => d.IdGift, s => s.MapFrom(x => x.GiftDraw.GiftId))
                .ForMember(d => d.ImageLocal, s => s.MapFrom(x => x.GiftDraw.Gift.ImageLocal))
                .ForMember(d => d.Image, s => s.MapFrom(x => x.GiftDraw.Gift.Image))
                .ForMember(d => d.GiftName, s => s.MapFrom(x => x.GiftDraw.Gift.Name))
                .ForMember(d => d.GiftDescriptionFull, s => s.MapFrom(x => x.GiftDraw.Gift.DescriptionFull))
                .ForMember(d => d.GiftDescriptionShort, s => s.MapFrom(x => x.GiftDraw.Gift.DescriptionShort))
                .ForMember(d => d.Price, s => s.MapFrom(x => x.GiftDraw.Price))
                .ForMember(d => d.PriceKey, s => s.MapFrom(x => x.GiftDraw.PriceKey))
                .ForMember(d => d.WinnerKey, s => s.MapFrom(x => x.GiftDraw.WinnerKey))
                .ForMember(d => d.Reached, s => s.Ignore())
                .ForMember(d => d.IsDelete, s => s.MapFrom(x => x.GiftDraw.IsDeleted));

            CreateMap<GiftDrawUserKey, GiftViewModel.GiftDrawUserKeyView>();
        }
    }
}
