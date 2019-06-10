using App.Desktop.Interface.Data;
using App.Desktop.Interface.Model;
using App.Desktop.Interface.Presenter.Login;
using App.Desktop.Interface.Presenter.MdiContainer;
using App.Desktop.Interface.Service;
using App.Desktop.Interface.View;
using App.Desktop.MdiContainer;
using App.RR.Request;
using App.RR.Response;
using System;
using System.Collections;
using System.Collections.Generic;
using System.Configuration;
using System.IO;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using static App.RR.Response.AuthResponse;

namespace App.Desktop.Login
{
    class LoginPresenter : ILoginPresenter, ILoginPresenterCallback
    {

        private readonly ILoginView _view;
        private readonly ILoginViewModel _model;
        private readonly IMdiPresenter _mdiPresenter;
        private readonly IDialogService _dialogService;


        public LoginPresenter(ILoginView view, ILoginViewModel model, IMdiPresenter mdiPresenter, IDialogService dialogService)
        {
            _view = view;
            _model = model;
            _mdiPresenter = mdiPresenter;
            _dialogService = dialogService;
            _view.IsActiveUserList = false;
        }

        public object Ui => _view;

        public async void Initialize()
        {
            _model.Users = await HttpService.GetAsync<IEnumerable<DesktopUser>>("api/Account/GetAllUsers");
            _view.SetFieldList(_model);
            _view.IsActiveUserList = true;
            _view.Attach(this);
        }

        public bool IsTokenVerifyAsync()
        {
            if (!File.Exists(AppSettings.TokenFile)) return false;
            var str = File.ReadAllText(AppSettings.TokenFile, Encoding.UTF8);
            if (string.IsNullOrEmpty(str)) return false;
            var split = str.Split(';');
            if (split.Length != 2) return false;
            var id = split[0].Split(':');
            if (id.Length != 2) return false;
            CurrentUser.Id = id[1];
            var token = split[1].Split(':');
            if (token.Length != 2) return false;
            CurrentUser.Token = token[1];
            HttpService.SetUserToken(token[1]);
            var response = HttpService.Post<DefaultResponse>("api/Auth/checkauth", new DefaultRequest());
            if (response != null && response.Result.IsSuccess) return true;
            return false;
        }

        public async void Login(DesktopUser user, string password)
        {
            var request = new Auth.Login { Email = user.Email, Password = password };
            var result = await HttpService.PostAsync<TokenResponse>("api/Auth/LoginDesktopUser", request);
            if (result != null && result.IsSuccess )
            {
                WriteTokenToFile(result.Id, result.Token, result.Expiration);
                var login = _view as LoginView;
                login.Hide();
                var mdi = _mdiPresenter.Ui as MdiView;
                if (mdi != null) mdi.Show();
            }
            else _dialogService.ShowMessage("Неверный логин или пароль");
        }

        private void WriteTokenToFile (string id, string token, long expiration)
        {
            StringBuilder str = new StringBuilder();
            str.Append("id:" +id+";");
            str.Append("token:" + token);
            var expirationTime = DateTime.Now.AddSeconds(expiration);
            File.WriteAllText(AppSettings.TokenFile, str.ToString());
        }

        private async Task<IEnumerable<DesktopUser>> GetUsersFromApi2()
        {
            var result = await HttpService.GetAsync<IEnumerable<DesktopUser>>("api/Account/GetAllUsers");
            return result;

            //using (var client = new HttpClient())
            //{
            //    client.BaseAddress = new Uri("https://localhost:44379/");
            //    var response = await client.GetAsync("api/Account/GetAllUsers");
            //    if (response.IsSuccessStatusCode)
            //    {
            //        response.EnsureSuccessStatusCode();
            //        var b = response.Content.ReadAsStringAsync();
            //    }

            //}
        }
    }
}
