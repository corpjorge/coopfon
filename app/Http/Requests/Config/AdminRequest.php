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
                'required'
            ],
            'document' => [
                'required', Rule::unique((new User)->getTable())->ignore($this->route()->admin->id ?? null)
            ],

        ];
    }

}
