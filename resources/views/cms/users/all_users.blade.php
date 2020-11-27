@extends('cms.master')
@section('content')
<div class='container'>
    <div class='row'>
        <div>
            <h1 class='display-4'>Users</h1>
            <p>here you can see all avilable Orders </p>
            <a href={{url('cms/admin/users/create')}} class="btn btn-primary mb-2">Add User</a>
        </div>
    </div>
    <div class='row'>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>User Name </th>
                        <th>User Email</th>
                        <th>type of user </th>
                        <th>created_at</th>
                        <th>updated_at</th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach($users as $item)
                        <td>{{$item->name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->users_title}}</td>
                        <td>{{$item->created_at}}</td>
                        <td>{{$item->updated_at}}</td>
                        <td><a href={{url('cms/admin/users/'.$item->id.'/edit')}}>Edit</a> | <a
                                href={{url('cms/admin/users/'.$item->id)}}>Delete</a>
                        </td>


                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>







    @endsection



























































































































































    tion
