<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

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
        // Define your allowed IP address here
        $allowedIp = '103.176.135.134'; // Replace with your IP address

        // Check if the client IP matches the allowed IP
        if ($this->app->environment() !== 'production' && request()->ip() === $allowedIp) {
            // Enable debug for the allowed IP
            Config::set('app.debug', true);
        }
    }
}
