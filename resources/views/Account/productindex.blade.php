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
    <div class="container">
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
    </div> -->
            @if (Session::has('info'))
                <div class=" alert alert-info">{{ Session::get('info') }}</div>
            @endif
            <h2>Product Overview</h2>
            <br>
            <section class="content">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">All Product</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                            <div class="row">
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6"></div>
                            </div>
                            <div class="row">
                                <div class="col-sm-16" style="width:100%;">
                                    <table id="example2" class="table table-bordered table-hover dataTable" role="grid"
                                           aria-describedby="example2_info">
                                        <thead>
                                        <tr role="row">
                                            <th>Thumbnail</th>
                                            <th>
                                                Name
                                            </th>
                                            <th>
                                                IN STOCK
                                            </th>
                                            <th>Price</th>
                                            <th>Owner</th>
                                            <th>Color</th>
                                            <th>Promotion ID</th>
                                            <th>Option</th>

                                        </tr>
                                        </thead>
                                        <tbody>


                                        @foreach($products as $prod)
                                            <tr role="row" class="odd">
                                                <td>
                                                    <div class="thumbnail" style="text-align:center;">
                                                        {{--<a href="/w3images/lights.jpg">--}}
                                                        @if($prod->thumbsnail)
                                                            <img src="{{asset($prod->thumbsnail)}}" style="height:20%; ">
                                                        @else
                                                            <a href="{{route('prod.image.index',$prod->id)}} " class="btn btn-success">Set Thumbnail</a>
                                                        @endif
                                                    </div>
                                                </td>
                                                <td>{{$prod->name}}</td>
                                                <td>{{$prod->in_stock}}</td>
                                                <td>{{$prod->price}}</td>
                                                <td>{{$prod->createby}}</td>
                                                <td>{{$prod->color}}</td>
                                                <td>{{$prod->promotion_id}}</td>
                                                <td><a href="{{route('prod.show.edit',$prod->id)}}"
                                                       class="badge badge-primary">Edit/Details</a>
                                                    <br/><br/>
                                                    <a href="{{route('prod.delete',$prod->id)}}"
                                                       class="badge badge-danger"
                                                       onclick="return confirm('Are you sure to Remove this Product? Once you done you cannot undo!')">Remove</a>
                                                    <br/><br/>
                                                    <a href="{{route('prod.image.index',$prod->id)}}" class="badge badge-warning">Edit Image</a>


                                                </td>


                                            </tr>
                                        @endforeach
                                        </tbody>

                                        <tfoot>
                                        <tr>
                                            <th>Thumbnail</th>
                                            <th>
                                                Name
                                            </th>
                                            <th>
                                                IN STOCK
                                            </th>
                                            <th>Price</th>
                                            <th>Owner</th>
                                            <th>Color</th>
                                            <th>Promotion ID</th>
                                            <th>Option</th>

                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                    </div>
            </section>
            <script src="{{asset('css/jquerydataTables.min.js')}}"></script>
            <script src="{{asset('css/dataTables.bootstrap.min.js')}}"></script>
            <script src="{{asset('css/jquery.slimscroll.min.js')}}"></script>
            <script src="{{asset('js/fastclick.js')}}"></script>

@endsection