@extends('layouts.app')
<head>
    <link href="{{ asset('css/AdminLTE.css') }}" rel="stylesheet">
    <link href="{{ asset('css/AdminLTE.min.css') }}" rel="stylesheet">

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
    <div class="container">

        <div style="padding: 20px 30px; background: #28a745; z-index: 999999; font-size: 16px; font-weight: 600;">
            <label
                    style="color: rgba(255, 255, 255, 0.9); display: inline-block; margin-right: 10px; text-decoration: none;">
                Welcome Back Dealers: {{$nameuser->name}} Your Account Status: Approved
            </label>
        </div>
        <div class=" justify-content-center">
        <!--  <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
            <div class="alert alert-success">
{{ session('status') }}
                    </div>
@endif

                You are logged in!
            </div>
        </div>
    </div> -->.
            @if (Session::has('info'))
                <div class="card alert alert-info">{{ Session::get('info') }}</div>
            @endif


            <h2>Dealer Dashboard Overview</h2>
            <br>
            <section class="row text-center placeholders">

                <!-- PANEL -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline newicon"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Orders</span>
                            <span class="info-box-number">{{$order}}
                                <small>Orders</small></span>
                        </div>
                    </div>
                </div>

                <!-- PANEL -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="ion ion-cube newicon"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Coupon/promotion</span>
                            <span class="info-box-number">{{$promo->count()}}
                                <small> Items</small></span>
                        </div>
                    </div>
                </div>

                <!-- PANEL -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-orange"><i class="ion ion-pricetags newicon"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total My Products</span>
                            <span class="info-box-number">{{$productamount}}
                                <small>Products</small></span>
                        </div>
                    </div>
                </div>

                <!-- PANEL -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="ion ion-document newicon"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Stock</span>
                            <span class="info-box-number">{{$allstock}}
                                <small>Stocks</small></span>
                        </div>
                    </div>
                </div>

            </section>
            <br/>
            <div class="row">
                <!--BOX 1-->
                <div class="col-md-7">
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <h3 class="box-title">Dealer Information</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form action="{{ route('dealer.update') }}" method="POST" class="form-horizontal"
                              enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-2 control-label">Shopname</label>

                                    <div class="col-sm-10">
                                        <input type="text" name="shopname" class="form-control" id="shopname"
                                               value="{{$nameuser->shopname}}">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-6 control-label">Default Delivery
                                        Cost</label>

                                    <div class="col-sm-10">
                                        <input type="number" name="defaultdev" class="form-control" id="defaultdev"
                                               value="{{$nameuser->defaultdev}}">
                                    </div>
                                </div>

                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                {{--<button type="submit" class="btn btn-default">Cancel</button>--}}
                                <button type="submit" class="btn btn-info pull-right">Update my shop</button>
                            </div>
                            <!-- /.box-footer -->
                        </form>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Latest Promotion</h3>


                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table no-margin">
                                    <!-- Table Headings -->
                                    <thead>
                                    <th width="15%">Coupon Code</th>

                                    <th width="10%">Discount</th>
                                    <th width="25%">Description</th>
                                    <th width="10%">Free-ship</th>

                                    </thead>

                                    <!-- Table Body -->
                                    <tbody>

                                    @if(!empty($promo))
                                        @foreach($promo->take(4) as $post)
                                            <tr>
                                                <td class="table-text">
                                                    <div>{{$post->promocoder}}</div>
                                                </td>

                                                <td class="table-text">
                                                    <div> {{$post->salemore}}</div>
                                                </td>
                                                <td class="table-text" style="overflow: auto;">
                                                    <div>{{$post->info}}</div>
                                                </td>
                                                <td class="table-text">
                                                    <div>{{$post->freeship}}</div>
                                                </td>
                                                </td>

                                            </tr>
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            {{--<a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>--}}
                            <a href="{{route('promo.index')}}" class="btn btn-sm btn-default btn-flat pull-right">View
                                Promotion</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                </div>
                <!-- END BOX 1-->


            </div>
            <div class="row">
                <div class="col-md-12">

                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Latest Orders</h3>


                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table class="table no-margin">
                                    <!-- Table Headings -->
                                    <thead>
                                    <th width="15%">Order ID</th>
                                    <th width="20%">Ordered at</th>
                                    <th width="20%">state</th>
                                    <th width="20%">Method</th>
                                    <th width="10%">Total</th>

                                    <th width="15%">Action</th>
                                    </thead>

                                    <!-- Table Body -->
                                    <tbody>
                                    @foreach($userorown as $post)
                                        <tr>
                                            <td class="table-text">
                                                <div>{{$post->ordercode}}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{$post->created_at}}</div>
                                            </td>
                                            <td class="table-text">

                                                @if(!is_null($post->payments_id))
                                                    <div> @if($post->payments->state == "1")
                                                            <span class="badge badge-info">Pending</span>
                                                        @elseif($post->payments->state == "2")
                                                            <span class="badge badge-light">Preparing</span>
                                                        @elseif($post->payments->state == "3")
                                                            <span class="badge badge-warning">In Delivery Process</span>
                                                        @elseif($post->payments->state == "4")
                                                            <span class="badge badge-success">Delivered</span>
                                                        @else
                                                            <span class="badge badge-danger">Faild Payment</span>
                                                        @endif</div>@endif
                                            </td>
                                            <td class="table-text" style="overflow: auto;">
                                                <div>{{$post->methods}}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>฿{{$post->total}}</div>
                                            </td>
                                            <td>
                                                @if($post->payments_id != null)
                                                    <a href="{{ route('public.order.status', $post->id) }}"
                                                       class="badge badge-primary">Check Status</a>
                                                    <a href="{{ route('invoice.generate', $post->id) }}"
                                                       class="badge badge-warning">See Invoice</a>

                                                    @if($post->payments->state !=4)
                                                        <a href="{{ route('order.setknow', $post->id) }}"
                                                           class="badge badge-success">Set Next Stage</a>
                                                @endif

                                            @endif
                                            <!--   <span class="badge badge-default">Default</span>
<span class="badge badge-primary">Primary</span>
<span class="badge badge-success">Success</span>
<span class="badge badge-info">Info</span>
<span class="badge badge-warning">Warning</span>
<span class="badge badge-danger">Danger</span> -->
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer clearfix">
                            {{--<a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>--}}
                            <a href="{{route('order.index.all')}}"
                               class="btn btn-sm btn-default btn-flat pull-right">View
                                All Orders</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>

                </div>
            </div>
            <!--ROW END-->
        </div>
    </div>
@endsection