<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class MenuRequest extends FormRequest
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
        $unique=isset($request['item_id'])?','.($request['item_id']):'';
        return [ 'link'=>'min:2|required',
        'title'=>'required|min:2',
        'url'=>'required|regex:/^[a-z\d-]+$/i|unique:menus,url'.$unique
        ];
    }
}