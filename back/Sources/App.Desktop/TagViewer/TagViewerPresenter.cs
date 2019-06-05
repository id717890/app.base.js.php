using App.Desktop.Interface.Model;
using App.Desktop.Interface.Presenter.TagViewer;
using App.Desktop.Interface.View;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace App.Desktop.TagViewer
{
    public class TagViewerPresenter: ITagViewerPresenter, ITagViewerPresenterCallback
    {
        private readonly ITagViewerView _view;
        private readonly ITagViewerViewModel _model;

        public TagViewerPresenter(ITagViewerView view, ITagViewerViewModel model)
        {
            _view = view;
            _model = model;
        }

        public object Ui => _view;

        public void Initialize()
        {
            _view.SetModel(_model);
            _view.Attach(this);
        }
    }
}
