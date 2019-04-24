using Newtonsoft.Json;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;

namespace Raffle.Api.ViewModels
{
    public class GiftViewModel
    {
        public class GiftView
        {
            [JsonProperty("id")]
            public long Id { get; set; }

            [Required, JsonProperty("name")]
            public string Name { get; set; }

            [JsonProperty("image")]
            public string Image { get; set; }

            [JsonProperty("imageLocal")]
            public string ImageLocal { get; set; }

            [JsonProperty("descriptionFull")]
            public string DescriptionFull { get; set; }

            [JsonProperty("descriptionShort")]
            public string DescriptionShort { get; set; }
        }

        public class GiftDrawWinnerKey
        {
            public string Key { get; set; }
        }

        public class GiftDrawId
        {
            public long Id { get; set; }
        }

        public class GiftDraw
        {
            public long IdRow { get; set; }
            public long IdGift { get; set; }
            public string GiftName { get; set; }
            public string GiftDescriptionFull { get; set; }
            public string GiftDescriptionShort { get; set; }
            public string Image { get; set; }
            public string ImageLocal { get; set; }
            //public string Info { get; set; }
            public decimal Price { get; set; }
            public decimal PriceKey { get; set; }
            public decimal Reached { get; set; }
            public bool IsDelete { get; set; }
            public string WinnerKey { get; set; }
        }

        public class GiftDrawUserView
        {
            public long IdRow { get; set; }
            public long IdGiftDraw { get; set; }
            public long IdGift { get; set; }
            public bool IsDelete { get; set; }
            public string GiftName { get; set; }
            public string GiftDescriptionFull { get; set; }
            public string GiftDescriptionShort { get; set; }
            public string Image { get; set; }
            public string ImageLocal { get; set; }
            public decimal Price { get; set; }
            public decimal PriceKey { get; set; }
            public decimal Reached { get; set; }
            public string WinnerKey { get; set; }
            public bool IsWin { get; set; }
            public IEnumerable<GiftDrawUserKeyView> Keys { get; set; }
        }

        public class GiftDrawUserKeyView
        {
            public long Id { get; set; }
            public string Key { get; set; }
            public decimal Price { get; set; }
        }
    }
}
