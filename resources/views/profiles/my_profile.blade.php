@extends('master')
@section('main_content')
@if(Session::has('user_id')&&!Session::has('profile_id'))
<div class="container">
    <div class="row">
        <div class="card col-md-6 col-lg-4  mt-3">

            @if($profile['img'])
            <img class=" card-img-top" src={{asset('images/2020.12.07.08.24.09-profile_picture.jpg')}} alt="
            user profile
            picture" alt=" Card image cap">
            @elseif(!$profile['img']) <img class=" card-img-top"
                src={{asset('images/user-image-with-black-background.png')}} alt=" user profile
picture" alt=" Card image cap">
            @endif
            <div class="card-body">
                <h5 class="card-title"> hello {{$user['name']}}</h5>
                <p class="card-text">this is your user profile </p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    {{$user['email']}}
                </li>

                <li class="list-group-item"><a href={{url('/user/profile/'.$user['id'].'/edit')}} class="card-link">Edit
                        profile</a>
                </li>
            </ul>
        </div>
    </div>
</div>
@endif

@endsection