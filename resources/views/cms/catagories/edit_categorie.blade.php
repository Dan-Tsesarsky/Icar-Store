@extends('cms.master')
@section('content')
<form action={{url('cms/catagories/'.$catagorie['id'])}} method="POST" class="col-12" enctype="multipart/form-data"
    novalidate="novalidate">
    {{csrf_field()}}
    {{ method_field('PUT') }}
    <input type="hidden" name="item_id" id="" value={{$catagorie['id']}}>
    <div class="form-group  col-md-6">
        <label for="exampleInputLink1">*Title</label>
        <input type="text" class="form-control  link-val" id="exampleInputLink1" name="title"
            value={{$catagorie['title']}}>
        <span class="text-danger">{{$errors->first('title')}}</span>
    </div>
    <div class="form-group  col-md-6">
        <label for="summernote">*Article</label>
        <textarea id="summernote" name="article" class="form-control ">{{$catagorie['article']}}</textarea>
        <span class="text-danger"> {{$errors->first('article')}}</span>
    </div>


    <div class="form-group  col-md-6">
        <label for="exampleInputUrl1 ">Url</label>
        <input type="text" class="form-control link-target" id="exampleInputUrl1" name="url"
            value={{$catagorie['url']}}>
        <span class="text-danger"> {{$errors->first('url')}}</span>

    </div>
    <div class="input-group col-md-6">
        <div class="input-group mb-3">
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile02" name='img'>
                <label class="custom-file-label" for="inputGroupFile02">Edit
                    file {{$catagorie['img']}}</label>
                <span class=" text-danger"> {{$errors->first('img')}}</span>
            </div>
        </div>

    </div>
    <div class='form-group  col-md-6'>
        <a href={{url('cms/catagories')}} class="btn btn-secondary ">back to Catagoires</a><button
            class="btn btn-primary m-2">Edit
            Catagorie</button>
    </div>
</form>
</div>
</div>




@endsection
