<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use App\Http\Middleware\CheckAdmin;
use App\Http\Middleware\ShareData;
return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'CheckAdmin' => CheckAdmin::class,
            'ShareData' => ShareData::class
        ]);
        
    })
    ->withExceptions(function (Exceptions $exceptions) {
        // Handle all application exceptions
        
    })->create();
