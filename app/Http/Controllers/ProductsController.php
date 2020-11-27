<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Product;
use App\Http\Requests\ProductRequest;
use Session;
class ProductsController extends MainController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {self::$data['title'].='All products';
         self::$data['products']=Product::all()->toArray();
         self::$data['catagories']=Categorie::all()->toArray();
return view('cms.products.all_products',self::$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        self::$data['catagories']=Categorie::all()->toArray();
        return view('cms.products.add_products',self::$data);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        Product::saveNew($request);
        return redirect('cms/products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        return view('cms.products.delete_products',self::$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        self::$data['title'].=' Edit';
        self::$data['product']=Product::find($id)->toArray();

        self::$data['catagories']=Categorie::all()->toArray();

        return view('cms.products.edit_products',self::$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Product::updateNew($id,$request);
        return redirect('cms/products');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::destroy($id);
        Session::flash('sm','your Prodect was deleted from page');
        return redirect('cms/products');
    }
}
