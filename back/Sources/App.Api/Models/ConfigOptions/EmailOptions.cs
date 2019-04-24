namespace Raffle.Api.Models.ConfigOptions
{
    public interface IEmailOptions
    {
        string SmtpServer { get; set; }
        int SmtpPort { get; set; }
        string SmtpUsername { get; set; }
        string SmtpPassword { get; set; }
    }

    public class EmailOptions: IEmailOptions
    {
        public string SmtpServer { get; set; }
        public int SmtpPort { get; set; }
        public string SmtpUsername { get; set; }
        public string SmtpPassword { get; set; }
        public bool UseSsl { get; set; }
        public string FromName { get; set; }
        public string FromAddress { get; set; }
    }
}
