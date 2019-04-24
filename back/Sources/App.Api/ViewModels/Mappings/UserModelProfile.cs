using AutoMapper;
using Raffle.Domain.Interface.Entity;

namespace Raffle.Api.ViewModels.Mappings
{
    public class UserModelProfile: Profile
    {
        public UserModelProfile()
        {
            CreateMap<ApplicationUser, UserViewModel.UserSettings>();
        }
    }
}
