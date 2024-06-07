<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->registerPolicies();

        // Define gates for authorization
        Gate::define('edit-settings', function ($user) {
            return $user->isAdmin();
        });

        // Additional authorization logic here

        // Registering Policies
        // $this->registerPostPolicies();
    }

    /**
     * Register the application's policies.
     *
     * @return void
     */
    public function registerPostPolicies(): void
    {
        // Gate::define('update-post', 'App\Policies\PostPolicy@update');
        // Gate::define('delete-post', 'App\Policies\PostPolicy@delete');
    }
}
