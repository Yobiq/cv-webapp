<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // This application does not use a database
        // All content is stored in config/cv.php
        
        // Force HTTPS for asset URLs in production
        if (config('app.env') === 'production') {
            \URL::forceScheme('https');
        }
    }
}
