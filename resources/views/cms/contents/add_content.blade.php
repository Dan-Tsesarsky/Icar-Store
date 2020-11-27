@extends('cms.master')
@section('content')
<form action={{url('cms/contents')}} method="POST" class="col-12 " novalidate="novalidate">
    {{csrf_field()}}
    <div class="form-group  col-md-6">
        <label for="exampleInputLink1">*Title</label>
        <input type="text" class="form-control link-val" id="exampleInputLink1" name="ctitle" value={{old('ctitle')}}>
        <span class="text-danger">{{$errors->first('ctitle')}}</span>
    </div>
    <div class="form-group  col-md-6">
        <label for="summernote">*Article</label>
        <textarea id="summernote" name="article" class="form-control ">{!!old('article')!!}</textarea>
        <span class="text-danger"> {{$errors->first('article')}}</span>
    </div>


    <div class="form-group  col-md-6">
        <select name="menu_id" class="form-control">
            <option value="">...select catagory</option>
            @foreach($menus as $item)
            <option @if (old('menu_id')==$item['id']) selected='selected' @endif value={{$item['id']}}>
                {{$item['title']}}</option>
            @endforeach
        </select><span class="text-danger"> {{$errors->first('menu_id')}}</span><br>
        <a href={{url('cms/contents')}} class="btn btn-secondary m-2">back to content</a>
        <button class="btn btn-primary m-2 m2">Submit</button>

    </div>

</form>
</div>
</div>
@endsection
