using App.RR.Response.Abstraction;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace App.RR.Response
{
    public class AuthResponse
    {
        public class TokenResponse : BaseResponse
        {
            public string Id { get; set; }
            public string Token { get; set; }
            public long Expiration { get; set; }
        }
    }
}
