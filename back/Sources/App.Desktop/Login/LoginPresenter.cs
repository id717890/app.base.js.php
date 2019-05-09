using App.Desktop.Interface.Data;
using App.Desktop.Interface.Model;
using App.Desktop.Interface.Presenter.LoginPresenter;
using App.Desktop.Interface.View;
using System.Collections;
using System.Collections.Generic;
using System.Threading.Tasks;

namespace App.Desktop.Login
{
    class LoginPresenter : ILoginPresenter, ILoginPresenterCallback
    {
        private readonly ILoginView _view;
        private readonly ILoginViewModel _model;

        public LoginPresenter(ILoginView view, ILoginViewModel model)
        {
            _view = view;
            _model = model;
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
