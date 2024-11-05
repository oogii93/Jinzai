<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\Models\JobPost;
use App\Policies\JobPostPolicy;
use Illuminate\Support\Facades\Gate;


class AuthServiceProvider extends ServiceProvider
{

    protected $policies = [
        JobPost::class => JobPostPolicy::class,
    ];
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Register policies without calling registerPolicies()

        // Optionally, you can define Gates here if needed
        Gate::define('manage-jobs', function ($user) {
            return in_array($user->role, ['admin', 'company']);
        });

        Gate::define('view-jobs', function ($user) {
            return in_array($user->role, ['admin', 'company', 'jobseeker']);
        });
    }
}
