<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use App\Model\Config\BirthDate;
use App\User;
use Carbon\Carbon;
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
        return $birthDate = BirthDate::where('birthday_user',1)->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $birthDate = new BirthDate;

        $request->validate([
//            'birthday_user' => 'required|',
//            'user_id' => 'required|',
            'congratulations' => 'required|',
        ]);

        $birthDate->create($request->merge([
            'user_id' => auth()->user()->id,
            'birthday_user' => 1
        ])->all());

    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return void
     */
    public function show(User $user)
    {
        $birthday  = isset($user->birth_date) ?
            Carbon::createFromFormat('Y-m-d', $user->birth_date )->isBirthday(Carbon::now()) : NULL;

        if (!$birthday){
            abort(404);
        }
       return view('config.birth_day.index', compact('user'));
    }

}
