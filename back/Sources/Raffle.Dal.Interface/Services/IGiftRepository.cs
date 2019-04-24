using Raffle.Domain.Interface.Entity;
using System.Collections.Generic;
using System.Threading.Tasks;

namespace Raffle.Dal.Interface.Services
{
    public interface IGiftRepository: IRepository<Gift>
    {
        Task<IEnumerable<Gift>> GetAllForAdmin();
    }
}
