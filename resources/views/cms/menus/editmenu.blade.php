@extends('cms.master')
@section('content')

<form action={{url('cms/menus/'.$menu['id'])}} method="POST" class="col-12" novalidate="novalidate">
    {{ method_field('PUT') }}
    <input type="hidden" name="item_id" id="" value={{$menu['id']}}>
    {{csrf_field()}} <div class="form-group  col-md-6">
        <label for="exampleInputLink1">Link</label>
        <input type="text" class="form-control link-val" id="exampleInputLink1" value="{{$menu['link']}}" name="link" />
        <span class="text-danger">{{$errors->first('link')}}</span>
    </div>
    <div class="form-group  col-md-6">
        <label for="exampleInputTitle">Title</label>
        <input type="text" class="form-control" id="exampleInputTitle" name="title" value="{{$menu['title']}}" />
        <span class=" text-danger"> {{$errors->first('title')}}</span>
    </div>


    <div class="form-group  col-md-6">
        <label for="exampleInputUrl1 ">Url</label>
        <input type="text" class="form-control link-target" id="exampleInputUrl1" name="url" value={{$menu['url']}}>
        <span class="text-danger">{{$errors->first('url')}}</span>
        <a href={{url('cms/menus')}} class='btn btn-secondary mt-2'>Cancel</a>
        <button class="btn btn-primary mt-2">Update</button>
    </div>
</form>
</div>
</div>



@endsection