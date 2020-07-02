<?php

namespace App\Model\Pqrs;

use App\User;
use Illuminate\Database\Eloquent\Model;

class PqPqr extends Model
{
    /**
     * Get the user of the pqr
     *
     * @return \App\User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user of the pqr
     *
     * @return \App\User
     */
    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }
}
