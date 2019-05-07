using Microsoft.EntityFrameworkCore.Storage;
using System;
using System.Collections.Generic;
using System.Linq.Expressions;
using System.Threading.Tasks;

namespace App.Dal.Interface.Services.Abstract
{
    interface IEntityBaseRepository<T> where T : class, IEntityBase
    {
        IEnumerable<T> AllIncluding(params Expression<Func<T, object>>[] includeProperties);

        Task<IEnumerable<T>> AllIncludingAsync(params Expression<Func<T, object>>[] includeProperties);

        IEnumerable<T> GetAll();

        Task<IEnumerable<T>> GetAllAsync();

        T GetSingle(int id);

        T GetSingle(Expression<Func<T, bool>> predicate);

        T GetSingle(Expression<Func<T, bool>> predicate, params Expression<Func<T, object>>[] includeProperties);

        Task<T> GetSingleAsync(int id);

        Task<T> GetSingleAsync(Expression<Func<T, bool>> predicate);

        Task<T> GetSingleAsync(int id, params Expression<Func<T, object>>[] includeProperties);

        T GetSingleWithOrdering(Expression<Func<T, bool>> predicate, Expression<Func<T, object>> orderingConditions);

        T GetSingleWithOrderingDescending(Expression<Func<T, bool>> predicate, Expression<Func<T, object>> orderingConditions);

        IEnumerable<T> FindBy(Expression<Func<T, bool>> predicate);

        Task<IEnumerable<T>> FindByAsync(Expression<Func<T, bool>> predicate, params Expression<Func<T, object>>[] includeProperties);

        void Add(T entity);

        Task AddAsync(T entity);

        void Delete(T entity);

        void DeleteObject<TEntity>(TEntity entity) where TEntity : class, IEntityBase;

        void Edit(T entity);

        void Detach(T entity);

        void Commit();

        Task CommitAsync();

        void AddOrUpdate(T entity, bool commitChanges);

        Task AddOrUpdateAsync(T entity, bool commitChanges);

        Task AddOrUpdateObjectAsync<TEntity>(TEntity entity, bool commitChanges) where TEntity : class, IEntityBase;

        IDbContextTransaction GetTransaction();
    }
}
