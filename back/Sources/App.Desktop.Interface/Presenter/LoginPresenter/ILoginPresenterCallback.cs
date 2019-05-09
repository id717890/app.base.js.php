using App.Desktop.Interface.Data;

namespace App.Desktop.Interface.Presenter.LoginPresenter
{
    public interface ILoginPresenterCallback
    {
        void Login(DesktopUser user, string password);
    }
}
