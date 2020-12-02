<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
class ProductRequest extends FormRequest
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
        return [
        'title'=>'required|min:2',
        'article'=>'required|min:2',
        'price'=>'required|numeric|min:2',
        'url'=>'required|regex:/^[a-z\d-]+$/i|unique:categories,url'.$unique,
        'stock;'=>'required|numeric|gte:0|max:100','img'=>'image','categorie_id'=>'required|numeric',
        ];
    }
}
