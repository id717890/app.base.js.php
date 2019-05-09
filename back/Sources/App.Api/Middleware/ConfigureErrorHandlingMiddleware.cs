using Microsoft.AspNetCore.Builder;

namespace App.Api.Middleware
{
    public static class ConfigureErrorHandlingMiddleware
    {
        public static IApplicationBuilder UseCustomExceptionMiddleware(this IApplicationBuilder app)
        {
            return app.UseMiddleware<ErrorHandlingMiddleware>();
        }
    }
}
