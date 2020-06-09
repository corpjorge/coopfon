<?php

namespace App\Model\Config;

use App\Model\Config\Department;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'city';

    protected $primaryKey = 'code';

    /**
     * Get the department of the Cities
     *
     * @return \App\Model\Config\Department
     */
    public function department()
    {
        return $this->belongsTo(Department::class, 'code_dep_id');
    }
}
