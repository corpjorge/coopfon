<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use App\Model\Config\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Module::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @param Module $model
     * @return \Illuminate\Http\Response
     */
    public function index(Module $model)
    {
        return view('config.modules.index', ['modules' => $model->withTrashed()->get()]);
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
     * @param  \App\Model\Config\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function show(Module $module)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Config\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Config\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Module $module)
    {
        //
    }


    /**
     * Remove the specified Module from storage.
     *
     * @param Module $module
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Module $module)
    {

        $module->delete();

        return redirect()->route('module.index')->withStatus(__('Modulo eliminado exitosamente.'));
    }

    /**
     * restore the specified Module to storage.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        Module::onlyTrashed()->find($id)->restore();

        return back()->withStatus(__('Modulo restaurado.'));
    }
}
