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
                <div id="similar-product" class="carousel slide" data-ride="carousel">
                    <h3>Your Order Products</h3>
                    <br/>

                        @foreach($order->products as $img)
                            <div class="col-sm-6">
                                <a href="{{route('user.show.explore',$img->id)}}"><img src="{{asset($img->thumbsnail)}}" style="width:100%; height:auto;">
                              <br> <p style="text-align: center;">{{$img->name}}</p></a>
                            </div>
                        @endforeach

                </div>
            </div>
            <div class="col-sm-7">
                <div class="product-information">

                    <h3>Order Details</h3>
                    <br>
                    <p><b> Payment:</b> {{$order->methods}}</p><br>
                    <p><b> Card Number: </b> {{$cardsno}}</p><br>
                    <p><b>Invoice as:</b> {{$order->invoice}}</p><br>
                    <p><b>Invoice Name:</b> {{$name->name}}</p><br>
                    <p><b>Delivery Cost:</b> ฿{{$order->delivery_cost}}</p><br>

                    <p><b>Total Purchase:</b> ฿{{$order->total}}</p><br>

                    <a href="{{route('invoice.generate',['id'=>$order->id   ])}}" class="btn btn-default cart add-to-cart">
                        <i class="fa fa-briefcase"></i> See Invoice</a>

                    <br><br>
                    <h2>Shop you bought:</h2>

                    @foreach($order->products as $prod)
                        <p><b>Name:</b>
                            @if($prod->users->first()->shopname == null)
                                Generic Shop
                            @else{{$prod->users->first()->shopname}}
                            @endif
                        </p>
                    @endforeach
                </div>
            </div>
            <br/>


        </div>
    </div>

    <div class="recommended_items">
        <h2 class="title text-center">Newest items</h2>
        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="row">
                <div class="row">
                    @foreach($data as $sug)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center"><img src="{{asset($sug->thumbsnail)}}"
                                                                              style="width:auto;height:30%;">
                                        <h2>฿{{$sug->price}}</h2>
                                        <p>฿{{$sug->user['shopname']}}</p>
                                        <a href="{{route('addtocart',['id'=>$sug->id])}}"
                                           class="btn btn-default add-to-cart"><i
                                                    class="fa fa-shopping-cart"></i>Add to cart
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            {{--<a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev"><i--}}
            {{--class="fa fa-angle-left"></i></a> <a class="right recommended-item-control"--}}
            {{--href="#recommended-item-carousel" data-slide="next"><i--}}
            {{--class="fa fa-angle-right"></i></a></div>--}}
        </div>
@endsection