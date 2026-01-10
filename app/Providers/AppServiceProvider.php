<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\URL; // <--- 1. INI WAJIB DITAMBAH

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // 2. INI JUGA WAJIB DITAMBAH
        // Ini artinya: Kalau lagi di Railway (production), paksa semua link jadi HTTPS
        if (app()->environment('production')) {
            URL::forceScheme('https');
        }
    }
}