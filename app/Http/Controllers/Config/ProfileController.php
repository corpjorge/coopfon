<?php

namespace App\Http\Controllers\Config;

use Carbon\Carbon;
use App\Model\Config\City;
use App\Model\Config\Gender;
use App\Model\Config\DocumentType;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Config\ProfileRequest;
use App\Http\Requests\Config\PasswordRequest;
use App\Http\Requests\Config\DataRequest;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    /**
     * Show the form for editing the profile.
     *
     * @param DocumentType $documentType
     * @param City $city
     * @param Gender $gender
     * @return \Illuminate\View\View
     */
    public function edit(DocumentType $documentTypes, City $cities, Gender $genders)
    {
        return view('config.profile.edit', [
            'documentTypes' => $documentTypes->get(['id', 'type']),
            'cities' => $cities->orderBy('name')->get(),
            'genders' => $genders->get(['id', 'type'])
        ]);
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\ProfileRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(ProfileRequest $request)
    {
        auth()->user()->update(
            $request->merge([
                'picture' => $request->photo ? '/storage/'.$request->photo->store('profile', 'public') : null,
            ])->except([$request->hasFile('photo') ? '' : 'picture']));

        return back()->withStatus(__('Perfil actualizado con éxito.'));
    }

    /**
     * Change the password
     *
     * @param  \App\Http\Requests\PasswordRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function password(PasswordRequest $request)
    {
        auth()->user()->update(['password' => Hash::make($request->get('password'))]);

        return back()->withStatus(__('Contraseña actualizada correctamente.'));
    }

    /**
     * Update the profile
     *
     * @param  \App\Http\Requests\DataRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function data(DataRequest $request)
    {
        auth()->user()->update(
            $request->merge(
                ['birth_date' => $request->birth_date ? Carbon::parse($request->birth_date)->format('Y-m-d') : null]
            )->all()
        );
        return back()->withStatus(__('Datos actualizados con éxito.'));

    }
}
