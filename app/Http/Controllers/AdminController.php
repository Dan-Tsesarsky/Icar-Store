<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use DB,Session;
use App\Http\Requests\SignupAdminRequest;

class AdminController extends MainController
{
   static private $roles='';
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        self::$data['title'].='Users';


        User::allUsers(self::$data);

    return view('cms.users.all_users',self::$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        User::roles(self::$data);

    return view('cms.users.add_users',self::$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SignupAdminRequest $request)
    {
      $request=($request->toArray());
      User::signupWithAdmin($request);
      return redirect('cms/admin/users');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        self::$data['id']=$id;
        return view('cms.users.delete_user',self::$data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        User::roles(self::$data);
User::getUser($id,self::$data);

        return view('cms.users.edit_users',self::$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,SignupAdminRequest $request)
    {
        $request=$request->toArray();
        User::updateWithAdmin($id,$request);
        return redirect('cms/admin/users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        Session::flash('sm','your chosen user was deleted from page');
        return redirect('cms/admin/users');
    }
}