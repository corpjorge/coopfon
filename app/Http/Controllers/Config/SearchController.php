<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;

class SearchController extends Controller
{

    /**
     * Show the form for editing the profile.
     *
     * @param $users
     * @return \Illuminate\Support\Collection
     */
    public function users($users = NULL)
    {
        if (strlen($users) >= 4 )
        return $result = \DB::table('users')
            ->orWhere('name','like', "%$users%")
            ->orWhere('email','like', "%$users%")
            ->orWhere('document','like', "%$users%")
            ->get(['id', 'name', 'email', 'document']);
    }
}
