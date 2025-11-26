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
        // Force array driver if no database is needed
        if (config('database.default') !== 'array' && !env('DB_DATABASE')) {
            config(['database.default' => 'array']);
        }
    }
}
