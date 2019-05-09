using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Linq;
using Microsoft.AspNetCore.Mvc.Rendering;

namespace App.Infrastructure
{
    public static class Extensions
    {
        public static T AsEnum<T>(this string str) where T : struct
        {
            return (T)Enum.Parse(typeof(T), str);
        }

        public static List<SelectListItem> GetEnumDisplayValues<T>() where T : struct
        {
            var items = new List<SelectListItem>();
            foreach (var item in Enum.GetValues(typeof(T)))
            {
                var fi = typeof(T).GetField(item.ToString());
                var attribute = fi.GetCustomAttributes(typeof(DescriptionAttribute), true).FirstOrDefault();

                var enumName = Enum.GetName(typeof(T), item);
                var title = attribute == null ? enumName : ((DescriptionAttribute)attribute).Description;

                var listItem = new SelectListItem
                {
                    Value = ((int)item).ToString(),
                    Text = title
                };
                items.Add(listItem);
            }

            return items;
        }

        public static string GetEnumDescription<T>(this T value) where T : struct
        {
            var fi = typeof(T).GetField(value.ToString());
            var attribute = fi.GetCustomAttributes(typeof(DescriptionAttribute), true).FirstOrDefault();

            var enumName = Enum.GetName(typeof(T), value);
            var title = attribute == null ? enumName : ((DescriptionAttribute)attribute).Description;

            return title;
        }
    }
}
