@extends('cms.master')
@section('content')
<div class='container'>
    <div class='row'>
        <div>
            <h1 class='display-4'>Menus</h1>
            <p>here you can see all avilable menus</p>
            <a href={{url('cms/menus/create')}} class="btn btn-primary mb-2">Add Menu</a>
        </div>
    </div>
    <div class='row'>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>title</th>
                        <th>link</th>
                        <th>url</th>
                        <th>operation</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($menus as $item)
                    <tr>
                        <td>{{$item['title']}}</td>
                        <td>{{$item['link']}}</td>
                        <td>{{$item['url']}}</td>
                        <td><a href={{url('cms/menus/'.$item['id'].'/edit')}}>Edit</a> | <a
                                href={{url('cms/menus/'.$item['id'])}}>Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>







    @endsection
