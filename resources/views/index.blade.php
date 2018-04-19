@extends('layouts.app')
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
@section('content')


    <div class="features_items">
        <h2 class="title text-center">Features Items</h2>
        <div class="row">
            @foreach($products as $prod)
                <div class="col-sm-4">

                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                @if($prod->thumbsnail)
                                    <img src="{{asset($prod->thumbsnail)}}" style="height:20%;width:auto; ">
                                @endif
                                <p/>
                                <h2>฿{{$prod->price}}</h2>
                                <p>{{$prod->name}}</p>
                                    @if($prod->in_stock > 0)
                                        <p> <button class="badge badge-success">{{$prod->in_stock}} Left</button></p>
                                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add
                                            to
                                            cart</a></div>
                                    @else
                                <p> <button class="badge badge-danger">Out Of Stock</button></p>
                                            <a class="btn btn-default add-to-cart"><i class="fa fa fa-remove"></i>Out of Stock</a>
                        </div>
                                        @endif

                            <div class="product-overlay">
                                <div style="text-align: center;padding-top: 40px;">
                                @if($prod->thumbsnail)
                                    <img src="{{asset($prod->thumbsnail)}}" style="height:40%;width:auto; ">
                                @endif
                                </div>
                                <div class="overlay-content">


                                    @if(!$prod->price_promo == null)
                                        <h3>On Promotion!</h3>
                                        <h4><strike>฿{{$prod->price}}</strike> -> ฿{{$prod->price_promo}}</h4>
                                    @else
                                        <h2>฿{{$prod->price}}</h2>
                                        <p>By {{$prod->users->first()->shopname}}</p>
                                    @endif
                                        <a href ="#">

                                            <button class="btn btn-default add-to-cart  "><i class="fa fa-cube"></i>See Details</button>

                                        </a>
                                        @if($prod->in_stock >0)
                                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add
                                        to cart</a></div>
                                @else
                                    <a class="btn btn-default add-to-cart"><i class="fa fa fa-remove"></i>Out of Stock</a></div>

                        @endif
                            </div>
                        </div>
                        <div class="choose">
                            <ul class="nav nav-pills nav-justified" style="width: 100%;display: block;">
                                <li style="text-align: center;"><a href="{{route('addtowish',['id'=>$prod->id])}}"><i class="fa fa-plus-square"></i>Add to
                                        wishlist</a></li>
                                {{--<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>--}}
                            </ul>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>
    </div>
    <script type="text/javascript">
        $('.choose').find('a').click(function (event){
            event.preventDefault();
            $.ajax({
                url: $(this).attr('href')
                ,success: function(response) {
                    alert(response)
                }
            });
            return false; //for good measure
        });
    </script>
@endsection

