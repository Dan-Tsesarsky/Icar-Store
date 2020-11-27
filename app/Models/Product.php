<?php

namespace App\Models;
use Cart,Session,Image,DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Categorie
{
    use HasFactory;
   static public function getProductUrl($cat_url,&$data,$orderby){
       if(Categorie::where('url','=',$cat_url)->first()){
       $catagorey=Categorie::where('url','=',$cat_url)->first()->toArray();
       $data["title"].=$catagorey["title"]." Product";
if($products=Categorie::find($catagorey['id'])->products){
if(!$orderby){
$data['products']=$products->toArray();
}
else if($orderby=='desc'){
$data['products']=$products->sortByDesc('price')->toArray();
}
else if($orderby=='asc'){
    $data['products']=$products->sortBy('price')->toArray();
    }
$data["cat_url"]=$cat_url;
}
       }
else
{
    abort(404);
}


    }
    static public function addToCart($id){
      if(!empty($id) && is_numeric($id)){
;
if(!Cart::get($id)){
if($product=self::find($id)){
$product=$product->toArray();
Cart::add($id, $product['title'], $product['price'], 1, []);
Session::flash('sm',$product['title'].' added to your cart');
}
      }
}

}

static public function updateCart($requst){
if (!empty($requst["id"])&&is_numeric($requst["id"])){
if(!empty($requst["op"])){
    $item=Cart::get($requst['id']);
    if($item){
if($requst["op"]=='+'){
    Cart::update($requst['id'], [
        'quantity' => 1
    ]);
}
else if($requst["op"]=='-'){
if($item['quantity']-1!==0){
    Cart::update($requst['id'], [
        'quantity' => -1
    ]);
}}
    }
}


}

 }
 static public function removeItem($id){
    Cart::remove($id);

    }
static public function clearCart(){
Cart::clear();

}
static public function Order(){
  Order::saveNew();

}
static public function search($request){
$search=$request['search'];
$searchresult=DB::table('products')->where('products.title', 'like', '%' . $search . '%')
->join('categories', 'products.categorie_id', '=', 'categories.id')
->select('products.title','products.url', 'categories.url AS curl')->get()
;
if(!empty($searchresult)){
$searchresult=json_encode($searchresult);
echo $searchresult;
}
else{
    echo'no response is avlible';
}

}
static public function saveNew($request){



    $product=new self();
    $product->categorie_id=$request['categorie_id'];
    $product->title=$request['title'];
     $product->article=$request['article'];
     $product->price=$request['price'];
     $product->url=$request['url'];
     $img=self::addImage($request);
     $image_name=$img?$img:'user-image-with-black-background.png';
     $product->img=$image_name;
     $product->save();
Session::flash('sm','your Catagorie was add to page ');$product->url=$request['url'];
  }
  static public function updateNew($id,$request){


     $product=self::find($id);
     $product->categorie_id=$request['categorie_id'];
     $product->title=$request['title'];
     $product->price=$request['price'];
     $product->article=$request['article'];$product->url=$request['url'];
     $img=self::addImage($request);
if($img){
$product->img=$img;
}
     $product->save();
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