@extends('cms.master')
@section('content')
<form action={{url('cms/products/'.$product['id'])}} method="POST" class="col-12" enctype="multipart/form-data"
    novalidate="novalidate">
    {{csrf_field()}}
    {{ method_field('PUT') }}
    <div class="form-group  col-md-6">
        <label for="exampleInputLink1">*Title</label>
        <input type="text" class="form-control  link-val" id="exampleInputLink1" name="title"
            value={{$product['title']}}>
        <span class="text-danger">{{$errors->first('title')}}</span>
    </div>
    <div class="form-group  col-md-6">
        <label for="summernote">*Article</label>
        <textarea id="summernote" name="article" class="form-control ">{!!$product['article']!!}</textarea>
        <span class="text-danger"> {{$errors->first('article')}}</span>
    </div>
    <div class="form-group  col-md-6">
        <label for="exampleInputCatagorie ">choose Catagorie</label>
        <select name="categorie_id" id="exampleInputCatagorie1" class="form-control">

            <option value="" disabled="disabled">... chose your catagory</option>
            @foreach($catagories as
            $catagory)
            <option @if($catagory['id']==$product['categorie_id']) selected="selected" @endif value={{$catagory['id']}}>
                {{$catagory['title']}}
            </option>
            @endforeach
        </select>
        <span class="text-danger"> {{$errors->first('catagorie_id')}}</span>

    </div>

    <div class="form-group  col-md-6">
        <label for="exampleInputPrice1 ">Price</label>
        <input type="number" class="form-control link-target" id="exampleInputPrice1" name="price"
            value={{$product['price']}}> <span class="text-danger"> {{$errors->first('price')}}</span>

    </div>
    <div class="form-group  col-md-6">
        <label for="exampleInputUrl1 ">Url</label>
        <input type="text" class="form-control link-target" id="exampleInputUrl1" name="url" value={{$product
        ['url']}}>
        <span class="text-danger"> {{$errors->first('url')}}</span>

    </div>
    <div class="input-group col-md-6">
        <div class="input-group mb-3">
            <div class="custom-file"> <label class="custom-file-label"
                    for="inputGroupFile02">{{$product['img']}}</label>
                <input type="file" class="custom-file-input" id="inputGroupFile02" name='img'>

                <span class=" text-danger"> {{$errors->first('img')}}</span>
            </div>
        </div>

    </div>
    <div class='form-group  col-md-6'>
        <a href={{url('cms/products')}} class="btn btn-secondary ">back to Products</a><button
            class="btn btn-primary m-2">Edit
            Product</button>
    </div>
</form>
</div>
</div>






@endsection