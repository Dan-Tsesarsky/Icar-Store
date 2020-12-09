<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use App\Models\UserProfile;
use App\Http\Requests\ProfileRequest;
use Session;
class UserProfileController extends MainController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        self::$data['title'].='user profile';
        self::$data['user']=User::find(Session::get('user_id'),['id', 'name','email'])
        ->toArray();
        self::$data['profile']=UserProfile::find(Session::get('user_id'))
        ->toArray();

        return view('profiles.my_profile',self::$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        echo __METHOD__;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo __METHOD__;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo __METHOD__;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {if($id=Session::get('user_id')){
        self::$data['title'].='user profile';
        self::$data['user']=User::find(Session::get('user_id'),['id', 'name','email'])
->toArray();
self::$data['profile']=(UserProfile::getuserId($id));
return view('profiles.edit_profile',self::$data);

    }
else return redirect('user/profile');
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id,ProfileRequest $request)
    {
        $req=$request->toArray();
        $req['password']=bcrypt($req['password']);
     $req['password_confirmation']=bcrypt($req['password_confirmation']);

       if (Session::get('user_id')!=$req['user_id']) return redirect('user/profile');
       else {
           if($request->password){
           $request->password=bcrypt($request->password);
           }
if(UserProfile::UpdateProfile($request)){
    return redirect('user/profile');
};
return redirect('user/profile');


       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}