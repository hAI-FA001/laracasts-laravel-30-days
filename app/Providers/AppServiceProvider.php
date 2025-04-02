<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
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
        // triggered after all project dependencies have been loaded
        Model::preventLazyLoading();  // note: "prevent", not the one with "prevents"

        // configure defaults for pagination
        // Paginator::$defaultView('myview123');
        // Paginator::useBootstrapFive();
    }
}
