using App.Desktop.Interface.Data;
using System.Collections.Generic;

namespace App.Desktop.Interface.Model
{
    public interface ITagViewerViewModel
    {
        IEnumerable<TagGroup> TagGroups { get; set; }
    }
}
