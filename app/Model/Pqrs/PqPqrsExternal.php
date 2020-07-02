<?php

namespace App\Model\Pqrs;

use App\User;
use Illuminate\Database\Eloquent\Model;

class PqPqrsExternal extends Model
{
    protected $table = 'Pq_pqrs_external';

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
