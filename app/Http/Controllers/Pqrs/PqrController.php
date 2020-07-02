<?php

namespace App\Http\Controllers\Pqrs;

use App\Model\Pqrs\PqPqr;
use App\Model\Pqrs\PqConfig;
use App\Model\Pqrs\PqrUser;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PqrController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(PqPqr::class, 'pqr');
    }

    /**
     * Display a listing of the resource.
     *
     * @param PqrUser $pqr
     * @return \Illuminate\Http\Response
     */
    public function index(PqrUser $pqr)
    {
        return view('pqrs.pqrs.index', ['pqrs' => $pqr->find(auth()->user()->id)->pqrs]);
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

        $model->description = $request->description;
        $model->file = $request->doc ? $request->doc->store('pqrs') : NULL;
        $model->user_id = auth()->user()->id;
        $model->state = 'En curso';
        $model->save();

        return redirect()->route('pqrs.index')->withStatus(__('PQRS radicado con éxito.'));
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Model\Pqrs\PqPqr $pqr
     * @param PqConfig $pqConf
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function reply(PqPqr $pqr, PqConfig $pqConf)
    {
        $this->authorize('reply', $pqr );

        return view('pqrs.pqrs.reply', [
            'pqrs' => $pqr->pqrActive()->where('user_id','!=', auth()->user()->id)->get(),
            'limit_date' => $pqConf->conf()->limit_date
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Pqrs\PqPqr  $pqr
     * @return \Illuminate\Http\Response
     */
    public function edit(PqPqr $pqr)
    {
        $users = \App\Model\Config\Module::where('path','pqrs')->first()->users;

        $pqr->admin_id = auth()->user()->id;
        $pqr->save();

        return view('pqrs.pqrs.edit', compact('pqr'), [ 'users' => $users]);
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
        $request->validate(['reply' => 'required']);

        $pqr->reply = $request->reply;
        $pqr->state = 'Cerrado';
        $pqr->save();

        return redirect()->route('pqrs.reply')->withStatus(__('PQRS cerrado con éxito.'));
    }

    /**
     * Show file.
     *
     * @param  \App\Model\Pqrs\PqPqr  $pqr
     * @return \Illuminate\Http\Response
     */
    public function file(PqPqr $pqr)
    {
        return Storage::download($pqr->file);
    }

    /**
     * move.
     *
     * @param Request $request
     * @param \App\Model\Pqrs\PqPqr $pqr
     * @return void
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function move(Request $request, PqPqr $pqr)
    {
        $this->authorize('reply', $pqr );

        $request->validate(['admin_id' => 'required|exists:users,id']);

        $pqr->admin_id = $request->admin_id;
        $pqr->save();

        return redirect()->route('pqrs.reply')->withStatus(__('Usuario traslado con éxito.'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\Model\Pqrs\PqPqr $pqr
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function close(PqPqr $pqr)
    {
        $this->authorize('reply', $pqr );
        return view('pqrs.pqrs.close', ['pqrs' => $pqr->where('state','Cerrado')->get()]);
    }

}
