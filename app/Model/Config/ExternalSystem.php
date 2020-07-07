<?php

namespace App\Model\Config;

use Illuminate\Database\Eloquent\Model;

class ExternalSystem extends Model
{
    protected $fillable = ['name', 'path', 'description', 'state_id', 'parameters'];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'parameters' => 'json',
    ];

    /**
     * Scope a query to only include module exists
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     *
     * @return bool
     */
    public function scopeSystemActive($query)
    {
        return $query->where('state_id',1)->get();
    }
}
