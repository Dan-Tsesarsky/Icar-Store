@extends('cms.master')
@section('content')


<div class='container'>
    <div class='row'>
        <div>
            <h1 class='display-4'>Contents</h1>
            <p>here you can see all avilable Contents</p>
            <a href={{url('cms/contents/create')}} class="btn btn-primary mb-2">Add Content</a>
        </div>
    </div>
    <div class='row'>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th class="text-center">title</th>
                        <th class="text-center">article</th>
                        <th class="text-center">update at</th>
                        <th class="text-center">operation</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contents as $item)
                    <tr>
                        <td>{{$item['ctitle']}}</td>
                        <td>{!!$item['article']!!}</td>



                        <td>{{date('Y-m-d h:i:s', strtotime($item['updated_at']))}}</td>
                        <td><a href={{url('cms/contents/'.$item['id'].'/edit')}}>Edit</a> | <a
                                href={{url('cms/contents/'.$item['id'])}}>Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>







    @endsection
