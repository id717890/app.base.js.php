using System.ComponentModel;

namespace App.Api
{
    public enum Role
    {
        [Description("Администратор")]
        Admin,

        [Description("Клиент")]
        Client
    }
}
