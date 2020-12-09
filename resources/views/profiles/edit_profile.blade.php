@extends('master')
@section('main_content')

<div class="row">
    <div class="container
    ">
        <div class="col-12">
            <h1 class="display-4">Edit User <i class="fas fa-car "></i></h1>
            <p class="display-5">here you can edit user to the site</p>
        </div>
    </div>
    <div class="container
    ">
        <form action={{url('user/profile/'.$user['id'])}} method="POST" class="col-12" novalidate="novalidate"
            enctype="multipart/form-data">

            {{csrf_field()}}
            {{ method_field('PUT') }}
            <input type="hidden" name="user_id" value="{{$user['id']}}">
            <div class="form-group  col-md-6">
                <label for="exampleInputName">Name</label>
                <input type="text" class="form-control" id="exampleInputName" name="name" value={{$user['name']}}>
                <span class="text-danger"> {{$errors->first('name')}}</span>
            </div>
            <div class="form-group  col-md-6">
                <label for="exampleInputEmail1">Edit Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" value={{$user['email']}}>

                <small id="emailHelp" class="form-text text-muted">We' ll never share your email with anyone
                    else.</small>
                <span class="text-danger"> {{$errors->first('email')}}</span>
            </div>
            @if(!$profile['gender'])<div class="form-group  col-md-6">
                <label for="exampleInputGender">Gender</label>
                <input type="text" class="form-control" id="exampleInputGender" name="gender" value='{{old('gender')}}'>
                <span class="text-danger"> {{$errors->first('gender')}}</span>
            </div>
            @elseif($profile['gender']) <div class="form-group  col-md-6">
                <label for="exampleInputGender">Gender</label>
                <input type="text" class="form-control" id="exampleInputGender" name="gender"
                    value='{{$profile['gender']}}'>
                <span class="text-danger"> {{$errors->first('gender')}}</span>
            </div>

            @endif
            @if (!$profile['address'])<div class="form-group  col-md-6">
                <label for="exampleInputGender">Address</label>
                <input type="text" class="form-control" id="exampleInputAddress" name="address"
                    value='{{old('address')}}'>
                <span class="text-danger">{{$errors->first('address')}}</span>
            </div>
            @elseif ($profile['address']) <div class="form-group  col-md-6">
                <label for="exampleInputGender">Address</label>
                <input type="text" class="form-control" id="exampleInputAddress" name="address" @if(old('address'))
                    value="{{old('address')}}" @else value="{{$profile['address']}}">
                @endif
                <span class=" text-danger">{{$errors->first('address')}}</span>
            </div>

            @endif
            @if(!$profile['age'])<div class="form-group  col-md-6">
                <label for="exampleInputGender">Age</label>
                <input type="number" class="form-control" id="exampleInputAge" name="age" value='{{old('age')}}'>
                <span class="text-danger"> {{$errors->first('age')}}</span>
            </div>
            @elseif($profile['age']) <div class="form-group  col-md-6">
                <label for="exampleInputGender">Age</label>
                <input type="text" class="form-control" id="exampleInputAge" name="age" value='{{$profile['age']}}'>
                <span class="text-danger"> {{$errors->first('age')}}</span>
            </div>

            @endif
            @if(!$profile['img']) <div class="input-group col-md-6">
                <div class="input-group mb-3">
                    <div class="custom-file"> <label class="custom-file-label" for="inputGroupFile02">Choose
                            profile picture '{{old('img')}}'</label>
                        <input type="file" class="custom-file-input" id="inputGroupFile02" name='img'>

                        <span class=" text-danger"> {{$errors->first('img')}}</span>
                    </div>
                </div>

            </div>

            @elseif($profile['img'])
            <div class="input-group col-md-6">
                <div class="input-group mb-3">
                    <div class="custom-file"> <label class="custom-file-label" for="inputGroupFile02">
                            {{$profile['img']}}
                            Edit
                            Picture </label>
                        <input type="file" class="custom-file-input" id="inputGroupFile02" name='img'
                            value='{{$profile['img']}}'>

                        <span class=" text-danger"> {{$errors->first('img')}}</span>
                    </div>
                </div>

            </div>
            @endif

            <div class="form-group  col-md-6">
                <label for="exampleInputPassword1">Edit Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                <span class="text-danger"> {{$errors->first('password')}}</span>
            </div>
            <div class="form-group  col-md-6">
                <label for="checkInputPassword1">confirm password</label>
                <input type="password" class="form-control" id="checkInputPassword1" name="password_confirmation">
                <span class="text-danger"></span>
            </div>

            <div class="form-group  col-md-6">
                <button class="btn btn-primary mt-2">Edit User</button>
                <a href=' {{url('user/profile')}}' class="btn btn-secondary mt-2">back to profile</a>
            </div>


            </d iv>
    </div>


    @endsection