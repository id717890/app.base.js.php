using App.Desktop.Interface.Presenter;
using App.Desktop.Interface.Presenter.Login;
using App.Desktop.Interface.Presenter.MdiContainer;
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
            var mdi = CompositionRoot.Resolve<IMdiPresenter>();
            mdi.Initialize();
            Application.Run((Form)mdi.Ui);
            //Application.Run((Form)presenter.Ui);
        }
    }
}
