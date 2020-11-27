@extends('cms.master')
@section('content')
<div class="container">
    <p>are you sure you want to delete this content ? </p><br>
    <form action={{url('cms/contents/'.$id)}} class='form-row' method="POST">

        {{csrf_field()}}
        {{ method_field('DELETE')}}
        <a href={{url('cms/contents')}} class="btn btn-secondary mr-2">back to content</a>
        <button class="btn btn-danger">delete content</button>

    </form>
</div>
@endsection
