using App.Desktop.Interface.Data;

namespace App.Desktop.Interface.Presenter.Login
{
    public interface ILoginPresenterCallback
    {
        void Login(DesktopUser user, string password);
    }
}
