<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        /* The code snippet `->alias(['isAdmin' => \App\Http\Middleware\IsAdmin::class]);`
        is defining an alias for a middleware in a Laravel application. In Laravel, middleware can
        be assigned aliases for easier reference and usage in route definitions. */
        $middleware->alias([
            'role' => \App\Http\Middleware\CheckAuth::class,
            'isAdmin' => \App\Http\Middleware\IsAdmin::class,
            'investor' => \App\Http\Middleware\InvestorMiddleware::class,
            'owner' => \App\Http\Middleware\Owner::class,
        ]);
        
        // comment this for prodution (disable csrf for route admin)
        // $middleware->validateCsrfTokens(except: [
        //     'admin/*',
        // ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
