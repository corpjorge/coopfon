<?php

namespace App\Http\Controllers\Config;

use App\User;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
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

        return view('config.users.index-delete', ['users' => $model->withTrashed()->where('deleted_at', '!=', NULL)->get()]);
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

        return view('config.users.create-excel');
    }

    /**
     * export file with users.
     *
     */
    public function store(Request $request)
    {
        $this->authorize('manage-users', User::class);

        $this->Validate($request, [ 'file' => 'required|mimes:xlsx' ]);

        Excel::import(new UsersImport, request()->file('file'), null, \Maatwebsite\Excel\Excel::XLSX);

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
        $user = User::withTrashed()->find($id);
        $user->restore();
        return back()->withStatus(__('Usuario restaurado.'));

    }


}
