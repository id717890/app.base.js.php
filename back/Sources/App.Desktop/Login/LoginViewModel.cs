using App.Desktop.Interface.Data;
using App.Desktop.Interface.Model;
using System.Collections.Generic;

namespace App.Desktop.Login
{
    public class LoginViewModel: ILoginViewModel
    {
        public IEnumerable<DesktopUser> Users { get; set; }
    }
}
