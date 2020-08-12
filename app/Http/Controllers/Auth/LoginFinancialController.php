<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Model\Config\Gender;
use App\Model\Config\Auth as AuthCustom;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginFinancialController extends Controller
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
        $AuthFinancial = AuthCustom::Where('path', 'financial')->Where('state_id', 1)->first();

        if($AuthFinancial)
        {
            return view('auth.login_financial', ['AuthCustoms' => $AuthCustoms]);
        }

        abort(404);

    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Http\JsonResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function login(Request $request)
    {
        $AuthFinancial = AuthCustom::Where('path', 'financial')->Where('state_id', 1)->first();

        if(!$AuthFinancial)
        {
            abort(404);
        }

        $this->validateLogin($request);

        $urlWsLogin = $this->urlWsLogin($AuthFinancial->parameters["entidad"], $request->document, $request->password);

        $url = $this->url($AuthFinancial, $urlWsLogin);

        $response = Http::get($url);
        $dataLogin = simplexml_load_string($response);

        if ($dataLogin == 'false')
        {
            session()->flash('message', 'Error de credenciales');
            return back();
        }

        $urlWsEstadoCuenta = $this->urlWsEstadoCuenta($AuthFinancial->parameters["entidad"], $request->document);

        $url = $this->url($AuthFinancial, $urlWsEstadoCuenta);

        $response = Http::get($url);
        $dataUser = simplexml_load_string($response);

        if($dataUser->email == '' OR $dataUser->email == '0' OR $dataUser->email == 'false')
        {
            session()->flash('message', 'Actualiza tu correo en tu sede más cercana');
            return back();
        };

        if ($dataUser->result == 'true')
        {
            $existUser = User::Where('document', $dataUser->identificacion)->first();

            if ($existUser)
            {
                $existUser->email = $dataUser->email;
                $existUser->password = Hash::make($request->password);
                $existUser->save();
            }
            else {
                $this->newUser($dataUser, $request);
            }

        }

        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }

    /**
     * Get the login username to be used by the controller.
     *
     * @return string
     */
    public function username()
    {
        return 'document';
    }


    /**
     * Get the url.
     *
     * @return string
     */
    public function url($AuthFinancial, $urlWs)
    {
        $protocol = $this->protocol(
            $AuthFinancial->parameters["ip"],
            $AuthFinancial->parameters["protocolo"],
            $AuthFinancial->parameters["puerto"]
        );

        return $protocol.$urlWs;

    }

    /**
     * Get the url protocol.
     *
     * @return string
     */
    public function protocol($ip, $protocolo, $puerto)
    {
        return $protocolo.'://'.$ip.':'.$puerto;
    }

    /**
     * Get the url login.
     *
     * @return string
     */
    public function urlWsLogin($entidad, $document, $password)
    {
        return "/WebServices/WSlogin.asmx/Logeo?pEntidad="
                .$entidad."&pIdentificacion="
                .$document."&pClave="
                .$password."&pTipoUsuario=2";
    }

    /**
     * Get the url data.
     *
     * @return string
     */
    public function urlWsEstadoCuenta($entidad, $document)
    {
        return "/WebServices/WSEstadoCuenta.asmx/ConsultarDatoBasicosPersona?pEntidad="
                .$entidad."&pIdentificador="
                .$document."&pTipo=Identificacion";
    }

    /**
     * Get the url data.
     *
     * @param $dataUser
     * @param $request
     * @return boolean
     */
    public function newUser($dataUser, $request)
    {
        $nameFull = $dataUser->primer_nombre
                    .' '.$dataUser->segundo_nombre
                    .' '.$dataUser->primer_apellido
                    .' '.$dataUser->segundo_apellido;

        $gender = Gender::where('abbreviation', $dataUser->genero)->first('id');

        $user = new User;
        $user->role_id = 9;
        $user->name = $nameFull;
        $user->document_type_id = $dataUser->tipo_identificacion;
        $user->document = $dataUser->identificacion;
        $user->gender_id = isset($gender->id) ? $gender->id : '';
        $user->phone = $dataUser->telefono;
        $user->password = Hash::make($request->password);
        $user->code = $dataUser->cod_persona;
        $user->birth_date = $dataUser->fecha_nacimiento ? Carbon::parse($dataUser->fecha_nacimiento)->format('Y-m-d') : null;
        $user->email = $dataUser->email;
        $user->area = $dataUser->cod_oficina;
        $user->city_id = $dataUser->codciudadresidencia;
        $user->address = $dataUser->direccion;

        return $user->save();
    }


}
