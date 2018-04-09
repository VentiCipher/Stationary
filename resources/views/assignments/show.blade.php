@extends('layouts.app')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
@section('content')
<div class="container">
    <div class="col-lg-12">
   @if (Session::has('message1'))
    <div class="alert alert-info">{{ Session::get('message1') }}</div>
    @endif
    @if (Session::has('error'))
    <div class="alert alert-warning">{{ Session::get('error') }}</div>
    @endif
    <!-- members list -->
    
        <div class="row animated bounceInRight">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Assignment Information</h2>
                </div>
            </div>
<br></br>
                    <div class= "col-md-8 ">
                <div class="form-group">
                    <strong>Assignment Name:</strong>
                    {{  $asninfo->name }}
                </div>
            </div>
             <div class="col-md-8 ">
                <div class="form-group">
                    <strong>Language</strong>
                    {{ $asninfo->language }}
                </div>
            </div>
             <div class="col-md-8 ">
                <div class="form-group">
                    <strong>Start Time:</strong>
                    {{ $asninfo->starttime }}
                </div>
            </div>
             <div class="col-md-8 ">
                <div class="form-group">
                    <strong>End time:</strong>
                    {{ $asninfo->endtime }}
                </div>
            </div>
             <div class="col-md-8 ">
                <div class="form-group">
                    <strong>Fullscore:</strong>
                    {{ $asninfo->fullscore }}
                </div>
            </div>
             <div class="col-md-8 ">
                <div class="form-group">
                    <strong>Max Attempts</strong>

                    {{ $asninfo->max_attempts }}
                </div>
            </div>
            <div class="col-md-8 ">
                <div class="form-group">
                    <strong>File Path Set 1</strong>

                     <a href="{{ route('admin.assignments.callmaster1', $asninfo->id) }}" class="label label-warning">Input</a>
                     <a href="{{ route('admin.assignments.callout1', $asninfo->id) }}" class="label label-warning">Output</a>
                </div>
            </div>
            <div class="col-md-8 ">
                <div class="form-group">
                    <strong>File Path Set 2</strong>

                     <a href="{{ route('admin.assignments.callmaster2', $asninfo->id) }}" class="label label-warning">Input</a>
                     <a href="{{ route('admin.assignments.callout2', $asninfo->id) }}" class="label label-warning">Output</a>
                </div>
            </div>
            <div class="col-md-8 ">
                <div class="form-group">
                    <strong>File Path Set 3</strong>

                     <a href="{{ route('admin.assignments.callmaster3', $asninfo->id) }}" class="label label-warning">Input</a>
                     <a href="{{ route('admin.assignments.callout3', $asninfo->id) }}" class="label label-warning">Output</a>
                </div>
            </div>
            <div class="col-md-8 ">
                <div class="form-group">
                    <strong>File Path Set 4</strong>

                     <a href="{{ route('admin.assignments.callmaster4', $asninfo->id) }}" class="label label-warning">Input</a>
                     <a href="{{ route('admin.assignments.callout4', $asninfo->id) }}" class="label label-warning">Output</a>
                </div>
            </div>
            <div class="col-md-8 ">
                <div class="form-group">
                    <strong>File Path Set 5</strong>

                     <a href="{{ route('admin.assignments.callmaster5', $asninfo->id) }}" class="label label-warning">Input</a>
                     <a href="{{ route('admin.assignments.callout5', $asninfo->id) }}" class="label label-warning">Output</a>
                </div>
            </div>
            <div class="col-md-8 ">
                <div class="form-group">
                    <strong>Create By:</strong>
                    {{ $asninfo->createby }}
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <strong>Created On:</strong>
                    {{ $asninfo->created_at }}
                </div>
            </div>
            <div class="col-md-8 ">
                <div class="form-group">
                    <strong>Allow Send:</strong>
                    @if( $asninfo->allow_send == 1)
                        Allowed Send
                    @else
                        Disallowed Send
                    @endif
                </div>
            </div>
            <div class="col-md-8 ">
                <div class="form-group">
                    <strong>Send Amount : </strong>
                    {{$amount}}
                </div>
            </div>
        </div>

        <div class="row">
             <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Assignment [{{$amount}} Sent] [Enroll: {{$allenroll}}] </h2>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table table-striped task-table">
                    <!-- Table Headings -->
                    <thead>
                         <th width="10%">#</th>
                        <th width="15%">Name</th>
                        <th width="15%">ID</th>
                        <th width="20%">Score</th>
                        <th width="20%">Upload at</th>
                        <th width="20%">Action</th>
                    </thead>
    
                    <!-- Table Body -->
                    <tbody>
                       
                         
                            <tr>
                               
                              
                        <?php $num = 1; ?>      
                         
                        @foreach($data as $euler)
                         <td class="table-text">
                                   <!-- <div>{{$euler->id}}</div>-->
                                   <div>{{$num}}</div>
                                   <?php $num++ ?>
                                </td>

                                <td class="table-text">
                                    <div>{{$euler->name}}</div>
                                </td>
                               <td class="table-text">
                                    <div>{{$euler->pinid}}</div>
                                </td>
                               <td class="table-text">
                                    <div>{{$euler->scores}}</div>
                                </td>
                                 <td class="table-text">
                                    <div>{{$euler->created_at}}</div>
                                </td>
                               <td>
                              
                          
                          
                               
                                 <a href="{{ route('admin.assignments.callpath', $euler->id) }}" class="label label-success">Show</a>   
                                 <!-- <a href="{{ route('admin.assignments.droper', $euler->id) }}" class="label label-danger" 
                                  onclick="return confirm('Are you sure to delete this assignment? Once you done you cannot undo')"
                                  >Drop Assignment</a>   -->

                                </td>

                            </tr>
                       
                       
                                 
                    
                     @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    
    </div>
</div>
@endsection