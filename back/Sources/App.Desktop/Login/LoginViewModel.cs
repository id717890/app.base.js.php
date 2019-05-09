using App.Desktop.Interface.Data;
using App.Desktop.Interface.Model;
using System.Collections.Generic;

namespace App.Desktop.Login
{
    public class LoginViewModel: ILoginViewModel
    {
        public IEnumerable<DesktopUser> Users { get; set; }

        public string UserName { get; set; }
        public string Password { get; set; }
    }
}
