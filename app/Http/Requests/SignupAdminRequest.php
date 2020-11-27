<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupAdminRequest extends FormRequest
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
            'name'=>'min:2|required',
            'email'=>'required|email|unique:users,email',
            'role'=>'required|',
            'password'=>'required|min:6|max:10|confirmed'
        ];
    }
}