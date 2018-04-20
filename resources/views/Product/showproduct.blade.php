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
                <div class="view-product"><img src="{{asset($prod->thumbsnail)}}"
                                               style="width:86%;height:auto;">
                    {{--<h3>ZOOM</h3>--}}
                </div>
                <div id="similar-product" class="carousel slide" data-ride="carousel">
                </div>
            </div>
            <div class="col-sm-7">
                <div class="product-information">
                    {{--<img src="../assets/images/product-details/new.jpg"--}}
                    {{--class="newarrival"--}}
                    {{--alt="website template image">--}}
                    <h2>{{$prod->name}}</h2>
                    <p>{{$prod->user['shopname']}}</p>
                    {{--<img src="../assets/images/product-details/rating.png" alt="website template image">--}}
                    <span> <span> @if($prod->price_promo == null)
                                ฿{{$prod->price}}
                            @else
                                <strike>฿{{$prod->price}}</strike><br/>฿{{$prod->price_promo}}
                            @endif</span>

              <label>Quantity: </label>
              <input type="text" value="1" readonly>
                        @if($prod->in_stock >0)
                            <a href="{{route('addtocart',['id'=>$prod->id])}}" class="btn btn-default cart add-to-cart">

              <i
                          class="fa fa-shopping-cart"></i> Add to cart</a>
                            </a>
                        @else
                            <a class="btn btn-default cart add-to-cart"><i
                                            class="fa fa-remove"></i> Out of Stock</button></a>
                        @endif
            </span>
                    <p><b>Availability:</b>
                        @if($prod->in_stock>0)
                            In Stock
                        @else
                            Out of Stock
                        @endif
                    </p>
                    <p><b>Best Available:</b>
                        @if($prod->promotion_id == null)
                            Special Price
                        @else
                            ON PROMOTION!
                        @endif
                    </p>
                    <p><b>Condition:</b> New</p>
                    <p><b>Brand:</b>
                        @if($prod->user['shopname'] != null)
                            {{$prod->user['shopname']}}
                        @else
                            Misc Product
                        @endif</p>
                    {{--<a href="#"><img--}}
                    {{--src="../assets/images/product-details/share.png" class="share img-responsive"--}}
                    {{--alt="website template image"></a>--}}
                </div>
            </div>
            <br/>
            <div class="col-sm-5">
                <h5>Another Product Picture</h5>
            </div>
            <br/>
            <div class="row">
                @foreach($image as $img)
                    <div class="col-sm-4">
                        <img src="{{asset($img->path)}}" style="width:100%; height:auto;">
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="category-tab shop-details-tab">
        <div class="col-sm-12">
            <div class="nav nav-tabs" style="background-color: white; color: #FE980F;">
                <h3>Product Details</h3>
                {{--<li><a href="#companyprofile" data-toggle="tab">Company Profile</a></li>--}}
                {{--<li><a href="#tag" data-toggle="tab">Tag</a></li>--}}
                {{--<li class=""><a href="#reviews" data-toggle="tab">Reviews (5)</a></li>--}}
            </div>
        </div>
        <div class="row">
            {{--<div class="tab-pane fade active in" id="details">--}}
            {{--<div class="col-sm-6">--}}
            {{--<div class="product-image-wrapper">--}}
            {{--<div class="single-products">--}}
            {{--<div class="productinfo text-center"><img src="../assets/images/home/gallery1.jpg" alt="website template image">--}}

            <div class="col-md-6 product-information">
                Product Price :
                @if($prod->price_promo == null)
                    <h5><span>฿{{$prod->price}}</span></h5>
                @else
                    <h5><strike>{{$prod->price}}</strike>=> {{$prod->price_promo}}</h5>
                @endif
                <p>{{$prod->name}}</p>
                @if($prod->in_stock >0)
                    <a href="{{route('addtocart',['id'=>$prod->id])}}" class="btn btn-default cart add-to-cart">

                        <i
                                    class="fa fa-shopping-cart"></i> Add to cart</a>
                    </a>
                @else
                    <a class="btn btn-default add-to-cart"> <i
                                    class="fa fa-remove"></i> Out of Stock</a>
                @endif
                {{--<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to--}}
                    {{--cart--}}
                {{--</button>--}}
            </div>

            <div class="col-md-6 product-information">
                {{$prod->description}}
            </div>
            {{--</div>--}}
            {{--</div>--}}
            {{--</div>--}}

            {{--</div>--}}
        </div>
    </div>
    <div class="recommended_items">
        <h2 class="title text-center">recommended items</h2>
        <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="row">
                <div class="row">
                    @foreach($data->slice(0,3) as $sug)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center"><img src="{{asset($sug->thumbsnail)}}"
                                                                              style="width:auto;height:30%;">
                                        <h2>฿{{$sug->price}}</h2>
                                        <p>฿{{$sug->user['shopname']}}</p>
                                        <a href="{{route('addtocart',['id'=>$sug->id])}}" class="btn btn-default add-to-cart"><i
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