<?php

use Illuminate\Foundation\Application;
use App\Http\Middleware\AuthMiddleware;
use App\Http\Middleware\RoleCheckMiddleware;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\RedirectIfAuthenticated;
// use Illuminate\Auth\Middleware\RedirectIfAuthenticated;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias(['authCheck'=>AuthMiddleware::class,
        // 'role' => RoleCheckMiddleware::class,
        'IfAuthenticated' => RedirectIfAuthenticated::class,
        'role' => \App\Http\Middleware\RoleMiddleware::class,

    ]);
       
    }) 
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();

    
