<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
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
        // Should return TRUE or FALSE
        Gate::define('manage_users', function (User $user) {
            return $user->user_type === 'admin';
        });

        // Should return TRUE or FALSE
        Gate::define('request_document', function (User $user) {
            return $user->user_type === 'student';
        });
    }
}
