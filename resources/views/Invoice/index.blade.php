@extends('layouts.app')
<style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, .15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }

    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }

    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }

    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }

    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }

    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }

    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.item td {
        border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
        border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }

    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }

        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }

    /** RTL **/
    .rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }

    .rtl table {
        text-align: right;
    }

    .rtl table tr td:nth-child(2) {
        text-align: left;
    }

    .watermark {
        /*position:fixed;*/
        /*bottom:5px;*/
        /*right:5px;*/
        opacity: 0.4;
        z-index: 99;
        color: RED;
    }
</style>
@section('content')
    <div id="invoice-box" class="container">
        <div class="invoice-box">
            <table cellpadding="0" cellspacing="0">
                <tr class="top">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td class="title">
                                    {{--<img src="https://www.sparksuite.com/images/logo.png" style="width:100%; max-width:300px;">--}}
                                    <img src="{{url('/images/logo.png')}}" style="width:100%; max-width:427px;">
                                </td>


                                <td>
                                    Invoice #: {{$orderinfo->ordercode}}<br>
                                    Type #: {{$orderinfo->invoice}}<br>
                                    Created: {{$orderinfo->created_at}}<br>
                                    {{--Due: February 1, 2015--}}
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>

                <tr class="information">
                    <td colspan="2">
                        <table>
                            <tr>
                                <td>
                                    Thammasat University<br>
                                    99 Moo.18 Phaholyothin Road<br>
                                    Khlongluang, Pathumthani 12121 <br>
                                    Tel. +66 (0) 564 4440-79
                                </td>

                                <td>
                                    TryThis Stationary.<br>
                                    CS Branch<br>
                                    trythis.stationary@gmail.com
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr class="defails">
                    <td>
                        Email :{{Auth::user()->email}}<br>&nbsp;<br>
                        Name: {{$orderinfo->payments->name}}<br>
                        Address & Details:{{$orderinfo->address}}<br>&nbsp;
                    </td>
                </tr>

                <tr class="heading">
                    <td>
                        Payment Method:
                    </td>

                    <td>
                        @if($orderinfo->methods=="creditcard")
                            Credit Cards
                        @else
                            Bank Transfer
                        @endif
                    </td>
                </tr>

                <tr class="details">
                    <td>
                        @if($orderinfo->methods=="creditcard")
                            Credit | Debit No: {{$newcards}}
                        @else
                            Banking Transfer Receipt
                        @endif

                    </td>

                    <td>
                        @if($orderinfo->methods=="creditcard")
                            {{$cardsname}}
                        @else
                            Transfer Uplaod
                        @endif
                    </td>
                </tr>
                @if(!is_null($orderinfo->coupon))
                    <tr class="details">
                        <td>
                            Coupon No: {{$promotion->promocoder}} | {{$promotion->info}}
                        </td>

                        <td>
                            @if(!is_null($promotion->freeship))
                                Freeshipping
                            @endif
                            @if($promotion->salemore !=0)
                                Discount ฿{{$promotion->salemore}}
                            @endif
                        </td>
                    </tr>
                @endif
                <tr class="heading">
                    <td>
                        Item
                    </td>

                    <td>
                        Price
                    </td>
                </tr>
                @foreach($prod as $item)
                    <tr class="item">
                        <td>
                            {{$item->name}}

                        </td>

                        <td>
                            ฿
                            @if(!empty($item->price_promo))
                                {{$item->price_promo}}
                            @else
                                {{$item->price}}
                            @endif
                            x {{$item->pivot->amount}}

                        </td>
                    </tr>

                @endforeach
                <tr class="item">
                    <td>
                        Delivery Cost:
                    </td>

                    <td>
                        @if($freeship == 0)
                            {{$deli}}
                        @else
                            Free Shipping
                        @endif
                    </td>
                </tr>
                <tr class="total">
                    <td></td>

                    <td>
                        Total: ฿{{$total}}
                    </td>
                </tr>

            </table>
            <div class="watermark" style="text-align: center;">
                <h1>INVOICE PAID</h1>
            </div>
        </div>
        <div class="container col-md-5" style="width: 100%;text-align:  center;">

            <a class="btn btn-primary" onclick="printDiv('invoice-box');">Print Invoice</a>


            <a href=" {{route('index')}}" class="btn btn-primary">Continue Shopping</a>

        </div>
    </div>
    <br>

    <script>
        function printDiv(divName) {
            var printContents = document.getElementById(divName).innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
        }
    </script>
@endsection