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
$cart=serialize($cart);

$order=new self();
$order->user_id=Session::get('user_id');
$order->data=$cart;
$order->total=Cart::getTotal();
$order->save();
Cart::clear();
Session::flash('sm','your order had been succesfull ');
    }
    static  public function allOrders(&$order){
     $order['orders']=DB::table('users')->orderBy('created_at', 'desc')
     ->join('orders', 'orders.user_id', '=', 'users.id')
     ->select('orders.*', 'users.name')
     ->get()->toArray();
            }
        }