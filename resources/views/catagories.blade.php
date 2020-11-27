@extends('master')
@section('main_content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="display-4 text-center">Car Shop Categories <i class="fas fa-car "></i></h1>
        </div>
    </div>
    <div class="container mt-3">

        <div class="row">
            @foreach ($categories as $category)
            <div class="col-sm-12 col-md-6 col-lg-4">

                <h3>{{$category['title']}}</h3>
                <img src={{asset('images/'.$category['img'])}} alt="" class="img-fluid">
                <div>
                    <a href={{url('shop/'.$category['url'])}} class="btn  btn-success mt-2">view catagory
                    </a>
                </div>
            </div>
            @endforeach
        </div>


        @endsection