
@extends('layouts.app')
<head>
    <link href="{{ asset('css/AdminLTE.css') }}" rel="stylesheet">
    <link href="{{ asset('css/AdminLTE.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap.min.css') }}" rel="stylesheet">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
    <link href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"
          rel="stylesheet">

    <style>
        .newicon {
            padding-top: 25%;
        }
    </style>
</head>
@section('content')
    <div class="product-details">
        <div class="row">
            <div class="col-sm-5">
                <div class="view-product">
                    <h4>ORDER ID: </h4>
                    <h2>
                        #{{$order->ordercode}}
                    </h2>
                    <br>
                    <h4>
                        Status:
                    </h4><h5>
                        @if($order->payments->state == "1")
                            Paid & Preparing
                        @elseif($order->payments->state == "2")
                            Item Packed
                        @elseif($order->payments->state == "3")
                            In Delivery Process
                        @elseif($order->payments->state == "4")
                            Delivered
                        @else
                            Faild Payment
                        @endif
                    </h5>

                </div>

            </div>
            <div class="col-sm-7">
                <div class="product-information">

                    <img src= "{{asset($pay->filepath)}}" style="width:100%; height:auto;"/>
                </div>
            </div>
            <br/>


        </div>
    </div>


@endsection