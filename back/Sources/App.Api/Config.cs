using Microsoft.Extensions.Options;
using App.Api.Models.ConfigOptions;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace App.Api
{
    public static class Config
    {
        public  const string AdminRole = "Superuser";
        public  const string StandartRole = "Participant";
    }
}
