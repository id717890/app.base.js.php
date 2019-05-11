using App.Desktop.Interface.Model;
using App.Desktop.Interface.Presenter.MdiContainer;
using App.Desktop.Interface.View;
using App.Desktop.TagViewer;
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
            tagViewerView.Click += (sender, e) => presenter.OpenTagViewerForm();
            testForm.Click += (sender, e) => presenter.OpenTest();
        }

        public void SetMenu(IMdiViewModel model)
        {
        }
    }
}
