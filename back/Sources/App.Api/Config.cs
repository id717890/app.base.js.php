using Microsoft.Extensions.Options;
using Raffle.Api.Models.ConfigOptions;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace Raffle.Api
{
    public static class Config
    {
        public  const string AdminRole = "Superuser";
        public  const string StandartRole = "Participant";
    }
}
