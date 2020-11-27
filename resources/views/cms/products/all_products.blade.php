@extends('cms.master')
@section('content')
<div class='container'>
    <div class='row'>
        <div>
            <h1 class='display-4'>Products</h1>
            <p>here you can see all avilable Products </p>
            <a href={{url('cms/products/create')}} class="btn btn-primary mb-2">Add Product</a>
        </div>
    </div>
    <div class='row'>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>title</th>
                        <th>catagorie</th>
                        <th>article</th>
                        <th>url</th>
                        <th>image</th>
                        <th>price</th>
                        <th>operation</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $item)

                    <tr>
                        <td>{{$item['title']}}</td>
                        @foreach($catagories as $catagory)
                        @if($catagory['id']==$item['categorie_id'])
                        <td>{{$catagory['title']}}</td>
                        @endif
                        @endforeach
                        <td>{!!$item['article']!!}</td>
                        <td>{{$item['url']}}</td>
                        <td><img src={{asset('images/'.$item['img'])}} alt="" width='70px'>
                        </td>
                        <td>{{$item['price']}}$</td>
                        <td><a href={{url('cms/products/'.$item['id'].'/edit')}}>Edit</a> | <a
                                href={{url('cms/products/'.$item['id'])}}>Delete</a>
                        </td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>







    @endsection
















































































































    
tion