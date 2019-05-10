using App.Desktop.Interface.Service;
using System.Windows.Forms;

namespace App.Desktop.Service
{
    public class DialogService : IDialogService
    {
        public void ShowMessage(string message)
        {
            MessageBox.Show(message);
        }
    }
}
