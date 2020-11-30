@extends('cms.master')
@section('content')
<div class='container'>
    <div class='row'>
        <div>
            <h1 class='display-4'>Orders</h1>
            <p>here you can see all avilable Orders </p>

        </div>
    </div>
    <div class='row'>
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th>user</th>
                        <th>information</th>
                        <th>total</th>
                        <th>created_at</th>
                        <th>updated_at</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        @foreach($orders as $item)
                        <td>{{$item->name}}</td>
                        <td>
                            @foreach(unserialize($item->data) as $data)

                            <p>name:{{$data['name']}}<br> Quantity<b>:{{$data['quantity']}}</b>
                                Price<b>:{{$data['price']}}$</b>
                            </p>


                            @endforeach
                        </td>
                        <td>{{$item->total}}$</td>
                        <td>{{$item->created_at}}</td>
                        <td>{{$item->updated_at}}</td>


                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endsection



























































































































































    tion
