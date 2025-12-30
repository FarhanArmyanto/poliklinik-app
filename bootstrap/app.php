<?php

use App\Http\Middleware\RoleMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\View\ViewServiceProvider;
use Illuminate\View\FileViewFinder;

return Application::configure(basePath: dirname(__DIR__))
    ->withProviders([
        ViewServiceProvider::class,
    ])
    ->withBindings([
        FileViewFinder::class => function ($app) {
            return new FileViewFinder(
                $app['files'],
                [resource_path('views')]
            );
        },
    ])
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role' => RoleMiddleware::class,
        ]);
    })
    ->withExceptions(function () {
        //
    })
    ->create();
