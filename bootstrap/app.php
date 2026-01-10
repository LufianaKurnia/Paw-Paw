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

        // 1. ATURAN UNTUK TAMU (Guest)
        // Kalau tamu nyasar ke halaman Dashboard (yang dikunci),
        // lempar dia ke halaman login khusus petshop.
        // INI YANG MEMPERBAIKI ERROR "Route [login] not defined"
        $middleware->redirectGuestsTo(fn () => route('petshop.login'));

        // 2. ATURAN UNTUK MEMBER (Auth)
        // Kalau member yang sudah login iseng buka halaman Login lagi,
        // tendang dia balik ke Dashboard.
        $middleware->redirectUsersTo(fn () => route('petshop.dashboard'));

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();