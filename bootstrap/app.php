<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\LogAcessoMiddleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'log.acesso' => LogAcessoMiddleware::class,
            'autenticacao' => App\Http\Middleware\AutencicacaoMiddleware::class,
        ]);
        $middleware->web(append: [
            'log.acesso',
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
