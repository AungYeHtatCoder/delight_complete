<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        $this->registerPolicies();

    Gate::define('plan_access', function ($user) {
    return $user->is_admin;  // Notice it's snake_case, not camelCase
    });

    Gate::define('user_access', function ($user) {
    return $user->is_admin || $user->is_user; // Notice it's snake_case, not camelCase
    });

    // other gates access

    Gate::define('role_access', function ($user) {
    return $user->is_admin;  // Notice it's snake_case, not camelCase
    });

    Gate::define('service_access', function ($user) {
    return $user->is_admin;  // Notice it's snake_case, not camelCase
    });

    Gate::define('our_client_access', function ($user) {
    return $user->is_admin;  // Notice it's snake_case, not camelCase
    });

    Gate::define('simple_access', function ($user) {
    return $user->is_admin;  // Notice it's snake_case, not camelCase
    });

    Gate::define('user_create', function ($user) {
    return $user->is_admin;  // Notice it's snake_case, not camelCase
    });

    Gate::define('user_edit', function ($user) {
    return $user->is_admin;  // Notice it's snake_case, not camelCase
    });

    Gate::define('user_show', function ($user) {
    return $user->is_admin;  // Notice it's snake_case, not camelCase
    });
    Gate::define('user_delete', function ($user) {
    return $user->is_admin;  // Notice it's snake_case, not camelCase
    });

    }
}