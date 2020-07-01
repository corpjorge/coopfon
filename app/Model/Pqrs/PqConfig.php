<?php

namespace App\Model\Pqrs;

use Illuminate\Database\Eloquent\Model;

class PqConfig extends Model
{
    protected $table = 'pq_Config';

    protected $fillable = [
        'terms', 'limit_date'
    ];

    public function conf()
    {
        return $this->find(1,['terms', 'limit_date']);
    }
}
