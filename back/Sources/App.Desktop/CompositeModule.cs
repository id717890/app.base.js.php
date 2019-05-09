using App.Desktop.Interface.Model;
using App.Desktop.Interface.Presenter.LoginPresenter;
using App.Desktop.Interface.View;
using App.Desktop.Login;
using Ninject.Modules;

namespace App.Desktop
{
    class CompositeModule : NinjectModule
    {
        public override void Load()
        {

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
