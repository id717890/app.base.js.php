namespace App.Api.Models.ConfigOptions
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

    public interface IAlertOptions
    {
        string Info { get; set; }
        string Success { get; set; }
        string Warning { get; set; }
        string Error { get; set; }
    }

    public class AlertOptions : IAlertOptions
    {
        public string Info { get; set; }
        public string Success { get; set; }
        public string Warning { get; set; }
        public string Error { get; set; }
    }
}
