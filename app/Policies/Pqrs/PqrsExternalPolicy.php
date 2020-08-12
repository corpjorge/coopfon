<?php

namespace App\Policies\Pqrs;

use App\Model\Config\Module;
use App\Model\Pqrs\PqPqrsExternal;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PqrsExternalPolicy
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
        $exists = Module::moduleExist('pqrs');

        if (!$exists) {
            return false;
        }

        if ($user->isAdmin()){
            return true;
        }

        $permissions = $user->modules->where('path','pqrs')->first();

        if (isset($permissions->path) and $user->isAssistant()) {
            return true;
        }
    }


    /**
     * Determine whether the user can create models.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(?User $user)
    {
        return Module::moduleExist('pqrs');
    }

    /**
     * Determine whether the user can update the model.
     *
     * @param  \App\User  $user
     * @param  \App\Model\Pqrs\PqPqrsExternal  $pqPqrsExternal
     * @return mixed
     */
    public function update(User $user, PqPqrsExternal $pqPqrsExternal)
    {
        $exists = Module::moduleExist('pqrs');

        if (!$exists) {
            return false;
        }

        if ($user->isAdmin()) {
            return true;
        }

        $permissions = $user->modules->where('path','pqrs')->first();

        if (!isset($permissions->path) and $user->isAssistant()) {
            return false;
        }

        if($pqPqrsExternal->document == $user->document) {
            return false;
        }

        if($pqPqrsExternal->admin_id == NULL) {
            return true;
        }

        if($pqPqrsExternal->admin_id == $user->id) {
            return true;
        }

        return false;
    }

}
