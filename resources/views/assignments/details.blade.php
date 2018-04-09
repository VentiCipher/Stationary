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
                    {{  $data->name}}
                </div>
            </div>
            <div class="col-md-8 ">
                <div class="form-group">
                    <strong>Create By:</strong>
                    {{ $data->createby }}
                </div>
            </div>
            <div class="col-md-8">
                <div class="form-group">
                    <strong>Created On:</strong>
                    {{ $data->created_at}}
                </div>
            </div>
            <div class="col-md-8 ">
                <div class="form-group">
                    <strong>Allow Send:</strong>
                    @if( $data->allow_send == 1)
                        Allowed Register
                    @else
                        Disallowed Register
                    @endif
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
                    @foreach($data['users'] as $k => $v)
                        
                        @foreach($v as $key => $value)       
                         
                            <tr>
                               
                              
                              
                          
                        @foreach($block as $euler)
                         
                            @if($euler->noid == $value)
                            
                                <td class="table-text">
                                    <div>{{$euler->name}}</div>
                                </td>
                              
                              
                          
                          
                                <td class="table-text">
                                    <div>{{$euler->surname}}</div>
                                </td>
                               <td class="table-text">
                                    <div>{{$value}}</div>
                                </td>
                               <td>
                                    <a href="{{ route('admin.profile.request', $value) }}" class="label label-success">Configure</a>   
                                  

                                    <a href="{{ route('admin.profile.drop', $value) }}" class="label label-danger" onclick= "return confirm('Are you sure to drop this user {{$value}}? Once you done you cannot undo')" ; style="color: #fff;">Drop User</a>
                                </td>

                            </tr>
                       
                                @endif
                                
                        @endforeach 
                        @endforeach 
                         
                     @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    
    </div>
</div>
@endsection