<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<head>
	<meta charset="utf-8"/>
	<title>SB Admin v2.0 in Laravel 5</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta content="width=device-width, initial-scale=1" name="viewport"/>
	<meta content="" name="description"/>
	<meta content="" name="author"/>

	<link rel="stylesheet" href="{{ asset("assets/stylesheets/styles.css") }}" />
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
        margin-right: 8%;
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
	@yield('body')
	<script src="{{ asset("assets/scripts/frontend.js") }}" type="text/javascript"></script>
</body>
</html>