@extends('layouts.app')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
@section('content')
<style>
.modithead
{
    height: 24%;
    overflow-y:auto;
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
         @if (session('message1'))
                        <div class="alert alert-success">
                            {{ session('message1') }}
                        </div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-warning">{{ Session::get('error') }}</div>
                    @endif
        <div class="col-md-8 ">
            <div class="panel panel-default animated zoomIn">

                <div class="panel-heading">Student Dashboard</div>

                <div class="panel-body">
                   

                    Welcome {{Auth::user()->pinid}} logged in as {{Auth::user()->name }} {{Auth::user()->surname}}
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


        <div class="panel panel-default col-xs-12 col-sm-12 col-md-12">
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
                               ⚠ Announcement: Now You can access "plab.colonel-tech.com" from anywhere even from faculty! <br>
                              <br> *Note: programming.engr.tu.ac.th/plab can access only from Engineering Faculty
                              <br>Announcement By PPromsurin<br>
                            <br>
                             ⚠ Announcement: A05_P03 of CN302 has Fixed for Wrong output Files<br>
                              Responsible to Pheehandy Fixed and Updated By PPromsurin<br>
                            <br>
                             ⚠ Announcement: A06_P03 of CN302 has Fixed for Wrong output Files<br>
                              Responsible to Pheehandy Fixed and Updated By PPromsurin<br>
                            <br>
                             ⚠ Announcement: A06_P04 of CN302 has Fixed for Wrong output Files<br>
                              Responsible to Pheehandy Fixed and Updated By PPromsurin<br>
                            </tr>



                         <!--     
                          
                        @foreach($anndata as $euler)
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
                 -->
               <!--  <div class="load-bar">
                      <div class="bar"></div>
                      <div class="bar"></div>
                      <div class="bar"></div>
                    </div>-->
                    </tbody>
                    
                    </table>
                </div>

               </div>
             
        <div class="panel panel-default col-xs-12 col-sm-12 col-md-12">
              <div class="panel-heading">Incoming Due Assignment</div>
                <table class="table table-striped task-table animated fadeInUp">
                    <!-- Table Headings -->
                    <thead>
                        <th width="20%">Course Name</th>
                        <th width="20%">Assignment Name</th>
                        <th width="20%">Available at</th>
                        <th width="20%">End Date</th>
                        <th width="20%">Action</th>
                    </thead>
    
                    <!-- Table Body -->
                    <tbody>
                    @foreach($asn as $post)
                     @foreach($courses as $data)
                      @if($data->id == $post->courses_id)
                        <tr>
                            
                           
                            <td class="table-text">
                                <div>{{$data->coursename}}</div>
                            </td>
                            
                            <td class="table-text">
                                <div>{{$post->name}} : [ {{$post->language}} ]</div>
                            </td>
                            <td class="table-text">
                                <div>{{$post->starttime}} </div>
                            </td>
                                <td class="table-text">
                                <div>{{$post->endtime}}</div>
                            </td>
                            <td>
                                <a href="{{ route('user.assignments.score', $post->id) }}" class="label label-danger">Score</a>
                                <a href="{{ route('user.assignments.detail', $post->id) }}" class="label label-warning">Question</a>
                                 <a href="{{ route('user.assignments.submit',$post->id) }}" class="label label-success">Submit</a>
                                <!-- <a href="{{ route('user.assignments.indexmy',$data->id) }}" class="label label-success">See Details</a>-->
                               
                                
                                
                               
                            </td>
                        </tr>
                      @endif
                            @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
</div>
@endsection
