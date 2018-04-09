<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    {{-- 
    <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
    <style>
      body {
        font-family: 'Lato';
      }
      .fa-btn {
        margin-right: 6px;
      }
      .buttonbar
      {
        font-size: 20px;/*
        margin-top: 6px;
        margin-bottom: 12px;
        margin-left: 15px;
        margin-right: 15px;*/
        margin-right: 25px;
        color:white;
      }
      .mainnav
      {
            margin-top: -25px;
    margin-bottom: 45px;
    margin-left: 20px;
    margin-right: -25px;    
      }
      .navbar-default {
        /* background-image: linear-gradient(-90deg,#18001f 77%,#2e003a 86%,#440054 97%);*/
        background-color: black;
        border-color: #e7e7e7;
      }
      .textsubnav
      {
        text-align: center;
        color:black;
        padding-top: 5px;
      }
      .subnav
      {
        /* background-color: #f8f8f8;*/
        background-color: grey;
        border-color: #e7e7e7;

      }
      .topnav {
        overflow: hidden;
        background-color: #e9e9e9;
      }
      /* Style the links inside the navigation bar */
      .topnav a {
        float: left;
        display: block;
        color: black;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
      }
      /* Change the color of links on hover */
      .topnav a:hover {
        background-color: #ddd;
        color: white;
      }
      /* Style the "active" element to highlight the current page */
      .topnav a.active {
        background-color: #2196F3;
        color: white;
      }
      /* Style the search box inside the navigation bar */
      .topnav input[type=text] {
        float: right;
        padding: 6px;
        border: none;
        margin-top: 8px;
        margin-right: 16px;
        font-size: 17px;
      }
      .searchbox
      {
        width: 55%;
        padding-top: 1%;
        padding-bottom: 1%;
        font-size: 95%;
      }
      .searchattr 
      {
        width: 50%;
        margin-top: 2%;
        margin-left: 8.5%;
      }
      /* When the screen is less than 600px wide, stack the links and the search field vertically instead of horizontally */
      @media (min-width: 1200px)
      {
        .container {
            width: auto;
        }
        }
      @media screen and (max-width: 600px) 
      {
        .topnav a, .topnav input[type=text] 
        {
          float: none;
          display: block;
          text-align: left;
          width: 100%;
          margin: 0;
          padding: 14px;
        }
        .topnav input[type=text] 
        {
          border: 1px solid #ccc;
        }
      }
     
      .subnavlogo
      {
        font-size: 24px;
      }
      /* The container <div> - needed to position the dropdown content */
   /* Dropdown Button */
.dropbtn {
  
    color: white;
    
   
    border: none;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
    position: relative;
    display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content{
     display: none; 
    position: inherit;
    background-color: #f1f1f1;
    /* min-width: 160px; */
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    text-align: initial;
    float: initial;
    right: 34%;
    top: 25%;
}

/* Links inside the dropdown */
.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover 
{color:grey;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
    display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
    background-color: #3e8e41;
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
      .img
      {
        width:20%;
        height: auto;
      }

        #search {
            position: fixed;
            top: 0px;
            left: 0px;
            width: 100%;
            height: 100%;
            /*background-color: rgba(0, 0, 0, 0.7);*/
            background-color: white;
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
    .labelnewstyle
    {
            display: block;
    text-align: center;
    margin-top: 5%;
    /*font-size: 31px;*/
    text-align: center;
    margin-top: 1.14285714rem;
    margin-bottom: 2.85714286rem;
    font-size: 2.14285714rem;
    }
    </style>
  </head>
  <body id="app-layout">
    <nav class="navbar navbar-default" style="margin-bottom: 0px;">
      <div class="container">
        <div class="navbar-header">
          <div class="navbar-brand">
           <!--  <a class ="" href="{{url('/')}}">
              <img src="http://colonel-tech.com/wp-content/uploads/2017/07/LogoColMinimal-2-300x300.jpg" style="width: 9%;">
            </a> -->
            <a class="navbar-brand" href="{{ url('/') }}" style="font-size:30px;color:white;margin-top: 2px;">
         <!--    {{ config('app.name', 'Laravel') }} -->
         STATIONARY
            </a>
          </div>
          <div class = "mainnav">
          <li class="nav navbar-nav navbar-left dropdown">
            <a href="#search">
              <i class="fa fa-search buttonbar" >
              </i>
            </a>
          </a>
            

        </li>
      <!-- Right Side Of Navbar -->
      <ul class="nav navbar-nav navbar-right" style="display: inline-flex;">
        <!-- Authentication Links -->
        <i class="fa fa-gift buttonbar" >
        </i>
        </a>
      <i class="fa fa-shopping-cart buttonbar" >
      </i>
      </a>
    <div class ="dropdown">
      <i class="fa fa-user-circle buttonbar" >
      </i>

      <ul class="dropdown" role="menu">
        <div class="dropdown-content">
          @if (Auth::guest())
          <a href="{{ url('/login') }}">Login
          </a>
          <a href="{{ url('/register') }}">Register
          </a>
          @else
          <a href="{{ url('/logout') }}">
            <i class="fa fa-btn fa-sign-out">
            </i>Logout
          </a>
          @endif
        </div>
      </ul>

    </div>
    </li>
  </ul>
</div>
</div>
</div>
</div>
</nav>
<div class ="container">
  <nav class="navbar subnav" style="min-height: 33px;">
    <div class="container textsubnav">
      <div style = "display: inline-block;">
        <i class = "fa fa-inbox subnavlogo">
        </i>&nbsp; บริการจัดส่งฟรีเมื่อสั่งสินค้ามากกว่า 490 บาทขึ้นไป
        &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
        <i class = "fa fa-money subnavlogo">
        </i>&nbsp;  บริการรับชำระเงินปลายทาง
        &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
        <i class = "fa fa-mobile-phone subnavlogo">
        </i>&nbsp;  โทรฟรี Call-Center 24 ชั่วโมง (02 564 4440)
        &nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
        <i class = "fa fa-paper-plane subnavlogo">
        </i>&nbsp; Tracking System Service Available
      </div>
    </div>
  </nav>
</div>

@yield('content')
<!-- JavaScripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js">
</script>
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
    $('form').submit(function(event) {
        event.preventDefault();
        return false;
    })
});
</script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js">
</script>
{{-- 
<script src="{{ elixir('js/app.js') }}">
</script> --}}
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
        <i class="fa fa-search" >
              </i>
          </button>
    
    </form>
</div>
</body>
</html>
          <!--
<div class="navbar-header">
<!-- Collapsed Hamburger 
<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
<span class="sr-only">Toggle Navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
-->
          <!-- Branding Image
<a class="navbar-brand" href="{{ url('/') }}">
{{ config('app.name', 'Laravel') }}
</a>
<!--
</div>-->