<?php

namespace App\Policies;

use App\User;
use App\Role;
use Illuminate\Auth\Access\HandlesAuthorization;

class RolePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can see the roles.
     *
     * @param  \App\User  $user
     * @return boolean
     */
    public function viewAny(User $user)
    {
        return $user->isSuperAdmin();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Role  $role
     * @return mixed
     */
    public function view(User $user, Role $role)
    {
        return $user->isSuperAdmin();
    }

    /**
     * Determine whether the user can create roles.
     *
     * @param  \App\User  $user
     * @return boolean
     */
    public function create(User $user)
    {
        return $user->isSuperAdmin();
    }

    /**
     * Determine whether the user can update the role.
     *
     * @param  \App\User  $user
     * @param  \App\Role  $role
     * @return boolean
     */
    public function update(User $user, Role $role)
    {
        return $user->isSuperAdmin();
    }

    /**
     * Determine whether the authenticate user can manage roles.
     *
     * @param  \App\User  $user
     * @return boolean
     */
    public function manageRoles(User $user)
    {
        return $user->isSuperAdmin();
    }
}
