<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param \App\User $model
     * @return \Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function welcome(User $model)
    {
        $birthUsers = $model->where('birth_date',Carbon::today()->toDateString())->get(['id','name']);
        return view('pages.welcome', ['birthUsers' => $birthUsers]);
    }
}
