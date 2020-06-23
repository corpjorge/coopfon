<?php

namespace App\Http\Controllers\Config;

use App\Http\Controllers\Controller;
use App\Model\Config\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;

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
        return view('config.modules.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Module $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Module $model)
    {
        $request->validate([
            'name' => 'required|unique:modules,name',
            'path' => 'required|unique:modules,path',
            'version' => 'required|',
        ]);

        if(!Route::has($request->path.'.install'))
        {
           return back()->with('statusError', 'La ruta no existe');
        }

        $path = resource_path('views/layouts/navbars/'.$request->path.'.blade.php');

        if(!File::exists($path)){
            return back()->with('statusError', 'Navbars no existe');
        }

        $model->create($request->merge(['state_id' => 2])->all());

        return redirect()->route('module.index')->withStatus(__('Modulo creado con éxito.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Config\Module  $module
     * @return \Illuminate\Http\Response
     */
    public function edit(Module $module)
    {
        return view('config.module.edit', compact('module'));
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
        $module->update($request->all());

        return redirect()->route('module.index')->withStatus(__('Modulo actualizado con éxito.'));
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

        return redirect()->route('module.index')->withStatus(__('Modulo desactivado exitosamente.'));
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
