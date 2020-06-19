<?php

namespace App\Http\Controllers\Config;

use App\Role;
use App\User;
use Exception;
use Carbon\Carbon;
use App\Model\Config\City;
use App\Model\Config\Gender;
use App\Model\Config\Member;
use App\Model\Config\DocumentType;
use App\Http\Requests\Config\AdminRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the admins.
     *
     * @param User $model
     * @return \Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function index(User $model)
    {
        $this->authorize('manageAdmins', User::class);

        return view('config.admin.index', ['users' => $model->adminsAll()]);
    }

    /**
     * Show the form for creating a new admin.
     *
     * @param Role $role
     * @param DocumentType $documentTypes
     * @param City $cities
     * @param Member $members
     * @param Gender $genders
     * @return \Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create(Role $role, DocumentType $documentTypes, City $cities, Member $members, Gender $genders)
    {
        $this->authorize('manageAdmins', User::class);

        return view('config.admin.create', [
            'roles' => $role->list(['id', 'name']),
            'documentTypes' => $documentTypes->get(['id', 'type']),
            'cities' => $cities->orderBy('name')->get(),
            'members' => $members->get(['id', 'name']),
            'genders' => $genders->get(['id', 'type'])
        ]);
    }

    /**
     * Store a newly created resource in admin.
     *
     * @param \App\Http\Requests\AdminRequest $request
     * @param \App\User $model
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(AdminRequest $request, User $model)
    {
        $this->authorize('manageAdmins', User::class);

        $model->create($request->merge([
            'picture' => $request->photo ? $request->photo->store('profile', 'public') : null,
            'password' => $request->password ? Hash::make($request->get('password')): Hash::make(rand()),
            'birth_date' => $request->birth_date ? Carbon::parse($request->birth_date)->format('Y-m-d') : null
        ])->all());

        return redirect()->route('admin.index')->withStatus(__('administrador creado con éxito.'));
    }

    /**
     * Show the form for editing the specified admin.
     *
     * @param User $admin
     * @param \App\Role $role
     * @param DocumentType $documentTypes
     * @param City $cities
     * @param Member $members
     * @param Gender $genders
     * @return \Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(User $admin, Role $role, DocumentType $documentTypes, City $cities, Member $members, Gender $genders)
    {
        $this->authorize('manageAdmins', User::class);

        return view('config.admin.edit', [
            'roles' => $role->list(['id', 'name']),
            'user' => $admin->load('role'),
            'documentTypes' => $documentTypes->get(['id', 'type']),
            'cities' => $cities->orderBy('name')->get(),
            'members' => $members->get(['id', 'name']),
            'genders' => $genders->get(['id', 'type'])
        ]);
    }

    /**
     * Update the specified admin in storage.
     *
     * @param  \App\Http\Requests\AdminRequest  $request
     * @param  \App\User  $admin
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AdminRequest $request, User $admin)
    {
        $this->authorize('manageAdmins', User::class);

        $hasPassword = $request->get('password');
        $admin->update(
            $request->merge([
                'picture' => $request->photo ? $request->photo->store('profile', 'public') : $admin->picture,
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
     * @param \App\Http\Requests\AdminRequest $request
     * @param \App\User $admin
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function data(AdminRequest $request, User $admin)
    {
        $this->authorize('manageAdmins', User::class);

        $admin->update(
            $request->merge(
                ['birth_date' => $request->birth_date ? Carbon::parse($request->birth_date)->format('Y-m-d') : null]
            )->all()
        );
        return back()->withStatus(__('Datos actualizados con éxito.'));

    }

    /**
     * Update the profile
     *
     * @param \App\Http\Requests\AdminRequest $request
     * @param \App\User $admin
     * @return \Illuminate\Http\JsonResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function find($idInput, $value)
    {
        $this->authorize('manageAdmins', User::class);
        $user = User::where($idInput,$value)->where('role_id',9)->first();

        if($user){
            return response()->json([
                'status' => 'success',
                'idUser' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
                'document' => $user->document,
            ]);
        };

    }

    /**
     * Update the profile
     *
     * @param \App\Http\Requests\AdminRequest $request
     * @param \App\User $admin
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function enRoll(Request $request, User $admin)
    {
        $this->authorize('manageAdmins', User::class);

        $role = isset($admin->role_id) ? $admin->role_id : 1;

        if($role == 1){
            return back()->withStatus(__('Datos actualizados con exito.'));
        }

        $admin->update($request->all());

        return redirect()->route('admin.index')->withStatus(__('Datos actualizados con éxito.'));

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
        $this->authorize('manageAdmins', User::class);

        return view('config.admin.index-delete', ['users' => $model->onlyTrashed()->where('role_id', '!=', 9)->get()]);
    }

    /**
     * Remove the specified admin from storage.
     *
     * @param \App\User $admin
     * @return \Illuminate\Http\RedirectResponse
     * @throws Exception
     */
    public function destroy(User $admin)
    {
        $this->authorize('manageAdmins', User::class);

        $admin->delete();

        return redirect()->route('admin.index')->withStatus(__('Administrador eliminado exitosamente.'));
    }

    /**
     * restore the specified resource to storage.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        $this->authorize('manageAdmins', User::class);

        User::withTrashed()->find($id)->restore();

        return back()->withStatus(__('Administrador restaurado.'));

    }
}
