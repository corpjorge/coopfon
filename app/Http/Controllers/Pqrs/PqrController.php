<?php

namespace App\Http\Controllers\Pqrs;

use App\Model\Pqrs\PqPqr;
use App\Model\Pqrs\PqConfig;
use App\Model\Pqrs\PqrUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PqrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param PqrUser $pqr
     * @return \Illuminate\Http\Response
     */
    public function index(PqrUser $pqr)
    {
        return view('pqrs.pqrs.index', ['pqrs' => $pqr->find(Auth::id())->pqrs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PqConfig $pqConf)
    {
        return view('pqrs.pqrs.create', [ 'terms' => $pqConf->conf()->terms]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param PqrUser $model
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PqPqr $model)
    {
        $request->validate([
            'description' => 'required',
            'doc' => 'nullable|mimes:jpeg,jpg,gif,png,xls,xlsx,doc,docx,pdf,zip,rar'
        ]);

        $model->create(
            $request->merge([
                    'file' => $request->doc ? $request->doc->store('pqrs') : NULL,
                    'user_id' => Auth::id(),
                    'state' => 'En curso'
            ])->all()
        );

        return redirect()->route('pqrs.index')->withStatus(__('PQRS radicado con éxito.'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Pqrs\PqPqr  $pqr
     * @return \Illuminate\Http\Response
     */
    public function reply(PqPqr $pqr)
    {
//        $pqr->where('admin_id','!=', Auth::id())->get()
        return view('pqrs.pqrs.reply', ['pqrs' => $pqr->all()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Pqrs\PqPqr  $pqr
     * @return \Illuminate\Http\Response
     */
    public function edit(PqPqr $pqr)
    {
        return view('pqrs.pqrs.edit', compact('pqr'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Pqrs\PqPqr  $pqr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PqPqr $pqr)
    {
        //
    }

}
