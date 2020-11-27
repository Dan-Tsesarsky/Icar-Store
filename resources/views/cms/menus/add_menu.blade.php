@extends('cms.master')
@section('content')
<form action={{url('cms/menus')}} method="POST" class="col-12" novalidate="novalidate">
    {{csrf_field()}} <div class="form-group  col-md-6">
        <label for="exampleInputLink1">Link</label>
        <input type="text" class="form-control link-val" id="exampleInputLink1" name="link" value={{old('link')}}>
        <span class="text-danger">{{$errors->first('link')}}</span>
    </div>
    <div class="form-group  col-md-6">
        <label for="exampleInputTitle">Title</label>
        <input type="text" class="form-control" id="exampleInputTitle" name="title" value={{old('title')}}>
        <span class="text-danger"> {{$errors->first('title')}}</span>
    </div>


    <div class="form-group  col-md-6">
        <label for="exampleInputUrl1 ">Url</label>
        <input type="text" class="form-control link-target" id="exampleInputUrl1" name="url" value={{old('url')}}>
        <span class="text-danger">{{$errors->first('url')}}</span>
        <a href={{url('cms/menus')}} class="btn btn-secondary m-2">back to menu</a><button
            class="btn btn-primary m-2">Add
            menu</button>
    </div>
</form>
</div>
</div>







@endsection
