<?php

namespace App\Model\Config;

use App\User;
use Illuminate\Database\Eloquent\Model;

class BirthDate extends Model
{

    protected $fillable = ['birthday_user', 'user_id', 'congratulations'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];

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
