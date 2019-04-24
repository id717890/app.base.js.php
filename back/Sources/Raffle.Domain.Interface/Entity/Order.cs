namespace Raffle.Domain.Interface.Entity
{
    public class Order: Entity
    {
        public string OperationId { get; set; }
        public string NotificationType { get; set; }
        public string Date { get; set; }
        public string Amount { get; set; }
        public string WithdrawAmount { get; set; }
        public string Currency { get; set; }
        public string Sender { get; set; }
        public string Codepro { get; set; }
        public string Label { get; set; }
        public string Sha1Hash { get; set; }
        public string Sha1HashServer { get; set; }
        public string Unaccepted { get; set; }
        public string YandexString { get; set; }
        public string Errors { get; set; }

    }
}
