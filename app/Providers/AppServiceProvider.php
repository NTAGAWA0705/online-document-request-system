<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
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
        Model::unguard();


        // Define a super user
        Gate::before(function (User $user) {
            if (auth()->user()->userrole === 'superAdmin') {
                return true;
            }
        });

        // ##### STUDENT
        // Should return TRUE or FALSE
        Gate::define('request_document', function (User $user) {
            return $user->user_type === 'student';
        });

        // ##### ADMIN
        // Should return TRUE or FALSE
        Gate::define('manage_users', function (User $user) {
            return $user->user_type === 'admin';
        });

        // Should return TRUE or FALSE
        Gate::define('add_new_students', function (User $user) {
            return $user->user_type === 'admin';
        });

        // Should return TRUE or FALSE
        Gate::define('view_users', function (User $user) {
            return $user->user_type === 'admin';
        });

        // Should return TRUE or FALSE
        Gate::define('manage_users', function (User $user) {
            return $user->user_type === 'admin';
        });

        // Should return TRUE or FALSE
        Gate::define('manage_departments', function (User $user) {
            return $user->user_type === 'admin';
        });

        // Should return TRUE or FALSE
        Gate::define('manage_courses', function (User $user) {
            return $user->user_type === 'admin' || ($user->user_type === 'staff' && $user->userrole === 'faculty');
        });


        // ##### VLAC
        // Should return TRUE or FALSE
        Gate::define('view_all_requests', function (User $user) {
            return $user->user_type === 'staff';
        });

        // Should return TRUE or FALSE
        Gate::define('final_approval', function (User $user) {
            return $user->user_type === 'staff' && $user->userrole === 'vlac';
        });

        // Should return TRUE or FALSE
        Gate::define('approve', function (User $user) {
            return $user->user_type === 'staff';
        });

        // ##### FINANCE
        // Should return TRUE or FALSE
        Gate::define('validate_payment_proof', function (User $user) {
            return $user->user_type === 'staff' && $user->userrole === 'finance';
        });

        // Should return TRUE or FALSE
        Gate::define('everything', function (User $user) {
            return $user->userrole === 'superAdmin';
        });
    }
}
