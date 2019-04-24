using Newtonsoft.Json;

namespace Raffle.Api.ViewModels
{
    public class UserViewModel
    {
        public class UserSettings
        {
            [JsonProperty("id")]
            public string Id { get; set; }

            [JsonProperty("firstName")]
            public string FirstName { get; set; }

            [JsonProperty("lastName")]
            public string LastName { get; set; }

            [JsonProperty("address")]
            public string Address { get; set; }
        }
    }
}
