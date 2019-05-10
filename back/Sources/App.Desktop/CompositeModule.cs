using App.Desktop.Interface.Model;
using App.Desktop.Interface.Presenter.Login;
using App.Desktop.Interface.Presenter.MdiContainer;
using App.Desktop.Interface.Service;
using App.Desktop.Interface.View;
using App.Desktop.Login;
using App.Desktop.MdiContainer;
using App.Desktop.Service;
using Ninject.Modules;

namespace App.Desktop
{
    class CompositeModule : NinjectModule
    {
        public override void Load()
        {
            Bind<IDialogService>().To<DialogService>();

            Bind<IMdiPresenter>().To<MdiPresenter>();
            Bind<IMdiView>().To<MdiView>();

            Bind<ILoginPresenter>().To<LoginPresenter>();
            Bind<ILoginView>().To<LoginView>();
            Bind<ILoginViewModel>().To<LoginViewModel>();

            //Bind<IMnaPresenter>().To<MnaPresenter>();
            //Bind<IMnaView>().To<MNA>();
            //Bind(typeof(IMnaView)).To(typeof(MNA));
            //Bind(typeof(IMnaPresenter)).To(typeof(MnaPresenter));
            //Bind<MNA>().ToSelf();
        }
    }
}
