using App.Desktop.Interface.Model;
using App.Desktop.Interface.Presenter.MdiContainer;
using App.Desktop.Interface.View;
using App.Desktop.TagViewer;
using System.Windows.Forms;

namespace App.Desktop.MdiContainer
{
    public class MdiPresenter : IMdiPresenter, IMdiPresenterCallback
    {
        private readonly IMdiView _view;
        private readonly IMdiViewModel _model;

        public MdiPresenter(IMdiView view, IMdiViewModel model)
        {
            _view = view;
            _model = model;
        }

        public object Ui => _view;

        public void Initialize()
        {
            _model.menuItems = new string[] { "form1ToolStripMenuItem", "Form2" };
            _view.SetMenu(_model);
            _view.Attach(this);
        }

        public void OpenTagViewerForm()
        {
            var tagViewerView = new TagViewerView() { MdiParent = (Form)_view };
            if (!ViewIsOpen(tagViewerView))
            {
                tagViewerView.Show();
            } else tagViewerView.Activate();
        }

        public void OpenTest()
        {
            var test = new Test() { MdiParent = (Form)_view };
            if (!ViewIsOpen(test))
            {
                test.Show();
            }
            else test.Activate();
        }

        public bool ViewIsOpen(Form f)
        {
            var list = Application.OpenForms;
            foreach (var item in list)
            {
                if (item.GetType() == f.GetType())
                {
                    return true;
                }
            }
            return false;
        }

        private void GetMenuFromApi (Form form)
        {
            

        }
    }
}
