<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'grade_id' => 'integer|required',
            'name' => 'string|required',
            'last' => 'string|required',
            'has_bros' => 'boolean | nullable',
            'bros' => 'nullable',
            'parent_name' => 'string|required',
            'parent_last' => 'string|required',
            'phone_aditional' => 'string',
            'phone' => 'string|required',
            'email' => 'email',
            'question' => 'string | nullable',
        ];
    }
}
