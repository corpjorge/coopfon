<?php

namespace App\Http\Controllers;


use App\Http\Requests\Config\UsersRequest;
use App\Role;
use App\User;
use Carbon\Carbon;
use App\Model\Config\City;
use App\Model\Config\Gender;
use Illuminate\Support\Facades\Hash;
use App\Model\Config\DocumentType;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class);
    }

    /**
     * Display a listing of the users
     *
     * @param  \App\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        $this->authorize('manage-users', User::class);

        return view('config.users.index', ['users' => $model->where('role_id',9)->get()]);
    }

    /**
     * Show the form for creating a new user
     *
     * @param DocumentType $documentTypes
     * @param City $cities
     * @param Gender $genders
     * @return \Illuminate\View\View
     */
    public function create(DocumentType $documentTypes, City $cities, Gender $genders)
    {
        return view('config.users.create', [
            'documentTypes' => $documentTypes->get(['id', 'type']),
            'cities' => $cities->orderBy('name')->get(),
            'genders' => $genders->get(['id', 'type'])
        ]);
    }

    /**
     * Store a newly created user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $model
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(UserRequest $request, User $model)
    {
        $model->create($request->merge([
            'picture' => $request->photo ? $request->photo->store('profile', 'public') : null,
            'password' => Hash::make($request->get('password')),
            'birth_date' => $request->birth_date ? Carbon::parse($request->birth_date)->format('Y-m-d') : null,
            'role_id' => 9
        ])->all());

        return redirect()->route('user.index')->withStatus(__('Usuario creado con éxito.'));
    }

    /**
     * Show the form for editing the specified user
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
        return view('config.users.edit', [
            'user' => $user->load('role'),
            'documentTypes' => $documentTypes->get(['id', 'type']),
            'cities' => $cities->orderBy('name')->get(),
            'genders' => $genders->get(['id', 'type'])
        ]);
    }

    /**
     * Update the specified user in storage
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UserRequest $request, User $user)
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

        return redirect()->route('user.index')->withStatus(__('Usuario actualizado con éxito.'));
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\UsersRequest  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function data(UsersRequest $request, User $user)
    {
        $user->update(
            $request->merge(
                ['birth_date' => $request->birth_date ? Carbon::parse($request->birth_date)->format('Y-m-d') : null]
            )->all()
        );
        return back()->withStatus(__('Datos actualizados con éxito.'));

    }

    /**
     * Remove the specified user from storage
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->withStatus(__('User successfully deleted.'));
    }
}
