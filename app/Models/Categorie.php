<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Image,Session;
class Categorie extends Model
{
    use HasFactory;
    public function products()
    {
        return $this->hasMany('App\Models\Product');
    }
    static public function saveNew($request){



        $catagorie=new self();
        $catagorie->title=$request['title'];
         $catagorie->article=$request['article'];$catagorie->url=$request['url'];
         $img=self::addImage($request);
         $image_name=$img?$img:'user-image-with-black-background.png';
         $catagorie->img=$image_name;
         $catagorie->save();
 Session::flash('sm','your Catagorie was add to page ');$catagorie->url=$request['url'];
      }
      static public function updateNew($id,$request){


         $catagorie=self::find($id);
         $catagorie->title=$request['title'];
         $catagorie->article=$request['article'];$catagorie->url=$request['url'];
         $img=self::addImage($request);
if($img){
    $catagorie->img=$img;
}
         $catagorie->save();
 Session::flash('sm','your Catagorie was updated
 ');
      }

      static private function addImage($request){
        $image_name='';
        if($request->hasFile('img')&&$request->file('img')->isValid()){
            $file=$request->file('img');
    $image_name=date('Y.m.d.h.i.s').'-'.$file->getClientOriginalName();

  $request->file('img')->move(public_path('').'/images',$image_name);
  $img=Image::make(public_path('').'/images'.'/'.$image_name);
  $img->resize(300, null, function ($constraint) {
    $constraint->aspectRatio();
});$img->save(public_path('').'/images'.'/'.$image_name);
return $image_name;
      }}

}