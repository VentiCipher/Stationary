@extends('layouts.app')

@section('content')

<script src="components/c3/c3.min.js"></script>
<script src="components/d3/d3.min.js"></script>
<script src="components/jquery-match-height/dist/jquery.matchHeight-min.js"></script>

<style>
.modithead
{
    height: 33%;
    overflow-y:auto;
}
.modithead2
{
    height: 24%;
    overflow-y:auto;
}
.fontmodit
{
    width: 100%;
    max-width: 100%;
    margin-bottom: 0px;
    font-size: 10;
}



.load-bar {
  position: relative;
  margin-top: 20px;
  width: 100%;
  height: 6px;
  background-color: #fdba2c;
}
.bar {
  content: "";
  display: inline;
  position: absolute;
  width: 0;
  height: 100%;
  left: 50%;
  text-align: center;
}
.bar:nth-child(1) {
  background-color: #da4733;
  animation: loading 6s linear infinite;
}
.bar:nth-child(2) {
  background-color: #3b78e7;
  animation: loading 6s linear 1s infinite;
}
.bar:nth-child(3) {
  background-color: #fdba2c;
  animation: loading 6s linear 2s infinite;
}
@keyframes loading {
    from {left: 50%; width: 0;z-index:100;}
    33.3333% {left: 0; width: 100%;z-index: 10;}
    to {left: 0; width: 100%;}
}

</style>
<div class="container">

    <div class="row">
<!--col-md-offset-2-->
        <div class="col-md-8 ">

            <div class="panel panel-default">

                <div class="panel-heading">Administrator Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                   Welcome You are logged in as Administrator <strong> {{Auth::user()->name }} {{Auth::user()->surname}} </strong>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default animated zoomIn">
                <div class="panel-heading">Current Server Date Time</div>

                <div class="panel-body">
                   Current Date: {{$date}} | Page Load at: {{$time}}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="panel panel-default animated zoomIn">
                <div class="panel-heading">System Statistics</div>

                <div class="panel-body">
                   Administrator: {{$aamount}} users <br><br>
                   Users: {{$uamount}} users <br><br>
                   Total: {{$allamount}} users
                </div>
            </div>
        </div>
         <div class="col-md-8 modithead">
            <div class="panel panel-default animated zoomIn">
                <div class="panel-heading">Administrator Listing</div>

                <div class="panel-body ">
                     <table class="table table-striped task-table fontmodit">
                  <thead>
                     <th width="20%">#</th>
                        <th width="30%">Name</th>
                        <th width="25%">Surname</th>
                        <th width="15%">ID</th>
                       
                    </thead>
 <tbody>
                       
                         
                            <tr>
                               
                              
                              
                          
                        @foreach($admindata as $euler)
                           <td class="table-text">
                                    <div>{{$euler->id}}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{$euler->name}}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{$euler->surname}}</div>
                                </td>
                               <td class="table-text">
                                    <div>{{$euler->pinid}}</div>
                                </td>

                            </tr>
                       
                  
                         
                     @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>


   <div class="panel panel-default col-xs-12 col-sm-12 col-md-12 modithead2">
              <div class="panel-heading">Announcement</div>
                <div class="panel-body ">
                     <table class="table table-striped task-table fontmodit">
                  <!--<thead>
                     <th width="20%">#</th>
                        <th width="30%">Announcement</th>
                        <th width="25%">Update By</th>
                        <th width="15%">Action</th>
                    </thead>-->
 <tbody>
                       
                         
                            <tr>
                               COMING SOON
                              </tr>

                
                 <div class="load-bar">
                      <div class="bar"></div>
                      <div class="bar"></div>
                      <div class="bar"></div>
                    </div>
                    </tbody>
                    
                    </table>
                </div>

               </div>




         <div class="panel panel-default col-xs-12 col-sm-12 col-md-12">
              <div class="panel-heading">All Courses Open Register</div>
                <table class="table table-striped task-table">
                    <!-- Table Headings -->
                    <thead>
                        <th width="40%">Course Name</th>
                        <th width="25%">Modified By</th>
                        <th width="15%">Created</th>
                        <th width="20%">Action</th>
                    </thead>
    
                    <!-- Table Body -->
                    <tbody>
                    @foreach($courses as $post)
                        <tr>
                            <td class="table-text">
                                <div>{{$post->coursename}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$post->createby}} : {{$post->modifed_at}}</div>
                            </td>
                                <td class="table-text">
                                <div>{{$post->created_at}}</div>
                            </td>
                            <td>
                                <a href="{{ route('admin.courses.details', $post->id) }}" class="label label-success">Details</a>
                               <!-- <a href="{{ route('admin.courses.request', $post->id) }}" class="label label-warning">Edit</a>
                                <a href="{{ route('admin.assignments.request', $post->id) }}" class="label label-warning">Assignment</a>-->
                               
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

     <!--   <a href="/admin/Course/courselist">Course Management</a> -->
    </div>
</div>
@endsection




<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>

    $(document).ready(function(){
        $('#sidebar-btn').click(function(){
            $('#sidebar').toggleClass('visible');
        });
    });

    </script>