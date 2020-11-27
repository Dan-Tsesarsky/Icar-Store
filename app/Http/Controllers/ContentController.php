<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Content;
use Session;
use App\Http\Requests\ContentRequest;
class ContentController extends MainController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {self::$data['title'].=' Contents';
        self::$data['contents']=Content::all()->toArray();
        return view('cms.contents.all_content',self::$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


        self::$data['title'].=' Add Content';
        self::$data['contents']=Content::all()->toArray();
        return view('cms.contents.add_content',self::$data);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContentRequest $request)
    {
Content::Savenew($request);
return redirect('cms/contents');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        self::$data['title'].=' Delete content';
        self::$data['id']=$id;
        return view('cms.contents.delete_content',self::$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    self::$data['content']=Content::find($id)->toArray();
    return view('cms.contents.edit_content',self::$data);
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
        Content::updateNew($id,$request);
        return redirect('cms/contents');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Content::destroy($id);
        Session::flash('sm','your content was deleted from page');
        return redirect('cms/menus');
    }
}