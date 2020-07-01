<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Model\Config\DocumentType;
use App\Model\Config\Module;
use App\Model\Config\Gender;
use App\Model\Config\Member;
use App\Model\Config\City;

class User extends Authenticatable
{
    use Notifiable;

    use SoftDeletes;

    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'picture' , 'document_type_id',
        'birth_date', 'phone', 'gender_id', 'address', 'area', 'city_id',
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
     * Get the city of the user
     *
     * @return \App\Model\Config\City
     */
    public function member()
    {
        return $this->belongsTo(Member::class);
    }

    /**
     * Get the modules of the user
     *
     * @return BelongsToMany
     */
    public function modules()
    {
        return $this->belongsToMany(Module::class, 'user_module');
    }

    /**
     * Get the gender of the member
     *
     * @return mixed $member
     */
    public function memberGender()
    {
        $member = isset($this->member->name) ? $this->member->name : [ "F" => "Asociada", "M" => "Asociado" ];
        return $member[isset($this->gender->abbreviation) ? $this->gender->abbreviation : 'M'];
    }


    /**
     * Get the path to the profile picture
     *
     * @return string
     */
    public function profilePicture()
    {
        if ($this->picture) {
            return "{$this->picture}";
        }

        return "/coopfon/img/placeholder.jpg";
    }

    public function getFullNameAttribute()
    {
        $nameFull = explode(" ",$this->name);
        $NameSecon = isset($nameFull[1]) ? $nameFull[1] : '';
        return "{$nameFull[0]} {$NameSecon}";
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
     * Check if the user has Director role
     *
     * @return boolean
     */
    public function isDirector()
    {
        return $this->role_id <= 4;
    }

    /**
     * Check if the user has Coordinator role
     *
     * @return boolean
     */
    public function isCoordinator()
    {
        return $this->role_id <= 5;
    }

    /**
     * Check if the user has Auxiliary role
     *
     * @return boolean
     */
    public function isAuxiliary()
    {
        return $this->role_id <= 6;
    }

    /**
     * Check if the user has Assistant role
     *
     * @return boolean
     */
    public function isAssistant()
    {
        return $this->role_id <= 7;
    }

    /**
     * Check if the user has External role
     *
     * @return boolean
     */
    public function isExternal()
    {
        return $this->role_id <= 8;
    }

    /**
     * Check if the user has user role
     *
     * @return boolean
     */
    public function isUser()
    {
        return $this->role_id == 9;
    }

    /**
     * Check if the user has Invited role
     *
     * @return boolean
     */
    public function isInvited()
    {
        return $this->role_id == 10;
    }

    /**
     * Check if the user has Public role
     *
     * @return boolean
     */
    public function isPublic()
    {
        return $this->role_id == 11;
    }

    public function adminsAll()
    {
        return $this->where('role_id','!=',9)->where('role_id','!=',1)->get();
    }

}
