@extends('layouts.sellerapp')
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
    <div class="container-fluid">
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
                            <span class="info-box-number">Soon <small>Users</small></span>
                        </div>
                    </div>
                </div>

                <!-- PANEL -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="ion ion-cube newicon"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Categories</span>
                            <span class="info-box-number">Soon<small>Categories</small></span>
                        </div>
                    </div>
                </div>

                <!-- PANEL -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-orange"><i class="ion ion-pricetags newicon"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Products</span>
                            <span class="info-box-number">Soon <small>Products</small></span>
                        </div>
                    </div>
                </div>

                <!-- PANEL -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="ion ion-document newicon"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Images</span>
                            <span class="info-box-number">Soon <small>Images</small></span>
                        </div>
                    </div>
                </div>

            </section>
            <div class="row">
                <!--BOX 1-->


                <!-- END BOX 1-->


            </div>
            <!--ROW END-->
        </div>
    </div>
@endsection