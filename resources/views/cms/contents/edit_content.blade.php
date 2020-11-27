@extends('cms.master')
@section('content')

<form action={{url('cms/contents/'.$content['id'])}} method="POST" class="col-12 " novalidate="novalidate">
    {{csrf_field()}}
    {{ method_field('PUT') }}
    <div class="form-group  col-md-6">
        <label for="exampleInputLink1">edit title</label>
        <input type="text" class="form-control link-val" id="exampleInputLink1" name="ctitle"
            value="{{$content['ctitle']}}">
        <span class=" text-danger">{{$errors->first('ctitle')}}</span>
    </div>
    <div class="form-group  col-md-6">
        <label for="summernote">edit Article</label>
        <textarea id="summernote" name="article" class="form-control ">{!!$content['article']!!}</textarea>
        <span class="text-danger"> {{$errors->first('article')}}</span>
    </div>


    <div class="form-group  col-md-6">
        <select name="menu_id" class="form-control">
            <option value="">...select catagory</option>
            @foreach($menus as $item)
            <option @if ($content['menu_id']==$item['id']) selected='selected' @endif value={{$item['id']}}>
                {{$item['title']}}</option>
            @endforeach
        </select><span class="text-danger"> {{$errors->first('menu_id')}}</span><br>
        <a href={{url('cms/contents')}} class="btn btn-secondary
        ">go back to contents</a>
        <button class="btn btn-primary">Submit</button>

    </div>

</form>
</div>
</div>
@endsection