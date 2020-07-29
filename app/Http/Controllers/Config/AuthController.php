<?php

namespace App\Http\Controllers\Config;

use App\User;
use App\Model\Config\Module;
use App\Http\Controllers\Controller;
use App\Model\Config\Auth;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  $model
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(Auth $model)
    {
        $this->authorize('manageAdmins', User::class);

        $auths = $model->all();

        $authenticators = (new \App\Coopfon)->authenticators();

        $available = (new \App\Coopfon)->available($auths, 'authenticators');

        return view('config.auths.index', ['auths' => $auths, 'authenticators'  => $authenticators, 'available' => $available ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('manageModules', Module::class);

        return view('config.auths.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Auth $model
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Auth $model)
    {
        $this->authorize('manageModules', Module::class);

        $request->validate([
            'name' => 'required|unique:auths,name',
            'path' => 'required|unique:auths,path',
            'description' => 'required|',
            'icon' => 'required|',
        ]);

        $model->create($request->merge(['state_id' => 2, 'parameters' => json_decode($request->parameters)])->all());

        return redirect()->route('auths.index')->withStatus(__('Autenticación creada con éxito.'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Config\Auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function edit(Auth $auth)
    {
        $this->authorize('manageModules', Module::class);

        return view('config.auths.edit', compact('auth'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Config\Auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auth $auth)
    {
        $this->authorize('manageModules', Module::class);

        $request->validate([
            'name' => [
                'required', Rule::unique('auths', 'name')->ignore($auth->id)
            ],
            'description' => 'required|',
            'icon' => 'required|',
        ]);

        $auth->update($request->merge(['parameters' => json_decode($request->parameters)])->all());

        return redirect()->route('auths.index')->withStatus(__('Autenticación actualizada con éxito.'));
    }

    /**
     * Status the specified resource from storage.
     *
     * @param  \App\Model\Config\Auth  $auth
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request, Auth $auth)
    {
        $this->authorize('manageAdmins', User::class);

        $auth->update($request->merge(['state_id' => $request->state_id ? $request->state_id : 2])->all());

        return redirect()->route('auths.index')->withStatus(__('Estado cambiado.'));

    }
}
