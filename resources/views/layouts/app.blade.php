
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
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
    

        #search {
            position: fixed;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
            /*background-color: rgba(0, 0, 0, 0.7);*/
            background-color: #ffffd2;
            -webkit-transition: all 0.5s ease-in-out;
            -moz-transition: all 0.5s ease-in-out;
            -o-transition: all 0.5s ease-in-out;
            -ms-transition: all 0.5s ease-in-out;
            transition: all 0.5s ease-in-out;

            -webkit-transform: translate(0px, -100%) scale(0, 0);
            -moz-transform: translate(0px, -100%) scale(0, 0);
            -o-transform: translate(0px, -100%) scale(0, 0);
            -ms-transform: translate(0px, -100%) scale(0, 0);
            transform: translate(0px, -100%) scale(0, 0);
            
            opacity: 0;
        }
   .centerdrop
        {
                text-align: center;
        }
        #search.open {
            -webkit-transform: translate(0px, 0px) scale(1, 1);
            -moz-transform: translate(0px, 0px) scale(1, 1);
            -o-transform: translate(0px, 0px) scale(1, 1);
            -ms-transform: translate(0px, 0px) scale(1, 1);
            transform: translate(0px, 0px) scale(1, 1); 
            opacity: 1;
        }

        #search input[type="search"] {
            position: absolute;
            top: 50%;
            width: 100%;
            color: rgb(255, 255, 255);
            background: rgba(0, 0, 0, 0);
            font-size: 60px;
            font-weight: 300;
            text-align: center;
            border: 0px;
            margin: 0px auto;
            margin-top: -51px;
            padding-left: 30px;
            padding-right: 30px;
            outline: none;
        }
        #search .btn {
           /* position: absolute;
            top: 50%;
            left: 50%;
            margin-top: 61px;
            margin-left: -45px;*/
                margin-top: -4px;
        }
        #search .close {
    position: fixed;
    top: 15px;
    /* right: 15px; */
    color: black;
    /* background-color: #428bca; */
    border-color: #357ebd;
    opacity: 1;
    padding: 3px 34px;
    font-size: 34px;
    }
 .navbar-header {
        float: left;
        text-align: center;
        width: 100%;
      }
      .navbar-brand {
        float:none;
        color:white;
      }
      .navbar-right{
        float:right;
      }
    .buttonbar
      {
        font-size: 23px;/*
        margin-top: 6px;
        margin-bottom: 12px;
        margin-left: 15px;
        margin-right: 15px;*/
        padding-left: 20px;
    padding-right: 20px;
        text-align: center;
        color:black;
      }
    .dropdown:hover .dropbtn 
    {
        color:grey;
    }
    .btnholder:hover
    {
        color:grey;
    }
    .newbgnav
    {
        /*background-image: url(../images/bg.png);*/
            background-color: #ffffa2;
               
    }
    .navigator
    {
        /*margin-right: 8%;*/
    }
     .tooltip 
    {
    position: relative;
    display: contents;
    border-bottom: 1px dotted black; /* If you want dots under the hoverable text */
    }

    /* Tooltip text */
    .tooltip .tooltiptext 
    {
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
    .tooltip:hover .tooltiptext 
    {
        visibility: visible;
    }

    </style>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel navbar-fixed-top newbgnav">
            <div class= "bg"></div>
            <div class="container-fluid">
            
                <!-- <div class = "navbar-header"> -->

                    <!-- <div class = "navbar-brand">
                        <a class="navbar-brand" href="{{ url('/') }}">
                            {{ config('app.name', 'Laravel') }}
                        </a>

                </div> -->

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                       <!-- Left Side Of Navbar -->
                   <ul class="nav navbar-nav mr-auto" style="    display: contents;">

                   
                     <a href="#search"  class="nav-link fa fa-search buttonbar"></a>
        
                    @if(Auth::check())
                    @if(Auth::user()->roles == "seller" || Auth::user()->roles == "admin")
               <!-- <a href ="#" class="nav-link fa fa-cubes buttonbar" style="margin-left:1%" title="Stock MANAGER"></a> -->
<!-- THIS IS DROPDOWNS STOCK-->
                 <li class="nav-item dropdown centerdrop">
                                <a id="navbarDropdown" class="nav-link dropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <div class="tooltip">
                                     <i class="fa fa-cubes buttonbar dropbtn"  ></i>
                                     <span class="tooltiptext">Stocks & Products</span>
                                 </div>
                        <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdow   n">
                           

                                    <a class="dropdown-item" href="{{ route('login') }}">
                                        Manage Stocks
                                    </a>

                                    <a class="dropdown-item" href="{{ route('addproduct') }}">
                                        Add Product
                                    </a>
                                     <a class="dropdown-item" href="{{ route('login') }}">
                                        Reveals Order
                                    </a>

                               
                                </div>
                            </li>
                        
                        
                    @endif
                    @if(Auth::user()->roles == "admin")
              <div class ="tooltip">
                      <a href ="{{route('dashboardindex')}}" class="nav-link">
                                     <i class="fa fa-dashboard buttonbar nav-link nav-item"   >
                                     </i>
                                     <span class="tooltiptext">Management Panel</span></a>
                                 </div>
                    
                  <!--   <li class="nav-item dropdown centerdrop">
                                <a id="navbarDropdown" class="nav-link dropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <div class ="tooltip">
                                     <i class="fa fa-dashboard buttonbar dropbtn" style="margin-left:80%" >
                                     </i>
                                     <span class="tooltiptext">Management Panel</span>
                                 </div>
                        <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                           

                                    <a class="dropdown-item" href="{{ route('indexcat') }}">
                                        Manage Categories
                                    </a>

                                     <a class="dropdown-item" href="{{ route('login') }}">
                                        Manage User
                                    </a>

                               
                                </div>
                            </li> -->
                    @endif
                    @else
                            <div style="padding-left:2%">      </div>

                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>

                    @endif
                    </ul>

                           

              
                </ul>

  <ul class="nav nav-justified" style="text-align: center;">
   <li> 
    @if(Auth::check())
    @if((Auth::user()->roles == "admin")||(Auth::user()->roles == "seller"))
    <a href="{{url('/')}}" class="navbar-brand">
    <img src="{{url('/images/logo.png')}}" style="width: 60%" >
    </a> 
    @else
    <a href="{{url('/')}}" class="navbar-brand">
    <img src="{{url('/images/logo.png')}}" style="width: 60% ; padding-left: 11%;" >
    </a> 
       
    @endif
      @else
    <a href="{{url('/')}}" class="navbar-brand">
    <img src="{{url('/images/logo.png')}}" style="width: 60% ; " >
    </a> 
    @endif
    </li>

    </ul>

     
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <a href="#" class="nav-link">
                          <i class="nav-link fa fa-gift buttonbar navigator" ></i>
                      </a>
                      <a href="#" class="nav-link">
                           <i class="nav-link fa fa-shopping-cart buttonbar navigator" ></i>
                       </a>
                        <!-- Authentication Links
                        @guest
                            <li><a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                            <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                        @else
                            <li class="nav-item dropdown centerdrop">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                              <li></li>
                        @endguest
                        
                     -->

                      
                       <!-- Authentication Links -->
                       
                            <li class="nav-link nav-item dropdown centerdrop">
                                <a id="navbarDropdown" class="nav-link dropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                
                                     <i class="fa fa-user-circle buttonbar dropbtn" > </i>
                               
                        <!-- <span class="caret"></span> -->
                                </a>

                            <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="    left: -125%; top: 128%;">
                            @guest
                             <div style ="padding-bottom:20px;">
                            <label class ="dropdown-item" style="background-color: #dcdcaa; padding-bottom: ">Welcome Guest</label>
                            </div>
                            <a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>
                            <a class="dropdown-item" href="{{ route('register') }}">{{ __('Register') }}</a>
                             <a class="dropdown-item" href="{{ route('register') }}">Tracking Orders</a>
                            <a class="dropdown-item" href="mailto:trythis.stationary@gmail.com?Subject=FAQ. to Admin" target="_top">F.A.Q.</a>
                            @else
                            <div style ="padding-bottom:20px;">
                            <label class ="dropdown-item" style="background-color: #dcdcaa; padding-bottom: ">Welcome {{ Auth::user()->name }}</label>
                            </div>

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    @endguest
                                </div>
                            </li>
                        
                        
                    
                    </ul>
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

            <!-- </div> -->
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>


<div id="search">
    <button type="button" class="close">×</button>
    <form style="    display: block;
    text-align: center;
    margin-top: 8%;">
        <label class="labelnewstyle">SEARCH</label><br>
       
        <input type="text" autofocus value="" placeholder="search ..." style="    font-size: 17px;
    width: 50%;
    padding-top: 5px;
    padding-bottom: 5px;"/>
    <button  type="submit" >
        <i class="fa fa-search buttonbar" style="padding-top: 14%; padding-bottom: 40%;" >
              </i>
          </button>
    
    </form>
</div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script>
    $(function () {
    $('a[href="#search"]').on('click', function(event) {
        event.preventDefault();
        $('#search').addClass('open');
        $('#search > form > input[type="search"]').focus();
    });
    
    $('#search, #search button.close').on('click keyup', function(event) {
        if (event.target == this || event.target.className == 'close' || event.keyCode == 27) {
            $(this).removeClass('open');
        }
    });
    
    
    //Do not include! This prevents the form from submitting for DEMO purposes only!
    // $('form').submit(function(event) {
    //     event.preventDefault();
    //     return false;
    // })
});
</script>

</body>
</html>