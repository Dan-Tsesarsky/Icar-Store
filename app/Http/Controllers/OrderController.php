<?php

namespace App\Http\Controllers;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends MainController
{
    public function ShowOrders(){
Order::allOrders(self::$data);

return view('cms.orders.orders',self::$data);
    }
}