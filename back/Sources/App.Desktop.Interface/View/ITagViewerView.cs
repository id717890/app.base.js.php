using App.Desktop.Interface.Model;
using App.Desktop.Interface.Presenter.TagViewer;
using App.Desktop.Interface.View.Abstraction;

namespace App.Desktop.Interface.View
{
    public interface ITagViewerView: IView<ITagViewerPresenterCallback>
    {
        void SetModel(ITagViewerViewModel model);
    }
}
