using App.Desktop.Interface.Data;
using App.Desktop.Interface.Model;
using System.Collections.Generic;

namespace App.Desktop.TagViewer
{
    public class TagViewerViewModel : ITagViewerViewModel
    {
        public IEnumerable<TagGroup> TagGroups { get; set; }
    }
}
