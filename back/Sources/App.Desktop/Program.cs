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
            var loginPresenter = CompositionRoot.Resolve<ILoginPresenter>();
            if (loginPresenter.IsTokenVerifyAsync() == true)
            {
                var mdiPresenter = CompositionRoot.Resolve<IMdiPresenter>();
                mdiPresenter.Initialize();
                Application.Run((Form)mdiPresenter.Ui);
            }
            else
            {
                loginPresenter.Initialize();
                Application.Run((Form)loginPresenter.Ui);
            }
            
        }
    }
}
