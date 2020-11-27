@extends('master')
@section('main_content')
<div class="container">
    @foreach($contents as $item)
    <div class="row
    ">
        <div class="col-md-12">
            <h3 class="display-4">{{$item->ctitle}}</h3>
            <p>{!!$item->article!!}</p>
        </div>
    </div>
    @endforeach
</div>
@endsection
