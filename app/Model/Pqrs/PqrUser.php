<?php

namespace App\Model\Pqrs;

use App\User;
//use Illuminate\Database\Eloquent\Model;

class PqrUser extends User
{
    protected $table = 'users';

    /**
     * Get the pqrs for the User.
     */
    public function pqrs()
    {
        return $this->hasMany('App\Model\Pqrs\PqPqr', 'user_id');
    }
}
