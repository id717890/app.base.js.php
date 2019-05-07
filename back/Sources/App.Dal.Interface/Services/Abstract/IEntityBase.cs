namespace App.Dal.Interface.Services.Abstract
{
    public interface IEntityBase : IEntityBase<int>
    {
    }

    public interface IEntityBase<out T>
    {
        T Id { get; }
    }
}
