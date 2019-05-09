namespace App.Desktop.Interface.Presenter.Abstraction
{
    public interface IPresenter
    {
        void Initialize();
        object Ui { get; }
    }
}
