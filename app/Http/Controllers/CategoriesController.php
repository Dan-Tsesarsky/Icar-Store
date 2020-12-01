<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Categorie;

use App\Http\Requests\CatagorieRequest;
use Session;
class CategoriesController extends MainController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {self::$data['catagories']=Categorie::all()->toArray();
        self::$data['title'].='Catagories';
return view('cms.catagories.all_categories',self::$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        self::$data['title'].='Add Catagories';
        return view('cms.catagories.add_categorie',self::$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CatagorieRequest $request)
    {
Categorie::saveNew($request);
return redirect('cms/catagories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        self::$data['title'].='delete Catagories';
        self::$data['id']=$id;
        return view('cms.catagories.delete_categorie',self::$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        self::$data['catagorie']=Categorie::find($id)->toArray();
return view('cms.catagories.edit_categorie',self::$data);
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
      Categorie::updateNew($id,$request);
      return redirect('cms/catagories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Categorie::find($id)->products()->delete();

        Categorie::destroy($id);

        Session::flash('sm','your catagories was deleted from page');
        return redirect('cms/catagories');
    }
}
