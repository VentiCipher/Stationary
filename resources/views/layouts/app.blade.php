<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <!--Extends Styles -->
    {{--    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">--}}
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/price-range.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">

    <style type="text/css">
        #freecssfooter {
            display: block;
            width: 100%;
            padding: 120px 0 20px;
            overflow: hidden;
            background-color: transparent;
            z-index: 5000;
            text-align: center;
        }

        #freecssfooter div#fcssholder div {
            display: none;
        }

        #freecssfooter div#fcssholder div:first-child {
            display: block;
        }

        #freecssfooter div#fcssholder div:first-child a {
            float: none;
            margin: 0 auto;
        }
    </style>
    <script async="" src="//www.google-analytics.com/analytics.js"></script>
    <script type="text/javascript" async="" src="//s3.buysellads.com/ac/bsa.js"></script>
    <script type="text/javascript" id="_bsap_js_b893e54e42ad5b76e7b252f59be18e67"
            src="//s3.buysellads.com/r/s_b893e54e42ad5b76e7b252f59be18e67.js?v=1524067200000" async="async"></script>
    <script type="text/javascript" src="//s3.buysellads.com/ac/pro.js" id="_bsap_premium_pro"></script>
    <script type="text/javascript" id="_bsaPRO_js"
            src="//srv.buysellads.com/ads/get/ids/CV7DP2T;CV7DPKY/?r=1524067200000" async="async"></script>

    <!--Extends Styles -->

    <style>


        .centerdrop {
            text-align: center;
        }

        .navbar-nopadding {
            padding: 0px;
            min-height: 0px;
        }

        .navbar-header {
            float: left;
            text-align: center;
            width: 100%;
        }

        .navbar-brand {
            float: none;
            color: white;
        }

        .navbar-right {
            float: right;
        }

        .buttonbar {
            font-size: 23px;
            /*
                    margin-top: 6px;
                    margin-bottom: 12px;
                    margin-left: 15px;
                    margin-right: 15px;*/
            padding-left: 20px;
            padding-right: 20px;
            text-align: center;
            color: black;
        }

        .dropdown:hover .dropbtn {
            color: grey;
        }

        .btnholder:hover {
            color: grey;
        }

        .newbgnav {
            /*background-image: url(../images/bg.png);*/
            background-color: #ffe381;
            width: 100%;
        }

        .renewheader-bottom {
            padding-top: 30px;
            padding-bottom: 15px;
        }

        .navigator {
            /*margin-right: 8%;*/
        }

        .tooltip {
            position: relative;
            display: contents;
            border-bottom: 1px dotted black; /* If you want dots under the hoverable text */
        }

        /* Tooltip text */
        .tooltip .tooltiptext {
            visibility: hidden;
            width: 120px;
            background-color: black;
            color: #fff;
            text-align: center;
            padding: 5px 0;
            border-radius: 6px;
            margin-top: 8px;
            /* Position the tooltip text - see examples below! */
            position: absolute;
            z-index: 1;
        }

        /* Show the tooltip text when you mouse over the tooltip container */
        .tooltip:hover .tooltiptext {
            visibility: visible;
        }

        .contactinfo ul li:first-child {
            margin-left: 0px;
        }

        ul.sub-menu {
            position: absolute;
            top: 30px;
            left: 0;
            background: rgba(0, 0, 0, 0.9);
            list-style: none;
            padding: 0;
            margin: 0;
            width: 290px;
            -webkit-box-shadow: 0 3px 3px rgba(0, 0, 0, 0.1);
            box-shadow: 0 3px 3px rgba(0, 0, 0, 0.1);
            /* display: none; */
            z-index: 999;
        }

        .btn.btn-primary {
            background: #FE980F;
            border: 0 none;
            border-radius: 0;
            margin-top: 0px;
        }

        .stylish-input-group .input-group-addon {
            background: white !important;
        }

        .stylish-input-group .form-control {
            border-right: 0;
            box-shadow: 0 0 0;
            border-color: #ccc;
        }

        .stylish-input-group button {
            border: 0;
            background: transparent;
        }
    </style>
</head>

