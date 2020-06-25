<?php

namespace App\Model\Config;

use Illuminate\Database\Eloquent\Model;

class Auth extends Model
{
    protected $fillable = ['name', 'path', 'description', 'icon', 'state_id', 'parameters'];


    /**
     * Get the parameters of the Auth
     *
     * @return mixed $member
     */
    public function parametersJSON()
    {
        $parametersJSON = isset($this->parameters) ? $this->parameters : NULL;
        return $parametersJSON = json_decode($parametersJSON);

    }
}
