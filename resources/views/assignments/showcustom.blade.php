@extends('layouts.app')

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
    
        <div class="row">
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
                    <strong>Status for send now:</strong>
                    @if( $asninfo->allow_send == 1)
                        Allowed Send
                    @else
                        Disallowed Send
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
             <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Assignment</h2>
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
                              
                          
                          
                               
                                 <a href="{{ route('user.assignments.callpath', $euler->id) }}" class="btn btn-success">Show</a>   
              

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