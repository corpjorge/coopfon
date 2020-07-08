<?php

namespace App\Model\Config;

use App\User;
use Illuminate\Database\Eloquent\Model;

class BirthDate extends Model
{
    /**
     * Get the user
     *
     * @return \App\User
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the birth Day User
     *
     * @return \App\User
     */
    public function birthDayUser()
    {
        return $this->belongsTo(User::class, 'birthday_user');
    }
}
