<?php

namespace App\Http\Controllers\Config;

use App\Role;
use App\User;
use Carbon\Carbon;
use App\Model\Config\City;
use App\Model\Config\Gender;
use Exception;
use Illuminate\Support\Facades\Hash;
use App\Model\Config\DocumentType;
use App\Http\Requests\Config\AdminRequest;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class);
    }

    /**
     * Display a listing of the admins.
     *
     * @param User $model
     * @return \Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(User $model)
    {
        $this->authorize('manage-users', User::class);

        return view('config.admin.index', ['users' => $model->admins()]);
    }

    /**
     * Show the form for creating a new admin.
     *
     * @param Role $role
     * @param DocumentType $documentTypes
     * @param City $cities
     * @param Gender $genders
     * @return \Illuminate\View\View
     */
    public function create(Role $role, DocumentType $documentTypes, City $cities, Gender $genders)
    {
        return view('config.admin.create', [
            'roles' => $role->list(['id', 'name']),
            'documentTypes' => $documentTypes->get(['id', 'type']),
            'cities' => $cities->orderBy('name')->get(),
            'genders' => $genders->get(['id', 'type'])
        ]);
    }

    /**
     * Store a newly created resource in admin.
     *
     * @param  \App\Http\Requests\AdminRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(AdminRequest $request, User $model)
    {
        $model->create($request->merge([
            'picture' => $request->photo ? $request->photo->store('profile', 'public') : null,
            'password' => Hash::make($request->get('password')),
            'birth_date' => $request->birth_date ? Carbon::parse($request->birth_date)->format('Y-m-d') : null
        ])->all());

        return redirect()->route('admin.index')->withStatus(__('administrador creado con éxito.'));
    }

    /**
     * Show the form for editing the specified admin.
     *
     * @param \App\User $user
     * @param \App\Role $role
     * @param DocumentType $documentTypes
     * @param City $cities
     * @param Gender $genders
     * @return \Illuminate\View\View
     */
    public function edit(User $user, Role $role, DocumentType $documentTypes, City $cities, Gender $genders)
    {
        return view('config.admin.edit', [
            'role' => $role->get(['id', 'name']),
            'user' => $user->load('role'),
            'documentTypes' => $documentTypes->get(['id', 'type']),
            'cities' => $cities->orderBy('name')->get(),
            'genders' => $genders->get(['id', 'type'])
        ]);
    }

    /**
     * Update the specified admin in storage.
     *
     * @param  \App\Http\Requests\AdminRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AdminRequest $request, User $user)
    {
        $hasPassword = $request->get('password');
        $user->update(
            $request->merge([
                'picture' => $request->photo ? $request->photo->store('profile', 'public') : $user->picture,
                'password' => Hash::make($request->get('password'))
            ])->except([
                $hasPassword ? '' : 'password',
            ])
        );

        return redirect()->route('admin.index')->withStatus(__('administrador actualizado con éxito.'));
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\AdminRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function data(AdminRequest $request, User $user)
    {
        $user->update(
            $request->merge(
                ['birth_date' => $request->birth_date ? Carbon::parse($request->birth_date)->format('Y-m-d') : null]
            )->all()
        );
        return back()->withStatus(__('Datos actualizados con éxito.'));

    }

    /**
     * Remove the specified admin from storage.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\RedirectResponse
     * @throws Exception
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('admin.index')->withStatus(__('Administrador eliminado exitosamente.'));
    }


    /**
     * Display a listing of the users
     *
     * @param \App\User $model
     * @return \Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function indexDelete(User $model)
    {
        $this->authorize('manage-users', User::class);

        return view('config.admin.index-delete', ['users' => $model->withTrashed()->where('deleted_at', '!=', NULL)->get()]);
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
