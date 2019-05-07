using Newtonsoft.Json;
using System;

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

        public class UserModel
        {
            public Guid Id { get; set; }
            public string Email { get; set; }
            public string FirstName { get; set; }
            public string LastName { get; set; }
            public string ShortName { get; set; }
            public string IsActive { get; set; }
        }
    }
}
