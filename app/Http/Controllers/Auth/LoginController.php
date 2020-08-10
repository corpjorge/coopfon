<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Model\Config\Auth as AuthCustom;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        $AuthCustoms = AuthCustom::Where('state_id', 1)->get();
        return view('auth.login', ['AuthCustoms' => $AuthCustoms]);
    }

    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @param $driver
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function redirectToProvider($driver)
    {
        $AuthCustom = AuthCustom::Where('path', $driver)->where('state_id', 1)->first();

        if ($AuthCustom){
            return Socialite::driver($driver)->redirect();
        }

        return redirect('login');
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @param $driver
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function handleProviderCallback($driver)
    {
         $userSocial = Socialite::driver($driver)->user();
         $user = User::where('email', $userSocial->email)->first();

         if ($user) {
             Auth::login($user);
             $user->name =$userSocial->name;
             $user->picture =$userSocial->avatar;
             $user->save();
             return redirect($this->redirectTo);
         }
         else{
             session()->flash('message', 'Usuario no existe');
             return redirect('login');
         }

    }



}
