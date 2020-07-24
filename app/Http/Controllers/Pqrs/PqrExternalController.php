<?php

namespace App\Http\Controllers\Pqrs;

use App\Http\Controllers\Controller;
use App\Model\Pqrs\PqConfig;
use App\Model\Pqrs\PqPqrsExternal;
use Illuminate\Http\Request;

class PqrExternalController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(PqPqrsExternal::class, 'pqr');
    }

    /**
     * Display a listing of the resource.
     *
     * @param PqPqrsExternal $pqr
     * @param PqConfig $pqConf
     * @return \Illuminate\Http\Response
     */
    public function index(PqPqrsExternal $pqr,  PqConfig $pqConf)
    {
        return view('pqrs.pqrs_external.index',[
            'pqrs' => $pqr->where('state','En curso')->get(),
            'limit_date' => $pqConf->conf()->limit_date
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(PqConfig $pqConf)
    {
        return view('pqrs.pqrs_external.create', [ 'terms' => $pqConf->conf()->terms]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, PqPqrsExternal $pqr)
    {
        $request->validate([
            'name' => 'required',
            'document' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'description' => 'required',
            'doc' => 'nullable|mimes:jpeg,jpg,gif,png,xls,xlsx,doc,docx,pdf,zip,rar'
        ]);

        $pqr->description = $request->description;
        $pqr->file = $request->doc ? $request->doc->store('pqrs') : NULL;
        $pqr->name = $request->name;
        $pqr->document = $request->document;
        $pqr->email = $request->email;
        $pqr->phone = $request->phone;
        $pqr->state = 'En curso';
        $pqr->save();

        return redirect()->route('pqrs_external.create')->withStatus(__('PQRS radicado con éxito.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Pqrs\PqPqrsExternal  $pqr
     * @return \Illuminate\Http\Response
     */
    public function edit(PqPqrsExternal $pqr)
    {
        $users = \App\Model\Config\Module::where('path','pqrs')->first()->users;

        $pqr->admin_id = auth()->user()->id;
        $pqr->save();

        return view('pqrs.pqrs_external.edit', compact('pqr'), [ 'users' => $users]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Pqrs\PqPqrsExternal  $pqr
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PqPqrsExternal $pqr)
    {
        $request->validate(['reply' => 'required']);

        $pqr->reply = $request->reply;
        $pqr->state = 'Cerrado';
        $pqr->save();

        return redirect()->route('pqrs_external.index')->withStatus(__('PQRS cerrado con éxito.'));
    }

    /**
     * Show file.
     *
     * @param  \App\Model\Pqrs\PqPqrsExternal  $pqr
     * @return \Illuminate\Http\Response
     */
    public function file(PqPqrsExternal $pqr)
    {
        return \Storage::download($pqr->file);
    }

    /**
     * move resource.
     *
     * @param Request $request
     * @param \App\Model\Pqrs\PqPqrsExternal $pqr
     * @return void
     */
    public function move(Request $request, PqPqrsExternal $pqr)
    {
        $this->authorize('create', $pqr );

        $request->validate(['admin_id' => 'required|exists:users,id']);

        $pqr->admin_id = $request->admin_id;
        $pqr->save();

        return redirect()->route('pqrs_external.index')->withStatus(__('Usuario traslado con éxito.'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\Model\Pqrs\PqPqrsExternal $pqr
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function close(PqPqrsExternal $pqr)
    {
        return view('pqrs.pqrs_external.close', ['pqrs' => $pqr->where('state','Cerrado')->get()]);
    }
}
