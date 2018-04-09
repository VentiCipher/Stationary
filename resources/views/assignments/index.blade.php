@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-lg-12">
   @if (Session::has('message1'))
    <div class="alert alert-info">{{ Session::get('message1') }}</div>
    @endif
    <!-- courses list -->
    @if(!empty($asn))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Assignment List of {{$course->coursename}}</h2>
                    
                </div>
                <div class="pull-right">

                    <a class="btn btn-success" href="{{ route('admin.assignments.add',$course->id) }}"> Add New</a>
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table table-striped task-table">
                    <!-- Table Headings -->
                    <thead>
                        <th width="20%">Assignment Name</th>
                        <th width="20%">Language</th>
                        <th width="25%">Created By</th>
                        <th width="15%">Created</th>
                        <th width="20%">Action</th>
                    </thead>
    
                    <!-- Table Body -->
                    <tbody>
                    @foreach($asn as $post)
                        <tr>
                            <td class="table-text">
                                <div>{{$post->name}}</div>
                            </td>
                             <td class="table-text">
                                <div>{{$post->language}}</div>
                            </td>
                            <td class="table-text">
                                <div>{{$post->createby}} </div>
                            </td>
                                <td class="table-text">
                                <div>{{$post->created_at}}</div>
                            </td>
                            <td>
                                 <a href="{{ route('admin.assignments.show', $post->id) }}" class="label label-success">Detail</a>
                                <a href="{{ route('admin.assignments.editreq', $post->id) }}" class="label label-success">Edit</a>
                                <a href="{{ route('admin.assignments.detail', $post->id) }}" class="label label-warning">Question</a>
                                 <a href="{{ route('admin.assignments.drop', $post->id) }}" class="label label-danger" onclick= "return confirm('Are you sure to drop this Assignment ? {{$post->name}} ? Once you done you cannot undo')" ; style="color: #fff;">Delete</a>
                            
                               
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