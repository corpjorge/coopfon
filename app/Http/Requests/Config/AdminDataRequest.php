<?php

namespace App\Http\Requests\Config;

use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class AdminDataRequest extends FormRequest
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

            'code' => [
                'nullable', Rule::unique((new User)->getTable())->ignore($this->route()->user->id ?? null)
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
