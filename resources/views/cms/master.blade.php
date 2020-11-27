<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href={{asset('css/dashborad.css')}}>
    <link rel="stylesheet" type="text/css" href={{asset('css/main.css')}}>
    <script>
    var BASE_URl = "{{url('')}}";
    </script>
</head>

<body>
    <header>

        <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Company name</a>
            <button class="navbar-toggler position-absolute d-md-none" type="button" data-toggle="collapse"
                data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="true"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <ul class="navbar-nav px-3 ml-auto-md mr-auto-xs">
                <div class="row">
                    <li class="nav-item text-nowrap m-2">
                        <a class="nav-link" target="blank" href={{url('')}}>Back to site</a>
                    </li>
                    <li class="nav-item text-nowrap m-2">
                        <a class="nav-link" href={{url('user/logout')}}>Logout</a>
                    </li>

                </div>
            </ul>
        </nav>
    </header>
    <div class=" container-fluid">
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="sidebar-sticky pt-3">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href={{url('cms/dashborad')}}>

                                Dashboard <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href={{url('cms/menus')}}>

                                Menus
                            </a>
                        <li class="nav-item">
                            <a class="nav-link" href={{url('cms/contents')}}>

                                Contents
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href={{url('cms/catagories')}}>

                                Catagories
                            </a>
                        <li class="nav-item">
                            <a class="nav-link" href={{url('cms/orders')}}>

                                Orders
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href={{url('cms/products')}}>

                                Products
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href={{url('cms/admin/users')}}>
                                Users
                            </a>
                    </ul>

                    <h6
                        class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                        <span>Saved reports</span>
                        <a class="d-flex align-items-center text-muted" href="#" aria-label="Add a new report">
                            <span data-feather="plus-circle"></span>
                        </a>
                    </h6>

                </div>
            </nav>

            <main role="main" class="main col-md-9 ml-sm-auto col-lg-10 px-md-4">
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
                    <div
                        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                        @if(str_replace('ICAR |','',$title)=='Dashborad')<h1 class="h2">
                            {{str_replace('ICAR |','',$title)}}
                        </h1>)@endif
                        <div class="btn-toolbar mb-2 mb-md-0">
                            <div class="btn-group mr-2">
                                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
                            </div>
                            <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
                                <span data-feather="calendar"></span>
                                This week
                            </button>
                        </div>

                    </div>
                    @yield('content')


            </main>
        </div>
    </div>

    <footer>
        <div class=" container-fluid">
            <div class="row bg-dark">
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
    <script src="https://kit.fontawesome.com/2c77193513.js" crossorigin="anonymous"></script>

    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>



    <script src={{asset("js/app.js")}}></script>



</body>

















</html>