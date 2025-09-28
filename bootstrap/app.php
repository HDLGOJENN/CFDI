<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        api: __DIR__.'/../routes/api.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
->withMiddleware(function (Middleware $middleware): void {
    // Alias para usarlo en rutas
    $middleware->alias([
        'prevent-back-history' => \App\Http\Middleware\PreventBackHistory::class,
    ]);

    // (Opcional) Si algún día quisieras aplicarlo a TODO el grupo web:
    // $middleware->group('web', [
    //     \App\Http\Middleware\PreventBackHistory::class,
    // ]);
})

    ->withExceptions(function (Exceptions $exceptions): void {
        //
    })->create();
