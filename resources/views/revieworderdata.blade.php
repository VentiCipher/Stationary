@extends('layouts.app')
<link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
<head>
    <style>
        .cart_product {
            /* display: block; */
            margin: 15px -70px 10px 25px;
        }

    </style>
</head>
@section('content')
    <div class="table-responsive cart_info" style="padding-bottom: 15px;">
        <h3>Checkout</h3>
        <br/>
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu" style="    background: #FE980F;color: #fff;">
                    <td class="image">Item</td>
                    <td class="description"></td>

                    <td class="price">Price</td>
                    <td class="price">Per Item</td>
                    <td class="devcost">Delivery Cost</td>
                    <td class="quantity">Amount</td>
                    <td class="total">Promotion Price</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>

                @foreach($wishlist as $prod)
                    <tr>


                        <td class="cart_product" style="width:20%;     display: table-cell; "><a href="#"><img
                                        src="{{asset($prod->thumbsnail)}}" style="width:50%;"></a></td>
                        <td class="cart_description"><h4><a href="#">{{$prod->name}}</a></h4>
                            <p>Dealer: {{$prod->users->first()->shopname}}</p></td>

                        <td class="cart_price" style="    color: #FE980F;font-size: 24px;">
                            <p>฿{{($prod->price)}} </p></td>
                        <td class="cart_price" style="    color: #FE980F;font-size: 24px;">
                            @foreach($cart as $incart)
                                @if($incart->products_id == $prod->id)
                                    @if(!empty($prod->promo_price))
                                        <p>฿{{$incart->amount*$prod->promo_price}}</p>
                                    @else
                                        <p>฿{{$incart->amount*$prod->price}}</p>
                                    @endif
                                @endif
                            @endforeach
                        </td>
                        <td class="cart_price" style="    color: #FE980F;font-size: 24px;">
                            <p>{{$prod->defaultdev==null ? 'FREE':"฿".$prod->defaultdev}}</p></td>
                        <td class="cart_quantity">

                            <div class="text-center">
                                @foreach($cart as $singlecart)
                                    @if($singlecart->products_id == $prod->id)
                                        {{$singlecart->amount}}
                                    @endif
                                @endforeach

                            </div>
                        </td>
                        <td class="cart_total"><p class="cart_total_price">
                                @if($prod->price_promo == null)
                                    No Promotion now
                                @else
                                    <strike>฿{{$prod->price}}</strike> -> ฿{{$prod->price_promo}}
                                @endif
                            </p></td>
                        {{--<td class="cart_delete" style="padding-top: 79%;"><a class="cart_quantity_delete"--}}
                        {{--href="{{route('removefromcart',['id'=>$prod->id])}}"><i--}}
                        {{--class="fa fa-times"></i></a></td>--}}
                    </tr>
                @endforeach

                </tbody>
            </table>


        </div>
        <div class="col-md-12 " style="text-align: right">

            @if($promotiontotal >0)
                <h5>Promotion: You Saved: ฿{{$promotiontotal}}</h5>

            @endif
            <h5>Product Price: ฿{{$total}}</h5>
            <h5>Delivery Cost: ฿{{$deli}}</h5>
            <h5>Excluding VAT 7%: ฿{{$total-$promotiontotal-$total*0.07}}</h5>
                <h5>Total: ฿{{$total+$deli-$promotiontotal}}</h5>
            <br/>

        </div>
        <br/>

        <div class="col-md-12 card">
            <div class="card-header">Place Order Details</div>
            <div class="row">
                <div class="col-md-6 card-body">
                    <form method="POST" action="{{ route('order.show.fetch') }}" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name = "total" value = {{$total-$promotiontotal}}>
                        <input type="hidden" name = "delivery_cost" value = {{$deli}}>
                        {{--'users_id','address','invoice','payments_id','methods','delivery_cost','coupon',--}}
                        <div class="form-group row">
                            <label for="invoice" class="col-md-4 col-form-label text-md-right">Invoice of</label>

                            <div class="col-md-6">
                                <select name="invoice" required>
                                    <option value="personal" {{$orderdata->invoice == "personal" ? 'default': ''}}>
                                        Personal
                                    </option>
                                    <option value="company" {{$orderdata->invoice == "company" ? 'default': ''}}>Company
                                        LTD, Trading
                                    </option>

                                </select>

                                @if ($errors->has('invoice'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('invoice') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <label for="methods" class="col-md-4 col-form-label text-md-right">Payment Type</label>
                            <div class="col-md-6">

                                <select name="methods" required>
                                    <option value="creditcard" {{$orderdata->methods == "creditcard" ? 'default': ''}}>Credit Card | Debit Card</option>
                                    <option value="transfer" {{$orderdata->methods == "transfer" ? 'default': ''}}>Bank Transfer</option>

                                </select>

                                @if ($errors->has('invoice'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('invoice') }}</strong>
                                    </span>
                                @endif


                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cards" class="col-md-4 col-form-label text-md-right">Credit | Debit Cards No.</label>
                            <div class="col-md-6">


                                <input id="cards" type="number"
                                       class="form-control{{ $errors->has('cards') ? ' is-invalid' : '' }}"
                                       name="cards" value="{{$orderdata->cards}}">

                                @if ($errors->has('cards'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('cardss') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name of Invoice (Blank to Default)</label>
                            <div class="col-md-6">
                                <input id="name" type="text"
                                       class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                       name="name" value="{{$orderdata->name}}">

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{--invoice--}}
                        <div class="form-group row">
                            <label for="coupon" class="col-md-4 col-form-label text-md-right">Coupon Code</label>
                            <div class="col-md-6">
                                <input id="coupon" type="text"
                                       class="form-control{{ $errors->has('coupon') ? ' is-invalid' : '' }}"
                                       name="coupon">

                                @if ($errors->has('coupon'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('coupon') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Address</label>


                            <div class="col-md-8">
                                    <textarea id="address" name="address" class="form-control"
                                              style="    width: 75%;height: 45%;"
                                              required>{{$orderdata->address}}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12" style="text-align: center">
                            <button type="submit" class="btn btn-primary">
                                Place Order
                            </button>
                        </div>

                    </form>
                </div>
                <div class="col-md-6 card-body">
                    <form method="POST" action="{{ route('orderreview.index') }}" enctype="multipart/form-data">
                        @csrf

                        {{--'users_id','address','invoice','payments_id','methods','delivery_cost','coupon',--}}
                        <div class="form-group row">
                            {{--<label for="invoice" class="col-md-4 col-form-label text-md-right">Use Order Data of</label>--}}
                            @if(!empty($oldor))
                                <div class="panel panel-default col-xs-6 col-sm-12 col-md-12">
                                    <div class="panel-heading">History Payment</div>
                                    <table class="table table-striped task-table animated fadeInUp">
                                        <!-- Table Headings -->
                                        <thead>
                                        <tr>
                                            <th width="30%">OrderID</th>
                                            <th width="40%">Address</th>
                                            <th width="30%">Select</th>
                                        </tr>
                                        </thead>

                                        <!-- Table Body -->
                                        <tbody>

                                        @foreach($oldor as $item)
                                            <tr>
                                                <td class="table-text">
                                                    <div>{{$item->ordercode}}</div>
                                                </td>
                                                <td class="table-text">
                                                    <div>{{$item->address}}</div>
                                                </td>
                                                <td>
                                                    <a href="{{route('orderreviewdata.index',$item->id)}}"
                                                       class="btn btn-primary">Use this Detail</a>
                                                </td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <label for="invoice" class="col-md-12 col-form-label text-md-lefr">No History of
                                    Order</label>
                                <br>
                                <label for="invoice" class="col-md-12 col-form-label text-md-lefr">Once you ordered you
                                    can choose data from here</label>
                            @endif
                        </div> {{--invoice--}}


                    </form>
                </div>
            </div>
        </div>


        <br>

    </div>
    <script type="text/javascript">
        $('.cart_delete').find('a').click(function (event) {
            event.preventDefault();
            $.ajax({
                url: $(this).attr('href')
                , success: function (response) {
                    alert(response)
                }
            });
            return false; //for good measure
        });
    </script>
@endsection