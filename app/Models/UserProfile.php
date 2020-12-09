<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Session,Image;
class UserProfile extends Model
{
    use HasFactory;
    static public function getuserId($id){
       return self::find($id)->toArray();
            }
            static public function editProfile($id){
            $profile=self::find($id)->toArray();

            }
            static public function UpdateProfile($request){
$user_profile=self::find($request->user_id);
$user=User::find($request->user_id);

if($request->name&&$request->name!==$user->name||$request->email&&$request->email!==$user->email||$request->password){

if($request->password&&!Hash::check($request->password,$user->password)){
    $user->password=$request->password;
}

if($request->name&&$request->name!==$user->name){
    $user->name=$request->name;
    Session::put('user_name',$user->name);
}
if($request->email!==$user->email){
    $user->email=$request->email;
}

if(!($request->password)){dd($request->password);}

$updatedUser=$user->save();

}
if($request->gender&&$user_profile->gender!==$request->gender||$request->address&&$user_profile->address!==$request->address||$request->img||$request->age&&$user_profile->age!==$request->age){
if($request->gender&&$user_profile->gender!==$request->gender){
    $user_profile->gender= strtolower($request->gender);

}
if($request->img){
    $user_profile->img=self:: addImageProfile($request,$request->user_id);
}
if($request->address&&$user_profile->address!==$request->address){

    $user_profile->address=$request->address;

}

if($request->age&&$user_profile->age!==$request->age){
  $user_profile->age=$request->age;
}

$updatedprofile=$user_profile->save();
}


if(isset($updatedprofile)&&$updatedprofile||isset($updatedUser)&&$updatedUser){
    Session::flash('sm','you have updated the user  succesfuly ');
    return true;
}
else{
    return false ;
}
        }

  static private function addImageProfile($request,$id){
    $image_name='';
    if($request->hasFile('img')&&$request->file('img')->isValid()){
        $file=$request->file('img');
        $profile=self::find($id);

$image_name=date('Y.m.d.h.i.s').'-'.$file->getClientOriginalName();

$request->file('img')->move(public_path('').'/images',$image_name);
$img=Image::make(public_path('').'/images'.'/'.$image_name);
$img->resize(300, null, function ($constraint) {
$constraint->aspectRatio();
});$img->save(public_path('').'/images'.'/'.$image_name);
return $image_name;

 }}
}
