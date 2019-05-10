using App.Desktop.Interface.Presenter.MdiContainer;
using App.Desktop.Interface.View;
using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace App.Desktop.MdiContainer
{
    public partial class MdiView : Form, IMdiView
    {
        public MdiView()
        {
            InitializeComponent();
        }

        public void Attach(IMdiPresenterCallback presenter)
        {
            throw new NotImplementedException();
        }
    }
}
