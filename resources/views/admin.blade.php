@extends('layouts.adminapp')
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
            <h2>Dashboard Overview</h2>
            <br>
            <section class="row text-center placeholders">

                <!-- PANEL -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline newicon"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Users</span>
                            <span class="info-box-number">{{$u_am}}
                                <small>Users</small></span>
                        </div>
                    </div>
                </div>

                <!-- PANEL -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-green"><i class="ion ion-cube newicon"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Categories</span>
                            <span class="info-box-number">{{$cat_am}}
                                <small>Categories</small></span>
                        </div>
                    </div>
                </div>

                <!-- PANEL -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-orange"><i class="ion ion-pricetags newicon"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Products</span>
                            <span class="info-box-number">{{$pro_am}}
                                <small>Products</small></span>
                        </div>
                    </div>
                </div>

                <!-- PANEL -->
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="ion ion-document newicon"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Images</span>
                            <span class="info-box-number">{{$img_am}}
                                <small>Images</small></span>
                        </div>
                    </div>
                </div>

            </section>

            <div class="row">
                <!--BOX 1-->
                <div class="col-md-6">
                    <div class="box box-danger">
                        <div class="box-header with-border">
                            <h3 class="box-title">Latest Members</h3>

                            <!-- <div class="box-tools pull-right">
                              <!-- <span class="label label-danger">Lastest New Members</span>
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                              </button>
                              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                              </button>
                            </div> -->
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body no-padding">
                            <ul class="users-list clearfix">
                                @foreach($last_users as $user)
                                    <li>
                                        @if($user->profilepic != null)
                                            <img src="{{$user->profilepic}}" alt="User Image">
                                        @else
                                            <i class="ion-person" style="font-size: 30px;"></i>
                                        @endif

                                        <a class="users-list-name"
                                           href="{{route('acc.edit',$user->id)}}">{{$user->name}} <br>{{$user->surname}}
                                        </a>
                                        <span class="users-list-date">{{$user->created_at}}</span>
                                        <span class="users-list-date">[{{$user->roles}}]</span>
                                    </li>
                                @endforeach
                            </ul>
                            <!-- /.users-list -->
                        </div>

                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                            <a href="javascript:void(0)" class="uppercase">View All Users</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                </div>


                <!-- END BOX 1-->

                <!-- BOX 2 -->
                <div class="col-md-6">
                    <div class="box box-warning">
                        <div class="box-header with-border">
                            <h3 class="box-title">Latest Categories</h3>

                            <!-- <div class="box-tools pull-right">
                              <!-- <span class="label label-danger">Lastest New Members</span>
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                              </button>
                              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                              </button>
                            </div> -->
                        </div>
                        <!-- /.box-header -->

                        <div class="box-body no-padding">
                            <ul class="users-list clearfix">
                                @foreach($last_cat as $cat)
                                    <li>

                                        <i class="ion-soup-can" style="font-size: 30px;"></i>
                                        <a class="users-list-name" href="{{route('cat.edit',$cat->id)}}">{{$cat->name}}
                                            <br>{{$cat->description}}</a>
                                        <span class="users-list-date">{{$cat->created_at}}</span>
                                        <span class="users-list-date">[{{$cat->createby}}]</span>
                                    </li>
                                @endforeach
                            </ul>
                            <!-- /.users-list -->
                        </div>

                        <!-- /.box-body -->
                        <div class="box-footer text-center">
                            <a href="{{route('indexcat')}}" class="uppercase">View All Categories</a>
                        </div>
                        <!-- /.box-footer -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="info-box bg-yellow">
                        <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline newicon"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Dealer User</span>
                            <span class="info-box-number">{{$dealernumber}}</span>

                            <div class="progress">


                                <div class="progress-bar" style="width: {{$dealernumber*100/$u_am}}%"></div>

                            </div>
                            <span class="progress-description">
                                 {{$dealernumber*100.0/$u_am}}%

                  </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-box bg-green">
                        <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline newicon"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">User On Shopping</span>
                            <span class="info-box-number">{{$justuser}}</span>

                            <div class="progress">

                                <div class="progress-bar" style="width: {{$justuser*100.0/$u_am}}%"></div>

                            </div>
                            <span class="progress-description">

                                    {{$justuser*100.0/$u_am}}%

                  </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="info-box bg-aqua">
                        <span class="info-box-icon"><i class="ion ion-ios-pricetag-outline newicon"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Administrator</span>
                            <span class="info-box-number">{{$justadmin}}</span>

                            <div class="progress">

                                <div class="progress-bar" style="width: {{$justadmin*100.0/$u_am}}%"></div>

                            </div>
                            <span class="progress-description">
                               {{$justadmin*100.0/$u_am}}%
                  </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                </div>
            </div>
            <!--ROW END-->
        </div>
    </div>
@endsection