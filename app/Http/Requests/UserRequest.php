<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required', 'min:3'
            ],
            'email' => [
                'required', 'email', Rule::unique((new User)->getTable())->ignore($this->route()->user->id ?? null)
            ],
            'password' => [
                'nullable', 'confirmed', 'min:6'
            ],
            'document_type_id' => [
                'required', 'integer', 'exists:document_types,id'
            ],
            'document' => [
                'required', Rule::unique((new User)->getTable())->ignore($this->route()->user->id ?? null)
            ],

            'code' => [
                'nullable', Rule::unique((new User)->getTable())->ignore($this->route()->user->id ?? null)
            ],

            'member_id' => [
                'nullable', 'integer', 'exists:members,id'
            ],

            'gender_id' => [
                'nullable', 'integer', 'exists:genders,id'
            ],

            'city_id' => [
                'nullable', 'integer', 'exists:city,code'
            ],

            'birth_date' => [
                'nullable', 'date_format:d-m-Y'
            ],

        ];
    }

    /**
     * Get the validation attributes that apply to the request.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'role_id' => 'role',
        ];
    }
}
