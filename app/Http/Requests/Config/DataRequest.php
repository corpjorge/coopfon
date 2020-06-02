<?php

namespace App\Http\Requests\Config;

use App\User;
use Illuminate\Validation\Rule;
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
            'document_type_id' => ['required'],
            'document' => ['required', Rule::unique((new User)->getTable())->ignore(auth()->id())],
            'phone' => ['nullable'],
            'code' => ['nullable'],
            'gender' => ['nullable'],
            'address' => ['nullable'],
            'area' => ['nullable'],
            'birth_date' => ['nullable', 'date_format:m/d/Y'],
            'city_id' => ['nullable']
        ];
    }
}
