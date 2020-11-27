@extends('master')
@section('main_content')

@if($cart)
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="display-4 text-center">{{str_replace('ICAR |','',$title)}} <i class="fas fa-car "></i></h1>

        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-bordered">


                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Sub Total</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart as $item)
                    <tr>
                        <td>{{$item['name']}}
                        </td>
                        <td><input type="button" data-id={{$item['id']}} class="update-cart" value=->
                            <input type="text" class="m-2" value={{$item['quantity']}} disabled="disabled">
                            <input type="button" class="update-cart" value=+ data-id={{$item['id']}}>
                        </td>
                        <td>{{$item['price']}}$</td>
                        <td>{{Cart::get($item['id'])->getPriceSum()}}$</td>
                        <td><a href={{url('shop/remove-item/'.$item['id'])}}><i class="fa fa-trash"
                                    aria-hidden="true"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div>
                <p><b>total in cart:{{Cart::getTotal()}}$</b>
                    <a class="btn btn-primary" href={{url('shop/order')}}>Order Now</a>
                    <a href={{url('shop/clear-cart')}} class=" btn btn-secondary float-right">
                        Clean Cart</a>
                </p>
            </div>


        </div>
    </div>

    @else
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="display-4 text-center">{{str_replace('ICAR |','',$title)}} <i class="fas fa-car "></i></h1>

                <p class="display-5 text-center">
                    no items are in Cart
                    <br>
                    <a href={{url('shop')}} class="btn btn-primary mt-2">go back to the shop to order items</a>
                </p>


            </div>

        </div>
    </div>
</div>
@endif









@endsection
