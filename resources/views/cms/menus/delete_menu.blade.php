@extends('cms.master')
@section('content')
<div class="container">

    <form action={{url('cms/menus/'.$id)}} class='form-row' method="POST">
        {{csrf_field()}}
        {{ method_field('DELETE')}}
        <a href={{url('cms/menus')}} class="btn btn-secondary mr-2">back to menu</a>
        <button class="btn btn-danger">delete menu</button>

    </form>
</div>
@endsection