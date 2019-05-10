using App.Desktop.Interface.Data;
using App.Desktop.Interface.Model;
using App.Desktop.Interface.Presenter.Login;
using App.Desktop.Interface.Presenter.MdiContainer;
using App.Desktop.Interface.Service;
using App.Desktop.Interface.View;
using App.Desktop.MdiContainer;
using App.RR.Request;
using App.RR.Response;
using System.Collections;
using System.Collections.Generic;
using System.Threading.Tasks;
using System.Windows.Forms;

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

        public async void Login(DesktopUser user, string password)
        {
            var request = new Auth.Login { Email = user.Email, Password = password };
            var result = await HttpService.PostAsync<DefaultResponse>("api/Auth/LoginDesktopUser", request);
            if (result != null && result.IsSuccess )
            {
                var login = _view as LoginView;
                login.Hide();
                var mdi = _mdiPresenter.Ui as MdiView;
                if (mdi != null) mdi.Show();
            }
            else _dialogService.ShowMessage("Неверный логин или пароль");
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
