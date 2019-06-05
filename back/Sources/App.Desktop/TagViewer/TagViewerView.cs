using App.Desktop.Interface.Model;
using App.Desktop.Interface.Presenter.TagViewer;
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

namespace App.Desktop.TagViewer
{
    public partial class TagViewerView : Form, ITagViewerView
    {
        public TagViewerView()
        {
            InitializeComponent();
        }

        public void Attach(ITagViewerPresenterCallback presenter)
        {
            throw new NotImplementedException();
        }

        public void SetModel(ITagViewerViewModel model)
        {
            cbTagGroups.DisplayMember = "Name";
            if (model.TagGroups != null && model.TagGroups.Any())
            {
                foreach (var user in model.TagGroups)
                {
                    cbTagGroups.Items.Add(user);
                }
            }
        }
    }
}
