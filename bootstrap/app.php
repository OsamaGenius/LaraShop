<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: [
            'web' => __DIR__.'/../routes/web.php',
            'panel' => __DIR__.'/../routes/panel.php'
        ],
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'Auth.admins' => \App\Http\Middleware\AuthenticateAdmin::class,
            'Auth.users' => \App\Http\Middleware\AuthenticateUser::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
