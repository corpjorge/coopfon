<?php

namespace App\Model\Pqrs;

use App\User;
use Illuminate\Database\Eloquent\Model;

class PqPqr extends Model
{
    protected $fillable = [
        'user_id', 'admin_id', 'state', 'description', 'reply', 'file'
    ];


    /**
     * Get the user of the pqr
     *
     * @return \App\User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
