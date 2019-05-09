using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Data.SqlClient;
using System.Web;
using System.Text.RegularExpressions;
using System.Net.Http;
using System.Net.Http.Headers;
using Newtonsoft;
using Newtonsoft.Json;
using App.Desktop.Response;
using App.Desktop.Interface.View;
using App.Desktop.Interface.Presenter.LoginPresenter;
using App.Desktop.Interface.Model;
using App.Desktop.Interface.Data;

namespace App.Desktop
{
    public partial class LoginView : Form, ILoginView
    {
        public LoginView()
        {
            InitializeComponent();
        }

        public bool IsActiveUserList { set => cbUserList.Enabled = value; }

        public void Attach(ILoginPresenterCallback presenter)
        {
            btnSignIn.Click += (sender, e) =>
            {
                presenter.Login((DesktopUser)cbUserList.SelectedItem, tbPass.Text);
            };
        }

        public void SetFieldList(ILoginViewModel model)
        {
            cbUserList.DisplayMember = "FullName";
            if (model.Users != null && model.Users.Any())
            {
                foreach (var user in model.Users)
                {
                    cbUserList.Items.Add(user);
                }
            }
        }

        
    }
}
