using App.Desktop.Interface.Model;
using App.Desktop.Interface.Presenter.LoginPresenter;
using App.Desktop.Interface.View.Abstraction;

namespace App.Desktop.Interface.View
{
    public interface ILoginView: IView<ILoginPresenterCallback>
    {
        bool IsActiveUserList { set; }
        void SetFieldList(ILoginViewModel model);
    }
}
