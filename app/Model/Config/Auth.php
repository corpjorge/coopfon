<?php

namespace App\Model\Config;

use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
    protected $fillable = ['name', 'path', 'description', 'icon', 'state_id'];
}
