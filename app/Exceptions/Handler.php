<?php

namespace App\Exceptions;

use Dotenv\Exception\ValidationException;
use Freelabois\LaravelQuickstart\Exceptions\BadRequest;
use Freelabois\LaravelQuickstart\Exceptions\Unauthenticated;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Lang;
use Throwable;
use Whoops\Handler\JsonResponseHandler;
use Whoops\Run;

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
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, \Throwable $exception)
    {

        if (app()->environment('testing')) {
            throw $exception;
        }

        if ($exception instanceof AuthenticationException) {
            throw new Unauthenticated(Lang::get('exceptions.users.not_authenticated'), 401);
        }

        if ($exception instanceof ValidationException) {
            $errors = $exception->errors();
            return response()->json([
                'error' => ['message' => $exception->getMessage(), 'errors' => $errors]
            ], 422);
        }

        if ($exception instanceof QueryException) {
            return response()->json([
                'error' => ['message' => $exception->getMessage()]
            ], 500);
        }

        if ($exception instanceof BadRequest) {
            return response()->json([
                'error' => ['message' => $exception->getMessage()],
            ], 400);
        }


        return self::renderJson($exception);
    }


    /**
     * Render an exception into a JSON HTTP response.
     *
     * @param \Exception $e
     * @return Response
     */
    public static function renderJson(\Throwable $e)
    {
        $whoops = new Run();
        $whoops->pushHandler(new JsonResponseHandler());
        $whoops->sendHttpCode($e->getCode() ? $e->getCode() : 500);

        return new Response(
            $whoops->handleException($e)
        );
    }
}
