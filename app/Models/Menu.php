<?php

namespace App\Models;
use Session;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
     static public function saveNew($request){

        $menu=new self();
        $menu->link=$request['link'];
        $menu->title=$request['title'];

        $menu->url=$request['url'];
        $menu->save();
Session::flash('sm','your link was add to menu');
     }
     static public function updateNew($id,$request){

        $request=$request->toArray();
        $menu=self::find($id);
        $menu->link=$request['link'];
        $menu->title=$request['title'];
        $menu->url=$request['url'];
        $menu->save();
Session::flash('sm','your link was updtated to menu');
     }

     static public function deleteMenu($id){

     }
}
