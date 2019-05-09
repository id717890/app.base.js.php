namespace App.Desktop.Interface.View.Abstraction
{
    public interface IView<TCallbacks>
    {
        void Attach(TCallbacks presenter);
    }
}
