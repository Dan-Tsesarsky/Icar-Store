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
$data=[]; $err=[]; $stock=[];

foreach($cart as $key=>$val){
$data[$key]=$val;
if($data[$key]['attributes']['stock']<$data[$key]['quantity']) {
    $proderrstock=$data[$key]['attributes']['stock'];
    $proderrname=$data[$key]['name'];
    if($data[$key]['attributes']['stock'])$err[$key]="we have only $proderrstock cars of $proderrname left for  you cant order more ";
    else if($data[$key]['attributes']['stock']==0){$err[$key]="we dont have  more cars of $proderrname in stock ";}
}
else if(count($err)==0 && $data[$key]['attributes']['stock']>=$data[$key]['quantity']){
    $stock[$key]=$data[$key]['attributes']['stock']-$data[$key]['quantity'];}
};
if(count($err)==0){
    foreach($cart as $index=>$val){
$prod=Product::find($index);
$prod->stock=$stock[$index];
$prod->save();
    }


    $cart=serialize($cart);
    $order=new self();
    $order->user_id=Session::get('user_id');
    $order->data=$cart;
    $order->total=Cart::getTotal();
    $order->save();
    Cart::clear();
    Session::flash('sm','your order had been succesfull ');

}
else{
    return $err;
}


}
    static  public function allOrders(&$order){
     $order['orders']=DB::table('users')->orderBy('created_at', 'desc')
     ->join('orders', 'orders.user_id', '=', 'users.id')
     ->select('orders.*', 'users.name')
     ->get()->toArray();
            }
        }
