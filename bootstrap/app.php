<?php

use App\Http\Middleware\UserOnly;
use App\Http\Middleware\AdminOnly;
use App\Http\Middleware\NoRoleOnly;
use App\Http\Middleware\ManagerOnly;
use App\Http\Middleware\NonUserOnly;
use App\Http\Middleware\CaretakerOnly;
use Illuminate\Foundation\Application;
use App\Http\Middleware\MedicalStaffOnly;
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
            'nonuser' => NonUserOnly::class,
            'user'=>UserOnly::class,
            'noRole'=> NoRoleOnly::class,
            'adminOnly'=>AdminOnly::class,
            'caretakerOnly'=>CaretakerOnly::class,
            'managerOnly'=>ManagerOnly::class,
            'medicalStaffOnly'=>MedicalStaffOnly::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
