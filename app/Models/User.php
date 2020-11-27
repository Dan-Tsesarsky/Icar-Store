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
$sql="SELECT * FROM users u JOIN users_roles ur on u.id=ur.uid
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
DB::insert("INSERT INTO users_roles VALUES($uid,7)");
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
->join('users_roles', 'users.id', '=', 'users_roles.uid')->
join('users_titles', 'users_roles.role', '=', 'users_titles.id')->
orderByDesc('updated_at')->get()->toArray();
}
static public function roles(&$role){
    $role['roles']=DB::table('users_roles')->join('users_titles', 'users_roles.role', '=', 'users_titles.id')->groupBy('users_roles.role')->select('users_roles.role','users_titles.users_title')->get()->toArray();
}
}