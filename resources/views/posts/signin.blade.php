@extends('master')
@section('main_content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1 class="display-4">{{str_replace('ICAR |','',$title)}} <i class="fas fa-car "></i></h1>
            <p class="display-5">here you can sign in to the store and after you will ba able to order products</p>
        </div>
        <form action="" method="POST" class="col-12" novalidate="novalidate">
            {{csrf_field()}}
            <div class="form-group  col-md-6">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" value={{old('email')}}>

                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone
                    else.</small>
                <span class="text-danger"> {{$errors->first('email')}}</span>
            </div>
            <div class="form-group  col-md-6">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                <span class="text-danger"> {{$errors->first('password')}}</span>
                <button class="btn btn-primary mt-2">SignIn</button>
            </div>
        </form>
    </div>
</div>






@endsection
