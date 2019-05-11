using App.Desktop.Interface.Presenter.Abstraction;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace App.Desktop.Interface.Presenter.MdiContainer
{
    public interface IMdiPresenter: IPresenter
    {        
        bool ViewIsOpen (Form form);
    }
}
