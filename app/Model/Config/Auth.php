<?php

namespace App\Model\Config;

use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
    protected $fillable = ['name', 'path', 'description', 'icon', 'state_id', 'parameters'];



    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'parameters' => 'json',
    ];

}
