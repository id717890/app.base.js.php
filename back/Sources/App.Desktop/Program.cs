using App.Desktop.Interface.Presenter;
using App.Desktop.Interface.Presenter.LoginPresenter;
using Ninject;
using System;
using System.Windows.Forms;

namespace App.Desktop
{
    static class Program
    {
        /// <summary>
        /// The main entry point for the application.
        /// </summary>
        [STAThread]
        static void Main()
        {
            Application.EnableVisualStyles();
            Application.SetCompatibleTextRenderingDefault(false);

            var kernel = new StandardKernel();

            CompositionRoot.Init(kernel);
            CompositionRoot.Wire(new CompositeModule());
            var presenter = CompositionRoot.Resolve<ILoginPresenter>();
            presenter.Initialize();
            Application.Run((Form)presenter.Ui);
        }
    }
}
