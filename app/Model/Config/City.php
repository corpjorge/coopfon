<?php

namespace App\Model\Config;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city';

    protected $primaryKey = 'code';
}
