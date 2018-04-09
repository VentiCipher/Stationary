@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-lg-12">
   @if (Session::has('message1'))
    <div class="alert alert-info">{{ Session::get('message1') }}</div>
    @endif
    <!-- courses list -->
    @if(!empty($data))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>All Users List </h2>
                </div>
                
            </div>
        </div>
         <div class="row">
             <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Users Information</h2>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table table-striped task-table">
                    <!-- Table Headings -->
                    <thead>
                         <th width="10%">#</th>
                        <th width="20%">Name</th>
                        <th width="20%">SurName</th>
                        <th width="20%">ID</th>
                        <th width="20%">Create at</th>
                        <th width="10%"> Action </th>
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
                                    <div>{{$euler->surname}}</div>
                                </td>
                               <td class="table-text">
                                    <div>{{$euler->pinid}}</div>
                                </td>
                              
                                 <td class="table-text">
                                    <div>{{$euler->created_at}}</div>
                                </td>
                                <td>
                                    <a href="{{ route('admin.profile.requestupdate', $euler->pinid) }}" class="label label-success">Configure</a>   
                                </td>

                            </tr>
                       
                       
                                 
                    
                     @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    </div>
</div>
@endsection