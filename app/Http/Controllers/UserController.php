<?php

namespace App\Http\Controllers;
use App\Http\Requests\SignInRequest;
use App\Http\Requests\SignupRequest;
use Illuminate\Http\Request;
use App\Models\User;
class UserController extends MainController
{
    function __construct(){
parent::__construct();
$this->middleware('signmid',['except'=>'logOut']);

    }
   public function getSignIn(){

self::$data['title'].='Signin page';
return view('posts.signin',self::$data);
   }
   public function postSignIn(SignInRequest $request){
$rt=!empty($request['rt'])?$request['rt']:'';
if(User::signInUser($request)){
    return  redirect($rt);
}else{
    self::$data['title'].='Signin page';
  return view('posts.signin',self::$data)->withErrors('Invalid email or password');
}







       }
       public function getSignUp(){
    self::$data['title'].='Signup page';
    return view('posts.signup',self::$data);
       }
       public function postSignUp(SignupRequest $request){

        if(User::signupUser($request)){
            return  redirect('');
        }else{
            self::$data['title'].='Signup page';
          return view('posts.signup',self::$data)->withError('there was problem with connection');
        }
    }



       public function logOut(){
 User::logOut();
 return  redirect('user/signin');
           }

}