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
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('js/price-range.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
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
    </style>
</head>

<main style="background-color: white;">
    <div id="app">
        <nav class=" navbar-expand-md navbar-light navbar-laravel navbar-fixed-top .navbar-nopadding">
            {{--<div class="bg"></div>--}}
            <div class="newbgnav">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="contactinfo">

                                <ul class="nav nav-pills" style="    padding-top: 1%;">
                                    <li><a href="tel:+6625644412"><i class="fa fa-phone"></i>
                                            +66
                                            2 564 4441-79</a></li>
                                    <li style="padding-left:20px;"><a  href="mailto:trythis.stationary@gmail.com?Subject=FAQ. to Admin"><i
                                                    class="fa fa-envelope"></i>
                                            trythis.stationary@gmail.com</a></li>
                                </ul>

                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="social-icons pull-right">
                                <ul class="nav navbar-nav" style="    display: inline-block;">
                                    <li><a  href="https://www.facebook.com/sharer/sharer.php?u=trythis-stationary.com" target="_blank"><i
                                                    class="fa fa-facebook"></i></a>
                                    </li>
                                    <li><a href="https://twitter.com/intent/tweet?url=trythis-stationary.com" target="_blank"><i
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
                                        {{--<li><a href="#"><i class="fa fa-user"></i>--}}
                                        {{--</a></li>--}}
                                        <li>
                                            <a id="navbarDropdown" class="dropdown-item dropdown" href="#" role="button"
                                               data-toggle="dropdown"
                                               aria-haspopup="true" aria-expanded="false" v-pre>

                                                <i class="fa fa-user-circle "> </i>
                                                My Account
                                                <!-- <span class="caret"></span> -->
                                            </a>

                                        </li>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown"
                                             style="    left: -125%; top: 128%;">
                                            <div>
                                                <label class="dropdown-item"
                                                       style="background-color: #FE980F; padding-bottom: ">Welcome
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

                                    <li><a href="#"><i class="fa fa-star"></i>
                                            Wishlist</a></li>
                                    <li><a href="#"><i class="fa fa-crosshairs"></i> Tracking order</a>
                                    </li>
                                    <li><a href="#"><i class="	fa fa-edit"></i> Checkout</a></li>
                                    <li><a href="#"><i class="fa fa-shopping-cart"></i> Cart</a></li>
                                    @guest
                                        <li><a href="{{ route('login') }}"><i class=" fa fa-lock"></i> Login</a></li>
                                        <li><a href="{{ route('register') }}"><i class="fa fa-check-square-o"></i>
                                                Register</a>
                                        </li>
                                    @endguest
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
                                        <li><a href="{{route('home')}}" class="{{isActiveRoute('home')}}">Home</a>
                                        </li>
                                        @if(Auth::user()->roles == 'user')
                                            <li><a class="dropdown-item"
                                                   href="#"><i
                                                            class="fa fa-tag"> </i>&nbsp;&nbsp;My Order</a></li>
                                        @endif






                                        @if(Auth::user()->roles == 'admin')
                                            <li class="dropdown"><a class="{{isActiveRoute('dashboardindex')}}"
                                                                    href="{{ route('dashboardindex') }}" "> <i
                                                        class="fa fa-dashboard"> </i> Administrator Dashboard<i
                                                        class="fa fa-angle-down"></i></a>
                                                <ul role="menu" class="sub-menu">
                                                    {{--<li><a class="dropdown-item {{ isActiveRoute('dashboardindex') }}">Dashboard</a>--}}
                                                    {{--</li>--}}

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
                                                    <li><a class="dropdown-item {{ isActiveRoute('acc.show.add') }} "
                                                           href="{{route('acc.show.add')}}">Add Users</a></li>
                                                    <li><a class="dropdown-item {{ isActiveRoute('acc.index') }} "
                                                           href="{{route('acc.index')}}">View
                                                            All Users</a></li>

                                                    <li><a class="dropdown-item {{ isActiveRoute('acc.show.manage') }} "
                                                           href="{{route('acc.show.manage')}}">Dealers Management</a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item {{ isActiveRoute('acc.show.approve') }} "
                                                           href="{{route('acc.show.approve')}}">Pending Dealers
                                                            Approval</a></li>

                                                    <li><a class="dropdown-item {{ isActiveRoute('acc.edit') }} ">⚫Product
                                                            Dealers Management</a></li>
                                                    <li><a class="dropdown-item {{ isActiveRoute('prod.all.index') }} "
                                                           href="{{route('prod.all.index')}}">View
                                                            All Product</a></li>
                                                    <li>
                                                        <form method="POST"
                                                              action="{{ route('admin.prod.show.search') }}"
                                                              enctype="multipart/form-data" >
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
                                                        <form method="POST" action="{{ route('prod.show.search') }}"
                                                              enctype="multipart/form-data" >
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
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="search_box pull-right" style="margin-top: -3%;">
                                <input type="text" placeholder="Search">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
                integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
                crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
                integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
                crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
                integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
                crossorigin="anonymous"></script>


        </body>
</html>