<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Usersrequest extends FormRequest
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

        $postId = $this->route()->parameter( 'user' );

        return [
            'name' => 'required|unique:users,name, ' . $postId,
            'email' => 'required|email|unique:users,email, ' . $postId,
            'password' => 'confirmed',
            'state' => 'required|integer'
        ];
    }
}
