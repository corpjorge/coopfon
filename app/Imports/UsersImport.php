<?php

namespace App\Imports;

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithChunkReading;

class UsersImport implements ToModel, WithHeadingRow, WithChunkReading, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        //$chunkOffset = $this->getChunkOffset();

        return new User([
            'role_id'  => 9,
            'name'  => $row['name'],
            'email'  => $row['email'],
            'password' => Hash::make($row['password']),
            'document_type_id'  => $row['document_type_id'],
            'document'  => $row['document'],
            'phone'  => $row['phone'],
            'code'  => $row['code'],
            'gender_id'  => $row['gender_id'],
            'address'  => $row['address'],
            'area'  => $row['area'],
            'city_id'  => $row['city_id'],
            'birth_date'  => $row['birth_date'],
        ]);
    }

    public function rules(): array
    {
        return [

            '*.email' => [ 'required', 'email', Rule::unique((new User)->getTable()), function($attribute, $value, $onFailure) {
                $usuario = User::where('email',$value)->first();
                if ($usuario) {
                   $onFailure('¡¡ERROR!! El correo '.$value.' ya se encuentra ingresado');
                }
            }],

            '*.document' => [ 'nullable', Rule::unique((new User)->getTable()), function($attribute, $value, $onFailure) {
                $usuario = User::where('document',$value)->first();
                if ($usuario) {
                    $onFailure('¡¡ERROR!! La cedula '.$value.' ya se encuentra ingresada');
                }
            }],

        ];
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
