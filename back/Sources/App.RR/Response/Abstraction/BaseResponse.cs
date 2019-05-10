namespace App.RR.Response.Abstraction
{
    public abstract class BaseResponse
    {
        public int ErrorCode { get; set; } = 0;
        public string Message { get; set; } = string.Empty;

        public bool IsSuccess
        {
            get { return ErrorCode == 0 && Message == string.Empty; }
        }
    }
}
