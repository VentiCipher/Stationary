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
    <div class="table-responsive cart_info">
        <div class="table-responsive cart_info">
            <table class="table table-condensed">
                <thead>
                <tr class="cart_menu" style="    background: #FE980F;color: #fff;">
                    <td class="image">Item</td>
                    <td class="description"></td>
                    <td class="price">Price</td>
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
                            <p>฿{{$prod->price}}</p></td>
                        <td class="cart_quantity">

                            <div class="cart_quantity_button"> <a class="cart_quantity_up" href="{{route('addtocart',['id'=>$prod->id])}}">+</a>
                                <input class="cart_quantity_input" type="text" name="quantity"
                            @foreach($cart as $singlecart)
                                        @if($singlecart->products_id == $prod->id)
                            value="{{$singlecart->amount}}"
                                        @endif
                                        @endforeach
                                         autocomplete="off" size="2">
                                <a class="cart_quantity_down" href="{{route('decrease',['id'=>$prod->id])}}"> -</a></div>
                        </td>
                        <td class="cart_total"><p class="cart_total_price">
                                @if($prod->price_promo == null)
                                    No Promotion now
                                @else
                                  <strike>฿{{$prod->price}}</strike> -> ฿{{$prod->price_promo}}
                                    @endif
                            </p></td>
                        <td class="cart_delete"style="padding-top: 79%;"><a class="cart_quantity_delete"
                                                   href="{{route('removefromcart',['id'=>$prod->id])}}"><i
                                        class="fa fa-times"></i></a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>


        </div>
    </div>
    <script type="text/javascript">
        $('.cart_delete').find('a').click(function (event){
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