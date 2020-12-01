<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


    <link rel="stylesheet" type="text/css" href={{asset('css/main.css')}}>
    <script>
    var BASE_URl = "{{url('')}}";
    </script>
</head>

<body>
    <header>
        <nav class=" navbar navbar-expand-lg navbar-dark bg-primary">
            <div class="container"><a class="navbar-brand" href={{url('')}}>
                    ICAR <i class="fas fa-car "></i>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href={{url('')}}>Home<span class="sr-only">(current)</span></a>
                        </li>@foreach($menus as $item)
                        <li class="nav-item">
                            <a class="nav-link" href={{url($item['url'])}}>{{$item['link']}}</a>
                        </li>
                        @endforeach
                        <li class="nav-item">
                            <a class="nav-link" href={{url('shop')}}>Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href={{url('shop/checkout')}}><i class="fa fa-shopping-cart fa-3"
                                    aria-hidden="true">

                                </i>
                                @if(!Cart::isEmpty())
                                <span class="badge badge-pill text-white mr-3">{{Cart::getTotalQuantity()}}</span>
                                @endif
                            </a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ml-auto">
                        @if(!Session::get('user_id'))
                        <li class="nav-item active">
                            <a class="nav-link" href={{url('user/signin')}}>Sign In <span
                                    class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href={{url('user/signup')}}>Sign Up</a>
                        </li>

                        @elseif(Session::get('user_id'))
                        <li class="nav-item">
                            <a class="nav-link" href={{url('user/logout')}}>Log out</a>


                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href={{url('user/profile')}}>{{Session::get('user_name')}}</a>


                        </li> @if(Session::get('is_admin'))
                        <li class="nav-item">
                            <a class="nav-link" href={{url('cms/dashborad')}}>CMS DASHBORAD</a>

                        </li>
                        @endif


                        @endif

                    </ul>
                    <div class="form-inline my-2 my-lg-0 ui-widget">
                        <input class="form-control mr-sm-2 search-input " type="search" id="automplete-1"
                            placeholder="Search Product">


                        <button class="btn btn-outline-secondary my-2 my-sm-0 searchbtn">Search</button>
                    </div>
                </div>
            </div>

        </nav>
    </header>
    <main class="main">
        @if(Session::has("sm"))
        <div class="container mt-3 sm-box">
            <div class=row>
                <div class="col-md-12 alert alert-success">
                    {{Session::get('sm')}} </div>
            </div>
        </div>
        @endif
        @if ($errors->any())
        <div class="container ">
            <div class="row sm-box">

                <div class="col-md-12 mt-2">
                    <div class="alert alert-warning">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>@endif
        </div>
        @yield('main_content')
    </main>
    <footer>
        <div class=" container-fluid">
            <div class="row bg-primary">
                <div class="col-12 ">
                    <p class=" text-center text-white  p-2 line-height-40 p-sizem">
                        ICAR <i class="fas fa-car "></i> &copy; {{date("Y")}} </p>
                </div>
            </div>
        </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
        integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
    <script src="https://kit.fontawesome.com/2c77193513.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

    <script src={{asset("js/app.js")}}></script>


</body>











</html>
