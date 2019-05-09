using App.RR.Request.Abstraction;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace App.RR.Request
{
    public class Auth
    {
        public class Login: IBaseRequest
        {
            public string Email { get; set; }
            public string Password { get; set; }
        }
    }
}
