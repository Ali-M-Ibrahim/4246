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
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'secretfilter' => App\Http\Middleware\checksecret::class
        ]);



        $middleware->validateCsrfTokens(except: [
            'route15',
            'route16',
            'route17',
            'route18',
            'addReader2',
            'addReader4',
            'addReader5',
            'updateReader2/*',
            'deleteReader/*',
            'uni',
            'uni/*',
            'update4/*'
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
