<?php

namespace App\Model\Config;

use App\Model\Config\Department;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class City extends Model
{
    protected $table = 'city';

    protected $primaryKey = 'code';

    /**
     * Get the department of the Cities
     *
     * @return BelongsTo
     */
    public function department()
    {
        return $this->belongsTo(Department::class, 'code_dep_id');
    }
}
