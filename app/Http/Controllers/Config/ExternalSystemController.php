<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use App\Model\Config\ExternalSystem;
use App\Model\Config\Module;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ExternalSystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ExternalSystem $model)
    {
        $this->authorize('manageModules', Module::class);

        $systems = $model->all();

        $externalsystems = (new \App\Coopfon)->externalSystems();

        $available = (new \App\Coopfon)->available($systems, 'externalSystems');

        return view('config.external_system.index', ['systems' => $systems, 'externalsystems' => $externalsystems, 'available' => $available]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('manageModules', Module::class);

        return view('config.external_system.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param ExternalSystem $externalSystem
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(Request $request, ExternalSystem $externalSystem)
    {
        $this->authorize('manageModules', Module::class);

        $request->validate([
            'name' => 'required|unique:external_systems,name',
            'path' => 'required|unique:external_systems,path',
            'description' => 'required|',
        ]);

        if(!\Route::has('system-external.'.$request->path))
        {
            return back()->with('error', 'La ruta no existe');
        }

        $externalSystem->create($request->merge(['state_id' => 2, 'parameters' => json_decode($request->parameters)])->all());

        return redirect()->route('external-system.index')->withStatus(__('Sistema externo con éxito.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param ExternalSystem $system
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(ExternalSystem $externalSystem)
    {
        $this->authorize('manageModules', Module::class);

        return view('config.external_system.edit', compact('externalSystem'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Config\ExternalSystem  $externalSystem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExternalSystem $externalSystem)
    {
        $this->authorize('manageModules', Module::class);

        $request->validate([
            'name' => [
                'required', Rule::unique('external_systems', 'name')->ignore($externalSystem->id)
            ],
            'path' => [
                'required', Rule::unique('external_systems', 'path')->ignore($externalSystem->id)
            ],
            'description' => 'required|'
        ]);

        if(!\Route::has('system-external.'.$request->path))
        {
            return back()->with('error', 'La ruta no existe');
        }

        $externalSystem->update($request->merge(['parameters' => json_decode($request->parameters)])->all());

        return redirect()->route('external-system.index')->withStatus(__('Sistema externo actualizada con éxito.'));
    }

    /**
     * Status the specified resource from storage.
     *
     * @param Request $request
     * @param Auth $auth
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function status(Request $request, ExternalSystem $externalSystem)
    {
        $this->authorize('manageModules', Module::class);

        $externalSystem->update($request->merge(['state_id' => $request->state_id ? $request->state_id : 2])->all());

        return redirect()->route('external-system.index')->withStatus(__('Estado cambiado.'));

    }
}
