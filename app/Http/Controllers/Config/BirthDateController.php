<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use App\Model\Config\BirthDate;
use App\User;
use Illuminate\Http\Request;

class BirthDateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return void
     */
    public function show(User $user)
    {
       return view('config.birth_day.index', compact('user'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Config\BirthDate  $birthDate
     * @return \Illuminate\Http\Response
     */
    public function destroy(BirthDate $birthDate)
    {
        //
    }
}
