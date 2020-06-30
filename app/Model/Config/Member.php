<?php

namespace App\Model\Config;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{


    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'name' => 'json',
    ];
}
