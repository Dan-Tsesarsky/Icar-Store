<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Product;
use Cart,Session;
class ShopController extends MainController
{

    public function catagories(){

       self::$data['title'].=' Shop Categories';
self::$data['categories']=Categorie::all()->toArray();

return view("catagories",self::$data);
        }
        public function products($cat_url,Request $request){
            $orderby=!empty($request['orderby'])?$request['orderby']:'';
            Product::getProductUrl($cat_url,self::$data,$orderby);


self::$data['cat_url']=$cat_url;


            return view('products',self::$data);
            }
            public function item($cat_url,$item_url){
if($product=Product::where('url','=',$item_url)->first()){
    $product=$product->toArray();
self::$data['title'].=$product['title'];
self::$data['product']=$product;

return view('item',self::$data);
          }
          else{

          }
}

public function searchProduct(Request $request){
    Product::search($request);
}

public function addToCart(Request $request){
Product::addToCart($request['id']);

}
public function removeItem($id){
    Product::removeItem($id);
    return redirect('shop/checkout');
    }

public function checkOut(){
    $cartCollection = Cart::getContent();
   $cart= $cartCollection->toArray();
   sort($cart);
  self::$data['cart']=$cart;
  self::$data['title'].="Checkout page";

 return view('content.checkout',self::$data);
}
public function updateCart(Request $request){
    Product::updateCart($request);


    }
    public function clearCart(Request $request){
Cart::clear();
return redirect('shop/checkout');


}
public function Order(Request $request){
    if(Cart::isEmpty()){
        return redirect('shop');
    }


    if(!Session::has('user_id')){
;
       return redirect('user/signin?rt=shop/checkout');
    }
    Product::Order($request);
    return redirect('');

}


}
