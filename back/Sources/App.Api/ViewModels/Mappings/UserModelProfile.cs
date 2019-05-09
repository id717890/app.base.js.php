using App.Domain.Interface.Entity;
using AutoMapper;

namespace App.Api.ViewModels.Mappings
{
    public class UserModelProfile: Profile
    {
        public UserModelProfile()
        {
            CreateMap<ApplicationUser, UserViewModel.UserSettings>();
            CreateMap<ApplicationUser, UserViewModel.UserModel>();
        }
    }
}
