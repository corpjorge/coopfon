<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'description'];

    /**
     * Get the users for the role
     *
     * @return void
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function list(array $array)
    {
        return $this->where('id','!=',1)->where('id','<',8)->get();
    }
}
