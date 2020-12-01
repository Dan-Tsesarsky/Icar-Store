@extends('cms.master')
@section('content')
<div class="container">
    <p>are you sure you want to delete this user ? </p><br>
    <form action={{url('cms/admin/users/'.$id)}} class='form-row' method="POST">

        {{csrf_field()}}
        {{ method_field('DELETE')}}
        <a href={{url('cms/admin/users')}} class="btn btn-secondary mr-2">back to users</a>
        <button class="btn btn-danger">delete user</button>

    </form>
</div>
@endsection