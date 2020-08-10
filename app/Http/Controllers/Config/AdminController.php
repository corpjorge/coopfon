<?php

namespace App\Http\Controllers\Config;

use App\Model\Config\Module;
use App\Role;
use App\User;
use Exception;
use Carbon\Carbon;
use App\Model\Config\City;
use App\Model\Config\Gender;
use App\Model\Config\Member;
use App\Model\Config\DocumentType;
use App\Http\Requests\Config\AdminRequest;
use App\Http\Requests\Config\AdminDataRequest;
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
     * @param Module $module
     * @param City $cities
     * @param Member $members
     * @param Gender $genders
     * @return \Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function create(Role $role, DocumentType $documentTypes, Module $module, City $cities, Member $members, Gender $genders)
    {
        $this->authorize('manageAdmins', User::class);

        return view('config.admin.create', [
            'roles' => $role->list(['id', 'name']),
            'documentTypes' => $documentTypes->get(['id', 'type']),
            'modules' => $module->active(),
            'cities' => $cities->orderBy('name')->get(),
            'members' => $members->get(['id', 'name']),
            'genders' => $genders->get(['id', 'type'])
        ]);
    }

    /**
     * Store a newly created resource in admin.
     *
     * @param \App\Http\Requests\Config\AdminRequest $request
     * @param \App\User $model
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function store(AdminRequest $request, User $model)
    {
        $this->authorize('manageAdmins', User::class);

        $user = $model->fill($request->merge([
            'picture' => $request->photo ? '/storage/'.$request->photo->store('profile', 'public') : null,
            'password' => $request->password ? Hash::make($request->get('password')): Hash::make(rand()),
            'birth_date' => $request->birth_date ? Carbon::parse($request->birth_date)->format('Y-m-d') : null
        ])->all());

        $user->role_id = $request->role_id;
        $user->code = $request->code;
        $user->document = $request->document;
        $user->member_id = $request->member_id;
        $user->save();

        $user->modules()->sync($request->get('module_id'));

        return redirect()->route('admin.index')->withStatus(__('administrador creado con éxito.'));
    }

    /**
     * Show the form for editing the specified admin.
     *
     * @param User $admin
     * @param Role $role
     * @param DocumentType $documentTypes
     * @param Module $module
     * @param City $cities
     * @param Member $members
     * @param Gender $genders
     * @return \Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(User $admin, Role $role, DocumentType $documentTypes,  Module $module, City $cities, Member $members, Gender $genders)
    {
        $this->authorize('manageAdmins', User::class);

        return view('config.admin.edit', [
            'user' => $admin->load('role')->load('modules'),
            'roles' => $role->list(['id', 'name']),
            'documentTypes' => $documentTypes->get(['id', 'type']),
            'modules' => $module->active(),
            'cities' => $cities->orderBy('name')->get(),
            'members' => $members->get(['id', 'name']),
            'genders' => $genders->get(['id', 'type'])
        ]);
    }

    /**
     * Update the specified admin in storage.
     *
     * @param  \App\Http\Requests\Config\AdminRequest  $request
     * @param  \App\User  $admin
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(AdminRequest $request, User $admin)
    {
        $this->authorize('manageAdmins', User::class);

        $hasPassword = $request->get('password');
        $admin->update(
            $request->merge([
                'picture' => $request->photo ? '/storage/'.$request->photo->store('profile', 'public') : $admin->picture,
                'password' => Hash::make($request->get('password'))
            ])->except([
                $hasPassword ? '' : 'password',
            ])
        );

        $admin->role_id = $request->role_id;
        $admin->document = $request->document;
        $admin->save();

        $admin->modules()->sync($request->get('module_id'));

        return redirect()->route('admin.index')->withStatus(__('administrador actualizado con éxito.'));
    }

    /**
     * Update the profile
     *
     * @param \App\Http\Requests\Config\AdminDataRequest $request
     * @param \App\User $admin
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function data(AdminDataRequest $request, User $user)
    {
        $this->authorize('manageAdmins', User::class);

        $user->update(
            $request->merge(
                ['birth_date' => $request->birth_date ? Carbon::parse($request->birth_date)->format('Y-m-d') : null]
            )->all()
        );

        $user->code = $request->code;
        $user->member_id = $request->member_id;
        $user->save();

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
    public function find($idInput, $value = 'x')
    {
        $this->authorize('manageAdmins', User::class);
        $user = User::where($idInput, $value)->where('role_id',9)->first();

        if($user) {
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
     * @param Request $request
     * @param \App\User $admin
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function enRoll(Request $request, User $admin)
    {
        $this->authorize('manageAdmins', User::class);

        $this->Validate($request, [ 'role_id' => 'required' ]);

        $role = isset($admin->role_id) ? $admin->role_id : 1;

        if($role == 1) {
            return back()->withStatus(__('Datos actualizados con exito.'));
        }

        $admin->role_id = $request->role_id;
        $admin->save();

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

        return view('config.admin.index_delete', ['users' => $model->onlyTrashed()->where('role_id', '!=', 9)->get()]);
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
