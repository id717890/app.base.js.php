using System;
using System.Threading;
using System.Threading.Tasks;
using System.Net.Http;
using System.Configuration;
using Newtonsoft.Json;
using App.RR.Request.Abstraction;

namespace App.Desktop
{
    public class HttpService
    {
        private readonly static string baseUrl = ConfigurationSettings.AppSettings.Get("api");
        private static string token;

        public static void SetUserToken(string t)
        {
            token = t;
        }

        public static async Task<T> PostAsync<T> (string url, IBaseRequest value)
        {
            var client = new HttpClient();
            client.BaseAddress = new Uri(baseUrl);
            client.DefaultRequestHeaders.Add("Authorization", "Bearer " + token);
            var response = await client.PostAsJsonAsync(url, value);
            if (response.IsSuccessStatusCode)
            {
                var res = response.Content.ReadAsAsync<T>();
                return res.Result;
            }
            return default(T);
        }

        public static Task<T> Post<T>(string url, IBaseRequest value)
        {
            var client = new HttpClient();
            client.BaseAddress = new Uri(baseUrl);
            client.DefaultRequestHeaders.Add("Authorization", "Bearer " + token);
            var response = client.PostAsJsonAsync(url, value).Result;
            if (response.IsSuccessStatusCode)
            {
                var res = response.Content.ReadAsAsync<T>();
                return res;
            }
            return null;
        }

        public static async Task<T> GetAsync<T>  (string url)
        {
            var client = new HttpClient();
            client.BaseAddress = new Uri(baseUrl);
            client.DefaultRequestHeaders.Add("Authorization", token);
            var response = await client.GetAsync(url);
            if (response.IsSuccessStatusCode)
            {
                var res = response.Content.ReadAsAsync<T>();
                return res.Result;
            }
            return default(T);
        }
    }
}
