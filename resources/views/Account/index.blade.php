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
         .newicon
         {
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
        <h2>Users Overview</h2>
        <br>
        <section class="content">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">All Users</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap"><div class="row"><div class="col-sm-6"></div><div class="col-sm-6"></div></div><div class="row"><div class="col-sm-16" style="width:100%;"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                <thead>
                <tr role="row">
                  <th>
                    Name
                  </th>
                  <th>
                    Surname
                  </th>
                  <th>Gender</th>
                  <th>Email</th>
                  <th>Roles</th>
                  <th>Age</th>
                  <th>Option</th>
                </tr>
                </thead>
                <tbody>
                
                
                @foreach($users as $usr)
                <tr role="row" class="odd">
                  <td>{{$usr->name}}</td>
                  <td>{{$usr->surname}}</td>
                  <td>{{$usr->gender}}</td>
                  <td>{{$usr->email}}</td>
                  <td>{{$usr->roles}}</td>
                  <td>{{$usr->age}}</td>
                  <td><a href ="{{route('acc.edit',$usr->id)}}" class="badge badge-primary">Edit</a> 
                    <a href = "{{route('acc.delete',$usr->id)}}" class="badge badge-danger"  onclick="return confirm('Are you sure to Remove this user? Once you done you cannot undo!')" >Remove</a>
                    @if($usr->roles != 'admin')
                      <a href ="{{route('acc.promote.admin',$usr->id)}}" class="badge badge-success">Promote Admin</a> 
                    @endif
                    @if($usr->roles == 'user')
                    <a href ="{{route('acc.promote.seller',$usr->id)}}" class="badge badge-warning">Promote Dealer</a> 
                    @endif

                  </td>
                    
                </tr>
                @endforeach
               </tbody>

                <tfoot>
                <tr>
                  <th>
                    Name
                  </th>
                  <th>
                    Surname
                  </th>
                  <th>Gender</th>
                  <th>Email</th>
                  <th>Roles</th>
                  <th>Age</th>
                    <th>Option</th>
                </tr>
                </tfoot>
              </table></div></div>
            </div>
            <!-- /.box-body -->
          </div>
        </section>
     <script src="{{asset('css/jquerydataTables.min.js')}}"></script>
      <script src="{{asset('css/dataTables.bootstrap.min.js')}}"></script>
      <script src="{{asset('css/jquery.slimscroll.min.js')}}"></script>
      <script src="{{asset('js/fastclick.js')}}"></script>
      
@endsection