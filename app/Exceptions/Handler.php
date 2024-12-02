<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation errors.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            // Custom reporting logic if needed
        });
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {
        // Handle JSON/AJAX requests with specific error responses
        if ($request->expectsJson() || $request->ajax()) {
            // Authentication errors
            if ($exception instanceof AuthenticationException) {
                return response()->json([
                    'error' => 'Unauthenticated',
                    'message' => 'You are not authenticated'
                ], 401);
            }

            // Validation errors
            if ($exception instanceof ValidationException) {
                return response()->json([
                    'error' => 'Validation Failed',
                    'errors' => $exception->errors()
                ], 422);
            }

            // Route not found
            if ($exception instanceof NotFoundHttpException) {
                return response()->json([
                    'error' => 'Not Found',
                    'message' => 'The requested resource was not found'
                ], 404);
            }

            // General server errors
            return response()->json([
                'error' => 'Server Error',
                'message' => $exception->getMessage() ?? 'An unexpected error occurred'
            ], 500);
        }

        // Default Laravel error handling for non-JSON requests
        return parent::render($request, $exception);
    }
}