<body style="background-color: white;">
<div id="app">
    <nav class=" navbar-expand-md navbar-light navbar-laravel navbar-fixed-top .navbar-nopadding">
        {{--<div class="bg"></div>--}}
        <section id="header">
            <div class="newbgnav">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="contactinfo">

                                <ul class="nav nav-pills" style="    padding-top: 1%;">
                                    <li><a href="tel:+6625644412"><i class="fa fa-phone"></i>
                                            +66
                                            2 564 4441-79</a></li>
                                    <li style="padding-left:20px;"><a
                                                href="mailto:trythis.stationary@gmail.com?Subject=FAQ. to Admin"><i
                                                    class="fa fa-envelope"></i>
                                            trythis.stationary@gmail.com</a></li>
                                </ul>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="social-icons pull-right">
                                <ul class="nav navbar-nav" style="    display: inline-block;">
                                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=trythis-stationary.com"
                                           target="_blank"><i
                                                    class="fa fa-facebook"></i></a>
                                    </li>
                                    <li><a href="https://twitter.com/intent/tweet?url=trythis-stationary.com"
                                           target="_blank"><i
                                                    class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i
                                                    class="fa fa-linkedin"></i></a>
                                    </li>
                                    <li><a href="#"><i
                                                    class="fa fa-dribbble"></i></a>
                                    </li>
                                    <li><a href="#"><i
                                                    class="fa fa-google-plus"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-middle">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="logo pull-left">
                                <a href="{{url('/')}}">
                                    <img src="{{url('/images/logo.png')}}" style="width: 150%;margin-left: -100px;">
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="shop-menu pull-right" style="margin-top: 2%;">
                                <ul class="nav navbar-nav" style="display:inline-block;">

                                    @if(Auth::check())
                                        <li><a href="{{route('wishlist.index')}}"
                                               class="{{isActiveRoute('wishlist.index')}}"><i class="fa fa-star "></i>
                                                Wishlist
                                                ({{ \App\Wishlist::select('products_id')->where('users_id',Auth::user()->id)->count()}}
                                                )</a></li>
                                    @else
                                        <li><a href="{{route('login')}}" class="{{isActiveRoute('login')}}"><i
                                                        class="fa fa-star "></i>
                                                Wishlist</a></li>
                                    @endif

                                    <li><a href={{route('orderreview.index')}}><i class="	fa fa-edit"></i>
                                            Checkout</a></li>
                                    @if(Auth::check())
                                        <li><a href="{{route('cart.index')}}" class="{{isActiveRoute('login')}}"><i
                                                        class="fa fa-shopping-cart"></i> Cart
                                                ({{ \App\Cart::select('products_id')->where('users_id',Auth::user()->id)->count()}}
                                                )</a></li>
                                    @else
                                        <li><a href="{{route('login')}}"><i class="fa fa-shopping-cart"></i> Cart</a>
                                        </li>
                                    @endif
                                    @guest
                                        <li><a href="{{ route('login') }}"><i class=" fa fa-lock"></i> Login</a></li>
                                        <li><a href="{{ route('register') }}"><i class="fa fa-check-square-o"></i>
                                                Register</a>
                                        </li>
                                    @endguest
                                    @if(Auth::check())
                                        {{--<li><a href="#"><i class="fa fa-user"></i>--}}
                                        {{--</a></li>--}}
                                        <li>
                                            {{--<a id="navbarDropdown" class="dropdown-item dropdown" href="#" role="button"--}}
                                            {{--data-toggle="dropdown"--}}
                                            {{--aria-haspopup="true" aria-expanded="false" v-pre>--}}
                                            <a href="{{route('user.acc.edit',['id'=>Auth::user()->id])}}">
                                                <i class="fa fa-user-circle "> </i>
                                                My {{Auth::user()->roles}} Account
                                                <!-- <span class="caret"></span> -->
                                            </a>

                                        </li>

                                        <div class="dropdown-menu hidden" aria-labelledby="navbarDropdown"
                                             style="    left: -125%; top: 128%;">
                                            <div>
                                                <label class="dropdown-item"
                                                       style="background-color: #FE980F; padding-bottom:10px ">Welcome
                                                    {{Auth::user()->name}}</label>
                                            </div>
                                            <div style="padding-left: 15%;">
                                                <a class="dropdown-item"
                                                   href="#"><i
                                                            class="fa fa-id-badge"> </i>&nbsp;&nbsp;My Profile</a>
                                                <a class="dropdown-item"
                                                   href="mailto:trythis.stationary@gmail.com?Subject=FAQ. to Admin"
                                                   target="_top"><i
                                                            class="fa fa-question-circle-o"> </i>&nbsp;&nbsp;Support</a>

                                                <a class="dropdown-item" href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    {{ __('Logout') }}
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                      style="display: none;">
                                                    @csrf
                                                </form>

                                            </div>
                                        </div>

                                    @endif
                                    @if(Auth::check())
                                        <li><a class="#" href="{{ route('logout') }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                <i class="fa fa-lock"></i> {{ __('Logout') }}
                                            </a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                  style="display: none;">
                                                @csrf
                                            </form>
                                        </li>
                                    @endif

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="renewheader-bottom">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-9">
                            <div class="navbar-header">
                                {{--<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button>--}}
                                <button class="pull-left navbar-toggler navbar-toggler-right" type="button"
                                        data-toggle="collapse"
                                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                        aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon"></span>
                                </button>

                            </div>
                            {{--Main Menu left--}}
                            <div class="mainmenu pull-left">
                                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                    <ul class="nav navbar-nav mr-auto " style="height: auto;">
                                        <li><a href="{{route('home')}}" class="{{isActiveRoute('home')}}"><i
                                                        class="fa fa-home"></i> Home</a>
                                        </li>


                                        <li class="dropdown"><a href="#"><i
                                                        class="fa fa-crosshairs">
                                                </i>Track Order<i
                                                        class="fa fa-angle-down"></i></a>
                                            <ul role="menu" class="sub-menu extendtop45">

                                                <li>
                                                    <form method="POST" action="{{ route('invoice.show.search') }}"
                                                          enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="text" name="searcher"
                                                               placeholder="Order ID ...">
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="fa fa-search"></i>
                                                        </button>
                                                    </form>
                                                </li>
                                            </ul>
                                        </li>


                                        @if(Auth::check())
                                            <li><a href="{{route('showindexorder')}}"><i class="fa fa-dropbox"></i> My
                                                    order</a>
                                            </li>
                                            @if(Auth::user()->roles == 'user')
                                                @if(Auth::user()->dealer_approve == 0)
                                                    <li><a href="{{route('dealerapply')}}"><i class="fa fa-barcode"></i>
                                                            &nbsp;Apply Dealer</a>
                                                    </li>
                                                @endif
                                            @endif






                                            @if(Auth::user()->roles == 'admin')
                                                <li class="dropdown"><a class="{{isActiveRoute('dashboardindex')}}"
                                                                        href="{{ route('dashboardindex') }}"> <i
                                                                class="fa fa-dashboard"> </i> Administrator Dashboard<i
                                                                class="fa fa-angle-down"></i></a>
                                                    <ul role="menu" class="sub-menu">
                                                        {{--<li><a class="dropdown-item {{ isActiveRoute('dashboardindex') }}">Dashboard</a>--}}
                                                        {{--</li>--}}

                                                        <li><a class="dropdown-item {{ isActiveRoute('promo.index') }} "
                                                               href="{{route('promo.index')}}">Coupon Management</a>
                                                        </li>
                                                        <li><a class="dropdown-item {{ isActiveRoute('promo.index') }} "
                                                               href="{{route('promo.allindex')}}">All Coupon List</a>
                                                        </li>

                                                        <li><a class="dropdown-item {{ isActiveRoute('cat.edit') }} ">⚫Categories
                                                                Management</a></li>
                                                        <li><a class="dropdown-item {{ isActiveRoute('addcat') }} "
                                                               href="{{route('addcat')}}">Add
                                                                Categories</a></li>
                                                        <li><a class="dropdown-item {{ isActiveRoute('indexcat') }} "
                                                               href="{{route('indexcat')}}">Edit/View
                                                                Categories</a></li>

                                                        <li><a class="dropdown-item {{ isActiveRoute('acc.edit') }} ">⚫Users
                                                                Management</a></li>
                                                        <li>
                                                            <a class="dropdown-item {{ isActiveRoute('acc.show.add') }} "
                                                               href="{{route('acc.show.add')}}">Add Users</a></li>
                                                        <li><a class="dropdown-item {{ isActiveRoute('acc.index') }} "
                                                               href="{{route('acc.index')}}">View
                                                                All Users</a></li>

                                                        <li>
                                                            <a class="dropdown-item {{ isActiveRoute('acc.show.manage') }} "
                                                               href="{{route('acc.show.manage')}}">Dealers
                                                                Management</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item {{ isActiveRoute('acc.show.approve') }} "
                                                               href="{{route('acc.show.approve')}}">Pending Dealers
                                                                Approval</a></li>

                                                        <li><a class="dropdown-item {{ isActiveRoute('acc.edit') }} ">⚫Product
                                                                Dealers Management</a></li>
                                                        <li>
                                                            <a class="dropdown-item {{ isActiveRoute('prod.all.index') }} "
                                                               href="{{route('prod.all.index')}}">View
                                                                All Product</a></li>
                                                        <li>
                                                            <form method="POST"
                                                                  action="{{ route('admin.prod.show.search') }}"
                                                                  enctype="multipart/form-data">
                                                                @csrf

                                                                <input type="text" name="searcher"
                                                                       placeholder="Search all Product ...">
                                                                <button type="submit" class="btn btn-primary">
                                                                    <i class="fa fa-search"></i>
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </li>
                                            @endif
                                            @if(Auth::user()->roles == 'admin' || Auth::user()->roles ==
                                                                                'seller')
                                                <li class="dropdown"><a href="{{ route('sellerpanel') }}"
                                                                        class="{{ isActiveRoute('sellerpanel') }}"><i
                                                                class="fa fa-cubes">
                                                        </i> Dealer Controller<i
                                                                class="fa fa-angle-down"></i></a>
                                                    <ul role="menu" class="sub-menu extendtop45">
                                                        <li>
                                                            <a class="dropdown-item {{ isActiveRoute('prod.image.index') }} {{ isActiveRoute('prod.show.search') }} ">⚫Product
                                                                Management</a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item {{ isActiveRoute('prod.show.add') }} "
                                                               href="{{route('prod.show.add')}}">Add
                                                                Product</a></li>
                                                        <li><a class="dropdown-item {{ isActiveRoute('prod.index') }} "
                                                               href="{{route('prod.index')}}">Overview
                                                                Product</a></li>
                                                        <li>
                                                        <li><a class="dropdown-item {{ isActiveRoute('promo.index') }} "
                                                               href="{{route('promo.index')}}">Coupon Management</a>
                                                        </li>
                                                        <li>
                                                            <form method="POST" action="{{ route('prod.show.search') }}"
                                                                  enctype="multipart/form-data">
                                                                @csrf
                                                                <input type="text" name="searcher"
                                                                       placeholder="Search my Product ...">
                                                                <button type="submit" class="btn btn-primary">
                                                                    <i class="fa fa-search"></i>
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </li>
                                            @endif

                                            {{--<li class="dropdown"><a href="javascript:void(0)">Blog<i--}}
                                            {{--class="fa fa-angle-down"></i></a>--}}
                                            {{--<ul role="menu" class="sub-menu">--}}
                                            {{--<li><a href="pages/blog.php">Blog List</a></li>--}}
                                            {{--<li><a href="pages/blog-single.php">Blog Single</a></li>--}}
                                            {{--</ul>--}}
                                            {{--</li>--}}
                                            {{--<li><a href="pages/404.php">404</a></li>--}}
                                            {{--<li><a href="pages/contact-us.php">Contact</a></li>--}}
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="search_box pull-right" style="margin-top: -3%; width:100%;">

                                <form method="POST"
                                      action="{{ route('user.show.search') }}"
                                      enctype="multipart/form-data">
                                    @csrf

                                    <input name="searcher" type="text" placeholder="Search product" style="width: 80%;">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-search"></i>
                                    </button>


                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <section id="flowbar">
            <div class="container">
                @if (session('status'))
                    <div class="alert alert-info">
                        {{ session('status') }}
                    </div>
                @endif
                    @if (session('coupon'))
                        <div class="alert alert-primary">
                            {{ session('coupon') }}
                        </div>
                    @endif
                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                @if (session('warning'))
                    <div class="alert alert-warning">
                        {{ session('warning') }}
                    </div>
                @endif
                @if (Auth::check() && Auth::user()->dealer_approve==1 && Auth::user()->roles =="user")
                    <div class="alert alert-warning">
                        Pending Dealer Approval<br>If Successful your dealer panel could access<br>If unsuccessful
                        please contact administrator for more information<br>
                    </div>
                @endif
                @if(Auth::check() && Auth::user()->roles == "admin")
                    @if($data =="1")
                        <div class="alert alert-warning">
                            Pending Dealer Approval Awaiting Please <a href="{{route('acc.show.approve')}}">Check
                                out</a><br>
                        </div>
                    @endif @endif
            </div>
        </section>
        @if (\Route::current()->getName() == 'home' ||\Route::current()->getName() == 'index')
            <section id="slider">
                <div id="featured" class="carousel slide" data-ride="carousel">

                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li data-target="featured#1" data-slide-to="0" class="active"></li>
                        <li data-target="featured#2" data-slide-to="1"></li>
                        <li data-target="featured#3" data-slide-to="2"></li>
                    </ul>

                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="{{url('/images/3.png')}}" style="width:100%;">
                        </div>
                        <div class="carousel-item">
                            <img src="{{url('/images/4.png')}}" style="width:100%;">
                        </div>
                        <div class="carousel-item">
                            <img src="{{url('/images/5.png')}}" style="width:100%;">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#featured" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#featured" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>

                </div>
            </section>


        @endif
        <div class="container" style="padding-top:35px;">
            <div class="row">


                @if (\Route::current()->getName() == 'home' ||\Route::current()->getName() == 'index'||\Route::current()->getPrefix() == '/users' )
                    <div class="col-sm-3">
                        <div class="left-sidebar">
                            <h2>Category</h2>
                            <div class="panel-group category-products" id="accordian">
                                {{--<div class="panel panel-default">--}}
                                {{--<div class="panel-heading">--}}
                                {{--<h4 class="panel-title"><a data-toggle="collapse" data-parent="#accordian"--}}
                                {{--href="#sportswear"><span class="badge pull-right"><i--}}
                                {{--class="fa fa-plus"></i></span> Sportswear</a></h4>--}}
                                {{--</div>--}}
                                {{--<div id="sportswear" class="panel-collapse collapse">--}}
                                {{--<div class="panel-body">--}}
                                {{--<ul>--}}
                                {{--<li><a href="#">Nike</a></li>--}}
                                {{--<li><a href="#">Under Armour</a></li>--}}
                                {{--<li><a href="#">Adidas</a></li>--}}
                                {{--<li><a href="#">Puma</a></li>--}}
                                {{--<li><a href="#">ASICS</a></li>--}}
                                {{--</ul>--}}
                                {{--</div>--}}
                                {{--</div>--}}
                                {{--</div>--}}

                                @foreach($data['myvar'] as $cat)
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title"><a
                                                        href="{{route('user.show.cat',['id'=>$cat->id])}}">{{$cat->name}}
                                                    ({{$cat->products->count()}})</a></h4>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <div class="brands_products">
                                <h2>Brands</h2>
                                <div class="brands-name">
                                    <ul class="nav nav-pills nav-stacked">
                                        @foreach($data['user'] as $usr)
                                            <li><a href="{{route('user.show.deal',['id'=>$usr->id])}}"><span
                                                            class="pull-right">({{$usr->products->count()}}
                                                        )</span>{{$usr->shopname}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <br>
                            @if(Auth::Check())
                                <div class="brands_products">
                                    <h2><strike>สับตะไคร้</strike>&nbsp;Subscribe</h2>
                                    <div class="brands-name" style="text-align: center;">

                                        @if(is_null(Auth::user()->subscribes))
                                            <a href="{{route("subscriberegis")}}" class="btn btn-primary">Subscribe
                                                me!</a>
                                        @else
                                            <a href="{{route("subscriberegis")}}" class="btn btn-primary"
                                               onclick="return confirm('Are you sure to unsubscribe? you will miss our news')">Unsubscribe...</a>
                                        @endif

                                    </div>
                                </div>
                            @endif
                            @guest
                                <div class="brands_products" style="padding-top:20%;">
                                    <a href="{{route('showsub')}}"><h2>Subscribe Now</h2></a>

                                </div>
                            @endguest
                            {{--<div class="price-range">--}}
                            {{--<h2>Price Range</h2>--}}
                            {{--<div class="well text-center">--}}
                            {{--<div class="slider slider-horizontal" style="width: 163px;">--}}
                            {{--<div class="slider-track">--}}
                            {{--<div class="slider-selection" style="left: 41.6667%; width: 33.3333%;"></div>--}}
                            {{--<div class="slider-handle round left-round" style="left: 41.6667%;"></div>--}}
                            {{--<div class="slider-handle round" style="left: 75%;"></div>--}}
                            {{--</div>--}}
                            {{--<div class="tooltip top" style="top: -30px; left: 62.5833px;">--}}
                            {{--<div class="tooltip-arrow"></div>--}}
                            {{--<div class="tooltip-inner">250 : 450</div>--}}
                            {{--</div>--}}
                            {{--<input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600"--}}
                            {{--data-slider-step="5" data-slider-value="[250,450]" id="sl2" style=""></div>--}}
                            {{--<br>--}}
                            {{--<b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b></div>--}}
                            {{--</div>--}}
                            {{--<div class="shipping text-center"><img src="assets/images/home/shipping.jpg" alt="website template image">--}}
                            {{--</div>--}}
                        </div>
                    </div>
                @endif
                @if (\Route::current()->getName() == 'home' ||\Route::current()->getName() == 'index' || \Route::current()->getPrefix() == '/users'  )
                    <div class="col-sm-9 padding-right">
                        {{--<main class="py-4">--}}
                        @yield('content')
                        {{--</main>--}}

                    </div>

                @else
                    <div class="col-sm-12 padding-right">
                        {{--<main class="py-4">--}}
                        @yield('content')
                        {{--</main>--}}

                    </div>
                @endif
            </div>
        </div>
    </nav>

</div>

<div class="footer footer-widget" style="background-color: #F0F0E9;">
    <div class="container">
        <div class="row">
            {{--<div class="col-sm-2">--}}
            {{--<div class="single-widget">--}}
            {{--<h2>Service</h2>--}}

            {{--<ul class="">--}}
            {{--<li><a href="#">Online Help</a></li>--}}
            {{--<li><a href="#">Contact Us</a></li>--}}
            {{--<li><a href="#">Order Status</a></li>--}}
            {{--<li><a href="#">FAQ’s</a></li>--}}
            {{--</ul>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-sm-2">--}}
            {{--<div class="single-widget">--}}
            {{--<h2>Quock Shop</h2>--}}
            {{--<ul class="">--}}
            {{--<li><a href="#">T-Shirt</a></li>--}}
            {{--<li><a href="#">Mens</a></li>--}}
            {{--<li><a href="#">Womens</a></li>--}}
            {{--<li><a href="#">Gift Cards</a></li>--}}
            {{--<li><a href="#">Shoes</a></li>--}}
            {{--</ul>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-sm-2">--}}
            {{--<div class="single-widget">--}}
            {{--<h2>Policies</h2>--}}
            {{--<ul class="">--}}
            {{--<li><a href="#">Terms of Use</a></li>--}}
            {{--<li><a href="#">Privecy Policy</a></li>--}}
            {{--<li><a href="#">Refund Policy</a></li>--}}
            {{--<li><a href="#">Billing System</a></li>--}}
            {{--<li><a href="#">Ticket System</a></li>--}}
            {{--</ul>--}}
            {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-sm-2">--}}
            {{--<div class="single-widget">--}}
            {{--<h2>About Shopper</h2>--}}
            {{--<ul class="">--}}
            {{--<li><a href="#">Company Information</a></li>--}}
            {{--<li><a href="#">Careers</a></li>--}}
            {{--<li><a href="#">Store Location</a></li>--}}
            {{--<li><a href="#">Affillate Program</a></li>--}}
            {{--<li><a href="#">Copyright</a></li>--}}
            {{--</ul>--}}
            {{--</div>--}}
            {{--</div>--}}
            <div class="col-md-12">
                <div class="single-widget" style="text-align: center;">
                    <h2>Subscribe</h2>
                    <form class="searchform" method="POST" action="{{ route('upsub') }}">
                        {{ csrf_field() }}
                        <div class="row" style="text-align: center;    display: -webkit-inline-box; ">


                            <input id="email" type="email" class="form-control" name="email"
                                   placeholder="Your email address">
                            <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i>
                            </button>
                        </div>
                        <p>Get the most recent updates from<br>
                            our site and be updated your self...</p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
<script src="{{ asset('js/jquery.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
<script src="{{ asset('js/price-range.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

</body>
</html>