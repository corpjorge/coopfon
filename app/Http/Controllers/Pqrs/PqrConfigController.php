<?php

namespace App\Http\Controllers\Pqrs;

use App\Http\Controllers\Controller;
use App\Model\Pqrs\PqConfig;
use Illuminate\Http\Request;
use App\Model\Pqrs\PqPqr;

class PqrConfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PqConfig $pqConfig)
    {
        $this->authorize('config', PqPqr::class );

        return view('pqrs.conf.conf', [ 'config' => $pqConfig->find(1)]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PqConfig $config)
    {
        $this->authorize('config', PqPqr::class );

        $request->validate([
            'limit_date' => 'required',
            'terms' => 'required',
        ]);

        $config->update($request->all());

        return redirect()->route('pqrs_config.index')->withStatus(__('Configuración realizada con éxito.'));
    }

}
