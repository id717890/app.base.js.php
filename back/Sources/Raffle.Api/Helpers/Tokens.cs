﻿using System.Linq;
using System.Security.Claims;
using System.Threading.Tasks;
using Newtonsoft.Json;
using Raffle.Api.Models;
using Raffle.Api.Models.ConfigOptions;
using Raffle.Infrastructure.Interface.Auth;

namespace Raffle.Api.Helpers
{
    public class Tokens
    {
        public static async Task<string> GenerateJwt(ClaimsIdentity identity, IJwtFactory jwtFactory, string userName, JwtIssuerOptions jwtOptions, JsonSerializerSettings serializerSettings)
        {
            var response = new
            {
                id = identity.Claims.Single(c => c.Type == "id").Value,
                access_token = await jwtFactory.GenerateEncodedToken(userName, identity),
                expires_in = jwtOptions.ExpirationMinutes * 60
            };
            return JsonConvert.SerializeObject(response, serializerSettings);
        }
    }
}
