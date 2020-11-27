<?php

namespace App\Models;
use Session;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;
     static public function saveNew($request){

       $content=new self();  $content->menu_id=$request['menu_id'];
        $content->ctitle=$request['ctitle'];
        $content->article=$request['article'];
        $content->save();
Session::flash('sm','your Content was add to page ');
     }
     static public function updateNew($id,$request){

        $request=$request->toArray();
        $content=self::find($id);  $content->menu_id=$request['menu_id'];
        $content->ctitle=$request['ctitle'];
        $content->article=$request['article'];
        $content->save();
Session::flash('sm','your Content was updated');
     }

     static public function deleteMenu($id){

     }
}