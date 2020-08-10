<?php

namespace App\Policies\Pqrs;

use App\Model\Pqrs\PqPqr;
use App\Model\Config\Module;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PqrsPolicy
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
       return Module::moduleExist('pqrs');
    }

    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return Module::moduleExist('pqrs');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Pqrs\PqPqr  $pqPqr
     * @return mixed
     */
    public function update(User $user, PqPqr $pqPqr)
    {
        $exists = Module::moduleExist('pqrs');

        if (!$exists) {
            return false;
        }

        if ($user->isAdmin()) {
            return true;
        }

        $permissions = $user->modules->where('path','pqrs')->first();

        if (!isset($permissions->path) AND $user->isAssistant()) {
            return false;
        }

        if($pqPqr->user_id == $user->id) {
            return false;
        }

        if($pqPqr->admin_id == NULL) {
            return true;
        }

        if($pqPqr->admin_id == $user->id) {
            return true;
        }

        return false;

    }

    /**
     * Determine whether the user can view any models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function reply(User $user)
    {
        $exists = Module::moduleExist('pqrs');

        if (!$exists) {
            return false;
        }

        if ($user->isAdmin()) {
            return true;
        }

        $permissions = $user->modules->where('path','pqrs')->first();

        if (isset($permissions->path) AND $user->isAssistant()) {
            return true;
        }
    }

    /**
     * Determine whether the user can conf.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function config(User $user)
    {
        $exists = Module::moduleExist('pqrs');

        if (!$exists) {
            return false;
        }

        if ($user->isAdmin()) {
            return true;
        }

        if (isset($permissions->path) AND $user->isDirector()) {
            return true;
        }

        return false;

    }
}
