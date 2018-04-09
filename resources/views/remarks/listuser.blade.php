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
                    <h2>Course Information</h2>
                </div>
            </div>
<br></br>
                    <div class= "col-md-8 ">
                <div class="form-group">
                    <strong>Course Name:</strong>
                    {{  $course->coursename }}
                </div>
            </div>
            <div class="col-md-8 ">
                <div class="form-group">
                    <strong>Create By:</strong>
                    {{ $course->createby }}
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <strong>Created On:</strong>
                    {{ $course->created }}
                </div>
            </div>


        </div>

        <div class="row">
             <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Course Members</h2>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table table-striped task-table">
                    <!-- Table Headings -->
                    <thead>
                        <th width="40%">Name</th>
                        <th width="25%">Surname</th>
                        <th width="15%">ID</th>
                        <th width="20%">Action</th>
                    </thead>
    
                    <!-- Table Body -->
                    <tbody>
                       
                         
                            <tr>
                               
                              
                              
                          
                        @foreach($users as $euler)
                          
                                <td class="table-text">
                                    <div>{{$euler->name}}</div>
                                </td>
                              
                              
                          
                          
                                <td class="table-text">
                                    <div>{{$euler->surname}}</div>
                                </td>
                               <td class="table-text">
                                    <div>{{$euler->pinid}}</div>
                                </td>
                               <td>
                                    <a href="{{ route('admin.remarks.requestmark',['courseid'=>$course->id, 'pinid'=>$euler->pinid]) }}" class="label label-success">See Marks</a>   
                                  

                                   <!-- <a href="{{ route('admin.profile.drop', $euler->pinid) }}" class="label label-danger" onclick= "return confirm('Are you sure to drop this user {{$euler->pinid}} ? Once you done you cannot undo')" ; style="color: #fff;">Drop User</a>-->
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