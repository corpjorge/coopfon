<?php

namespace App\Imports;

use App\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class UsersImport implements ToModel, WithHeadingRow, WithValidation
{

    use Importable;

    /**
     * @param array $row
     *
     * @return User
     */
    public function model(array $row)
    {
        $user =new User([
            'name'  => $row['nombre_completo'],
            'email'  => $row['correo'],
            'password' => Hash::make($row['password']),
            'document_type_id'  => $row['tipo_documento'],
            'phone'  => $row['celular'],
            'gender_id'  => $row['genero'],
            'address'  => $row['direccion'],
            'area'  => $row['area'],
            'city_id'  => $row['codigo_ciudad'],
            'birth_date'  => $row['fecha_nacimiento'] ? Carbon::parse($row['fecha_nacimiento'])->format('Y-m-d') : null
        ]);

        $user->role_id = 9;
        $user->document = $row['documento'];
        $user->code = $row['codigo'];
        $user->member_id =  $row['miembro'];

        return $user;

    }

    public function rules(): array
    {
        return [

            '*.nombre_completo'  => ['required'],

            '*.correo' => ['required', 'email', 'unique:users,email'],

            '*.documento' => ['required', 'integer', 'unique:users,document'],

            'tipo_documento' => ['nullable', 'integer', 'exists:document_types,id'],

            '*.codigo' => ['nullable', 'unique:users,code'],

            'miembro' => ['nullable', 'integer', 'exists:members,id'],

            'genero' => ['nullable', 'integer', 'exists:genders,id'],

            'codigo_ciudad' => ['nullable', 'integer', 'exists:city,code'],

            //'fecha_nacimiento' => ['nullable', 'date_format:Y-m-d'],

        ];
    }

//    public function chunkSize(): int
//    {
//        return 1000;
//    }
}
