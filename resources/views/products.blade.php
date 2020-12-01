@extends('master')
@section('main_content')



<div class="container">
    <div class="row">
        <div class="col-12">


            <div class="btn-group mt-3">
                <button class="btn btn-secondary" disabled="disabled">Order by price</button>
                <a href={{url('shop/'.$cat_url.'?orderby=desc')}} class="btn btn-secondary">High to low</a>
                <a href={{url('shop/'.$cat_url.'?orderby=asc')}} class="btn btn-secondary">Low to high</a>
            </div>
        </div>




        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="display-4 ">{{str_replace('ICAR |','',$title)}} <i class="fas fa-car "></i>
                    </h1>
                </div>
            </div>
        </div>

    </div>

    <div class='container'>
        <div class="row">

            @foreach($products as $product)
            <div class="card col-md-6">
                <img class="card-img-top mt-2" width='300px' src={{asset('images/'.$product['img'])}}
                    alt="Card image cap">
                <div class="card-body">
                    <h3 class="card-title"> {{$product['title']}}</h3>
                    <p class="card-text">
                        <b> price: {{$product['price']}}$</b>
                        <br>
                        @if(!Cart::get($product['id']))
                        <button class="btn btn-success add-to-cart-btn" data-id={{$product['id']}}>Add to cart
                            +</button>
                        @else
                        <button class="btn btn-success" disabled="disabled">In cart +</button>
                        @endif
                        <a href={{url('shop/'.$cat_url.'/'.$product['url'])}} class="btn btn-primary ">More info
                        </a>
                    </p>
                </div>
            </div>
            @endforeach
        </div>
    </div>










    @endsection
