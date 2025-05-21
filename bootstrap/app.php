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
        $middleware->alias([
            'maintenance' => \App\Http\Middleware\DownForMaintenanceMW::class,
            'auth.custom' => \App\Http\Middleware\AuthCustom::class,
            'session.user' => \App\Http\Middleware\SessionUserAccountMiddleware::class,
        ]);
    })
    ->withExceptions(function ($exceptions) {
        //
    })->create();

