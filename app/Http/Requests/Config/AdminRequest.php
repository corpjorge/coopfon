<?php

namespace App\Http\Requests\Config;

use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AdminRequest extends FormRequest
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
                'required', 'email', Rule::unique((new User)->getTable())->ignore($this->route()->admin->id ?? null)
            ],
            'password' => [
                'nullable', 'confirmed', 'min:6'
            ],
            'document_type_id' => [
                'required', 'integer', 'exists:document_types,id'
            ],
            'document' => [
                'required', Rule::unique((new User)->getTable())->ignore($this->route()->admin->id ?? null)
            ],
            'role_id' => [
                'required', 'integer', 'exists:roles,id'
            ],
            'module_id' => [
                'nullable', 'exists:modules,id'
            ],
            'code' => [
                'nullable', 'unique:users,code'
            ],
            'gender_id' => [
                'nullable', 'exists:genders,id'
            ],
            'city_id' => [
                'nullable', 'integer', 'exists:city,code'
            ],
            'member_id' => [
                'nullable', 'integer', 'exists:members,id'
            ],
            'birth_date' => [
                'nullable', 'date_format:d-m-Y'
            ],

        ];
    }

}
