@extends('cms.master')
@section('content')
<div class='container'>
    <div class='row'>
        <div>
            <h1 class='display-4'>Catagories</h1>
            <p>here you can see all avilable Catagories </p>
            <a href={{url('cms/catagories/create')}} class="btn btn-primary mb-2">Add Catagories</a>
        </div>
    </div>
    <div class='row'>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>title</th>
                        <th>article</th>
                        <th>url</th>
                        <th>image</th>
                        <th>operation</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($catagories as $item)
                    <tr>
                        <td>{{$item['title']}}</td>
                        <td>{!!$item['article']!!}</td>
                        <td>{{$item['url']}}</td>
                        <td><img src={{asset('images/'.$item['img'])}} alt="" width='70px'></td>
                        <td><a href={{url('cms/catagories/'.$item['id'].'/edit')}}>Edit</a> | <a
                                href={{url('cms/catagories/'.$item['id'])}}>Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection










































    tion