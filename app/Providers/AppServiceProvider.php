<?php

namespace App\Providers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
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

        // method 2 to disable fillable
        Model::unguard();

        // conditionally allows entry
        // note: this fails if the user is not signed in, so either set "User $user = null" or make it nullable "?User"
        // Gate::define('edit-job', function (User $user, Job $job) {
        //     return $job->employer->user->is($user);
        // });
    }
}
