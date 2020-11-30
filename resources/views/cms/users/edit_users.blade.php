@extends('cms.master')
@section('content')<div class="container">

    <div class="row">
        <div class="col-12">
            <h1 class="display-4">Edit User <i class="fas fa-car "></i></h1>
            <p class="display-5">here you can edit user to the site</p>
        </div>

        <form action={{url('cms/admin/users/'.$user->id)}} method="POST" class="col-12" novalidate="novalidate">
            <input type="hidden" name="no_password">
            <input type="hidden" name="user_id" value="{{$user->id}}">
            {{csrf_field()}}
            {{ method_field('PUT') }}
            <div class="form-group  col-md-6">
                <label for="exampleInputName">Name</label>
                <input type="text" class="form-control" id="exampleInputName" name="name" value={{$user->name}}>
                <span class="text-danger"> {{$errors->first('name')}}</span>
            </div>
            <div class="form-group  col-md-6">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" name="email" value={{$user->email}}>

                <small id="emailHelp" class="form-text text-muted">We' ll never share your email with anyone
                    else.</small>
                <span class="text-danger"> {{$errors->first('email')}}</span>
            </div>
            <div class="form-group  col-md-6">
                <select name="role" id="" class="form-control">
                    @foreach($roles as $role)
                    <option value='{{$role->role}}' @if($user->role==$role->role)
                        selected="selected" @endif> {{$role->users_titles}}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group  col-md-6">
                <button class="btn btn-primary mt-2">Edit User</button>
                <a href='{{url('cms/admin/users')}}' class="btn btn-secondary mt-2">back to users</a>
            </div>

    </div>

    @endsection