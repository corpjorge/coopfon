<?php

namespace App\Policies\Config;

use App\User;
use App\Model\Config\Module;
use Illuminate\Auth\Access\HandlesAuthorization;

class ModulePolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        return $user->isUltraAdmin();
    }

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Config\Module  $module
     * @return mixed
     */
    public function view(User $user, Module $module)
    {
        return $user->isUltraAdmin();
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $user->isUltraAdmin();
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Config\Module  $module
     * @return mixed
     */
    public function update(User $user, Module $module)
    {
        return $user->isUltraAdmin();
    }

    /**
     * Determine whether the user can delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Config\Module  $module
     * @return mixed
     */
    public function delete(User $user, Module $module)
    {
        return $user->isUltraAdmin();
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Config\Module  $module
     * @return mixed
     */
    public function restore(User $user, Module $module)
    {
        return $user->isUltraAdmin();
    }

    /**
     * Determine whether the user can permanently delete the model.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Config\Module  $module
     * @return mixed
     */
    public function forceDelete(User $user, Module $module)
    {
        return $user->isUltraAdmin();
    }

    /**
     * Determine whether the authenticate user can manage modules.
     *
     * @param  \App\User  $user
     * @return boolean
     */
    public function manageModules(User $user)
    {
        return $user->isUltraAdmin();
    }

}
