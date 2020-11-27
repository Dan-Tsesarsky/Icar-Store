@extends('master')
@section('main_content')
<div class="container">
    <div class="row">

        <div class="card col-12">
            <img class="card-img-top mt-2" src={{asset('images/'.$product['img'])}} alt="Card image cap">
            <div class="card-body">
                <h1 class="card-title">{{str_replace("ICAR |",'',$title)}}</h1>
                <p class="card-text">{!!$product['article']!!}</p>
                <br>@if(!Cart::get($product['id']))
                <button class="btn btn-success add-to-cart-btn" data-id={{$product['id']}}>Add to cart +</button>
                @else
                <button class="btn btn-success" disabled="disabled">In cart +</button>
                @endif
                <a href={{url('shop/checkout')}} class=" btn btn-primary">Checkout</a>
            </div>
        </div>

    </div>


    @endsection
