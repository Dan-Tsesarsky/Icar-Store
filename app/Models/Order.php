<?php

namespace App\Models;
use Cart,Session,DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

  static  public function saveNew(){
$cartCollection=Cart::getContent();
$cart=$cartCollection->toArray();
$data=[]; $err=[];
dd(count($err));
foreach($cart as $key=>$val){
$data[$key]=$val;

 $prod=Product::find($key);


if($prod->stock>=$data[$key]['quantity']){
$prod->stock=$prod->stock-$data[$key]['quantity'];
$prod->save();}
else {
    if($prod->stock)$err[$key]="we have only $prod->stock cars of $prod->title left for  you cant order more ";
    else if($prod->stock==0){$err[$key]="we dont have  more cars in stock ";}
}
};
if(count($err)==0){
    $cart=serialize($cart);
    ;
    $order=new self();
    $order->user_id=Session::get('user_id');
    $order->data=$cart;
    $order->total=Cart::getTotal();
    $order->save();
    Cart::clear();
    Session::flash('sm','your order had been succesfull ');

}


}
    static  public function allOrders(&$order){
     $order['orders']=DB::table('users')->orderBy('created_at', 'desc')
     ->join('orders', 'orders.user_id', '=', 'users.id')
     ->select('orders.*', 'users.name')
     ->get()->toArray();
            }
        }