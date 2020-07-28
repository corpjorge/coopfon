<?php

namespace App\Http\Controllers\Config;

use App\User;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class);
    }

    /**
     * Display a listing of the users
     *
     * @param \App\User $model
     * @return \Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(User $model)
    {
        $this->authorize('manage-users', User::class);

        return view('config.users.index_delete', ['users' => $model->onlyTrashed()->where('role_id', 9)->get()]);
    }

    /**
     * Show the form for creating a user.
     *
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('manage-users', User::class);

        return view('config.users.create_excel');
    }

    /**
     * export file with users.
     *
     */
    public function store(Request $request)
    {
        $this->authorize('manage-users', User::class);

        $this->Validate($request, [ 'file' => 'required|mimes:xlsx' ]);

        (new UsersImport)->import(request()->file('file'), NULL, \Maatwebsite\Excel\Excel::XLSX);

        return redirect()->route('user.index')->withStatus(__('Carga realizada con éxito.'));
    }

    /**
     * restore the specified resource to storage.
     *
     * @param $id
     * @param \App\User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        User::onlyTrashed()->find($id)->restore();

        return back()->withStatus(__('Usuario restaurado.'));

    }


}
