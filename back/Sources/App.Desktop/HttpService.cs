using System;
using System.Threading;
using System.Threading.Tasks;
using System.Net.Http;
using System.Configuration;
using Newtonsoft.Json;

namespace App.Desktop
{
    public class HttpService
    {
        private readonly static string baseUrl = ConfigurationSettings.AppSettings.Get("api");

        public static Task<HttpResponseMessage> PostAsync<T> (string url, T value)
        {
            var client = new HttpClient();
            client.BaseAddress = new Uri(url);
            return client.PostAsJsonAsync(url, value, CancellationToken.None);
        }

        public static async Task<T> GetAsync<T>  (string url)
        {
            var client = new HttpClient();
            client.BaseAddress = new Uri(baseUrl);
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
