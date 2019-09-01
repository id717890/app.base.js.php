<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
//        return parent::render($request, $exception);

        if ($exception instanceof \Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException) {
            return response()->json([
                'success' => false,
                'error' => [
                    'code' => $exception->getCode(),
                    'message' => $exception->getMessage()
                ]
            ], $exception->getStatusCode());

//            switch (get_class($exception->getPrevious())) {
//                case \Tymon\JWTAuth\Exceptions\TokenExpiredException::class:
//                    return response()->json([
//                        'success' => 'error',
//                        'error' => [
//                            'code' => $exception->getCode(),
//                            'message' => $exception->getMessage()
//                        ]
//                    ], $exception->getStatusCode());
//                case \Tymon\JWTAuth\Exceptions\TokenInvalidException::class:
//                case \Tymon\JWTAuth\Exceptions\TokenBlacklistedException::class:
//                    return response()->json([
//                        'success' => 'error',
//                        'message' => 'Token is invalid'
//                    ], $exception->getStatusCode());
//                case \Tymon\JWTAuth\Exceptions\::class
//
//                    :
//
//                default:
//                    break;
//            }
        }

        if ($request->ajax() || $request->wantsJson() || $request->json()) {
            $json = [
                'success' => false,
                'error' => [
                    'code' => $exception->getCode(),
                    'message' => $exception->getMessage()
                ]
            ];
            $headers = ['Content-Type' => 'application/json; charset=utf-8'];
            return response()->json($json, 400, $headers, JSON_UNESCAPED_UNICODE);
        }
        return parent::render($request, $exception);
    }
}
