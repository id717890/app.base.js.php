using App.Desktop.Interface.Model;
using App.Desktop.Interface.Presenter.MdiContainer;
using App.Desktop.Interface.View.Abstraction;

namespace App.Desktop.Interface.View
{
    public interface IMdiView: IView<IMdiPresenterCallback>
    {
        void SetMenu(IMdiViewModel model);
    }
}
