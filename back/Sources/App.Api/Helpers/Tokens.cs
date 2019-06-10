using System.Linq;
using System.Security.Claims;
using System.Threading.Tasks;
using Newtonsoft.Json;
using App.Api.Models;
using App.Api.Models.ConfigOptions;
using Raffle.Infrastructure.Interface.Auth;
using System;

namespace App.Api.Helpers
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

        public static async Task<Tuple<string, string, int>> GenerateJwt(ClaimsIdentity identity, IJwtFactory jwtFactory, string userName, JwtIssuerOptions jwtOptions)
        {
            return new Tuple<string, string, int>(identity.Claims.Single(c => c.Type == "id").Value, await jwtFactory.GenerateEncodedToken(userName, identity), jwtOptions.ExpirationMinutes * 60);
        }
    }
}
