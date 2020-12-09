<?php

namespace App\Http\Requests;

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class ProfileRequest extends FormRequest
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
        $unique=isset($request['user_id'])?','.($request['user_id']):'';


        return [
            'name'=>'min:2|required',
            'email'=>'required|email|unique:users,email'.$unique,
            'gender'=>['regex:/^((?i)male|female)$/'],'address'=>'nullable|min:6|max:255','age'=>['regex:/^(?:1[01][0-9]|120|1[6-9]|[2-9][0-9])$/'],'img'=>'nullable|image',
            'password'=>"nullable|min:6|max:10|confirmed",
        ];
    }
    public function messages()
    {
        return [
            'gender.regex' => 'gender is or male or female ',
            'age.regex'=>'age beetwen 16 -120 '
        ];
    }

}
