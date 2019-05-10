using App.Desktop.Interface.Presenter.MdiContainer;
using App.Desktop.Interface.View;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace App.Desktop.MdiContainer
{
    public class MdiPresenter : IMdiPresenter, IMdiPresenterCallback
    {
        private readonly IMdiView _view;
        //private readonly ILoginViewModel _model;

        public MdiPresenter(IMdiView view)
        {
            _view = view;
        }

        public object Ui => _view;

        public void Initialize()
        {
            throw new NotImplementedException();
        }
    }
}
