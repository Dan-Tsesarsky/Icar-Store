<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class ContentRequest extends FormRequest
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
        return [ 'ctitle'=>'required|min:2',
        'article'=>'required|min:2',
        'menu_id'=>'required|numeric'
        ];
    }
    public function messages()
{
    return [
        'menu_id.required' => 'Catagory feild is required',
    ];
}
}