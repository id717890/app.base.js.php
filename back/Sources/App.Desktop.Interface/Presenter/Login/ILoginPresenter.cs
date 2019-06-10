using App.Desktop.Interface.Presenter.Abstraction;
using System.Threading.Tasks;

namespace App.Desktop.Interface.Presenter.Login
{
    public interface ILoginPresenter: IPresenter
    {
        bool IsTokenVerifyAsync();
    }
}
