<?php

namespace App\Model\Config;

use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Module extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = ['name', 'path', 'version', 'state_id'];

    /**
     * Get the users of the module
     *
     * @return BelongsToMany
     */
    public function users()
    {
        return $this->belongsToMany(User::class, 'user_module');
    }

    public function active()
    {
        return $this->where('state_id',1)->get(['id', 'name']);
    }

    /**
     * Scope a query to only include module exists
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     *
     */
    public function scopeModuleExist($query, $path)
    {
        return $query->where('path',$path)->where('state_id',1)->exists();
    }

}
