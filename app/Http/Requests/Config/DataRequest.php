<?php

namespace App\Http\Requests\Config;

use Illuminate\Foundation\Http\FormRequest;

class DataRequest extends FormRequest
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
            'phone' => ['required'],
            'gender_id' => ['required', 'integer', 'exists:genders,id'],
            'address' => ['required'],
            'area' => ['nullable'],
            'birth_date' => ['required', 'date_format:d-m-Y'],
            'city_id' => ['required', 'integer', 'exists:city,code']
        ];
    }
}
