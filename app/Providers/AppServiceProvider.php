<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
        Paginator::useBootstrapFive();

        // Share settings with all views
        if (!app()->runningInConsole()) {
            $settings = \App\Models\Setting::pluck('value', 'key');
            view()->share('settings', $settings);
        }
    }
}
