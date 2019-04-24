namespace Raffle.Api.Models.ConfigOptions
{
    public interface IRoleOptions
    {
        string StandartRole { get; set; }
        string Admin { get; set; }
    }

    public class RoleOptions: IRoleOptions
    {
        public string StandartRole { get; set; }
        public string Admin { get; set; }
    }
}
