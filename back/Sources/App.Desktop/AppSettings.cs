using System;
using System.Collections.Generic;
using System.Configuration;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace App.Desktop
{
    public class AppSettings
    {
        public static string AppFolder = AppDomain.CurrentDomain.BaseDirectory;
        public static string TokenFile { get => AppFolder + ConfigurationSettings.AppSettings.Get("tokenfile"); }

    }
}
