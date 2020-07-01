<?php

namespace App\Providers;

use App\Role;
use App\User;
use App\Model\Pqrs\PqPqr;
use App\Model\Config\Module;
use App\Policies\RolePolicy;
use App\Policies\UserPolicy;
use App\Policies\Pqrs\PqrsPolicy;
use App\Policies\Config\ModulePolicy;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        User::class => UserPolicy::class,
        Role::class => RolePolicy::class,
        Module::class => ModulePolicy::class,
        PqPqr::class => pqrsPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('manage-users', 'App\Policies\UserPolicy@manageUsers');
        Gate::define('manage-roles', 'App\Policies\RolePolicy@manageRoles');

    }
}
