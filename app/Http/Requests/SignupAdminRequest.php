<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
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
    public function rules(Request $request)

    {
        $unique=isset($request['user_id'])?','.($request['user']):'';
        $withnopassword=!isset($request['no_password'])?"required":"";

        return [
            'name'=>'min:2|required',
            'email'=>'required|email|unique:users,email'.$unique,
            'role'=>'required|',
            'password'=>"$withnopassword|min:6|max:10|confirmed"
        ];
    }
}
