<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Model\Config\DocumentType;
use App\Model\Config\Gender;
use App\Model\Config\City;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'picture' ,'role_id', 'birth_date'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Get the role of the user
     *
     * @return \App\Role
     */
    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    /**
     * Get the document type of the user
     *
     * @return \App\Model\Config\DocumentType
     */
    public function documentType()
    {
        return $this->belongsTo(DocumentType::class);
    }

    /**
     * Get the gender of the user
     *
     * @return \App\Model\Config\Gender
     */
    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    /**
     * Get the city of the user
     *
     * @return \App\Model\Config\City
     */
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }


    /**
     * Get the path to the profile picture
     *
     * @return string
     */
    public function profilePicture()
    {
        if ($this->picture) {
            return "/storage/{$this->picture}";
        }

        return 'http://i.pravatar.cc/200';
    }

    /**
     * Check if the user has UltraAdmin role
     *
     * @return boolean
     */
    public function isUltraAdmin()
    {
        return $this->role_id == 1;
    }

    /**
     * Check if the user has SuperAdmin role
     *
     * @return boolean
     */
    public function isSuperAdmin()
    {
        return $this->role_id <= 2;
    }

    /**
     * Check if the user has admin role
     *
     * @return boolean
     */
    public function isAdmin()
    {
        return $this->role_id <= 3;
    }

    /**
     * Check if the user has creator role
     *
     * @return boolean
     */
    public function isCreator()
    {
        return $this->role_id == 2;
    }

    /**
     * Check if the user has user role
     *
     * @return boolean
     */
    public function isMember()
    {
        return $this->role_id == 3;
    }
}
