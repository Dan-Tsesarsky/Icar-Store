<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Session;
class User extends Model
{
    use HasFactory;

static public function signInUser($request){
$valid=false;
$password=$request['password'];
$email=$request['email'];
$sql="SELECT * FROM users u JOIN user_roles_ ur on u.id=ur.uid
WHERE u.email=?";
$user=DB::select($sql,[$email]);
if($user){
    $user=$user[0];

    if(Hash::check($password,$user->password)){
        $valid=true;

        if($user->role==6) Session::put('is_admin',true);
        Session::put('user_id',$user->id);
        Session::put('user_name',$user->name);
        Session::flash('sm','welcome back '.$user->name);
    }

    else{
        return $valid;


    }
}




return $valid;
}
static public function signupUser($request){
$user=new self();
$user->email=$request['email'];
$user->password=bcrypt($request['password']);
$user->name=$request['name'];
$user->save();
$uid=$user->id;
DB::insert("INSERT INTO user_roles_ VALUES($uid,7)");
Session::put('user_id',$user->id);
Session::put('user_name',$user->name);
Session::flash('sm','you have signed up succesfuly '.$user->name);
return true;

}
static public function logOut(){
    Session::flush();
}
static public function allUsers(&$data){
$data['users']=DB::table('users')
->join('user_roles_', 'users.id', '=', 'user_roles_.uid')->
join('users_titles', 'user_roles_.role', '=', 'users_titles.ut_id')->
orderByDesc('updated_at')->get()->toArray();

}
static public function roles(&$role){
    $role['roles']=DB::table('user_roles_')->join('users_titles', 'user_roles_.role', '=', 'users_titles.ut_id')->groupBy('user_roles_.role')->select('user_roles_.role','users_titles.users_titles')->get()->toArray();
}
static public function signupWithAdmin($request){



    $user=new self(); ;
    $user->email=$request['email'];
    $user->password=bcrypt($request['password']);
    $user->name=$request['name'];

    $user->save();
    $uid=$user->id;
    ;
    $role=(int)$request['role'];
    DB::insert("INSERT INTO users_roles VALUES($uid,$role)");
    Session::put('user_id',$user->id);
    Session::put('user_name',$user->name);
    Session::flash('sm','you have signed up succesfuly '.$user->name);
    return true;

    }
    static public function getUser($id,&$data){
        $user=DB::table('users')->where('users.id','=',$id)->join('user_roles_', 'users.id', '=', 'user_roles_.uid')->get()->toArray();
$data['user']=$user[0];
}
static public function updateWithAdmin($id,$request){
    $user=self::find($id);
    $user->name=$request['name'];
    $user->email=$request['email'];
    $user->save();
    $role=$request['role'];
    DB::update(" UPDATE user_roles_ SET user_roles_.role=$role WHERE user_roles_.uid=$id");
    Session::put('user_id',$user->id);
    Session::put('user_name',$user->name);
    Session::flash('sm','you have updated the user  succesfuly '.$user->name);

}




}