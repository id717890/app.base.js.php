using App.Desktop.Interface.Data;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace App.Desktop.Interface.Model
{
    public interface ILoginViewModel
    {
        IEnumerable<DesktopUser> Users { get; set; }
    }
}
