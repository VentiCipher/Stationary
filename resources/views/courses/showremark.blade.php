@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-lg-12">
   @if (Session::has('message1'))
    <div class="alert alert-info">{{ Session::get('message1') }}</div>
    @endif
    <!-- courses list -->
    @if(!empty($courses))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>All Available Courses List </h2>
                </div>
               
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
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
                                <a href="{{ route('admin.assignments.showremark', $post->id) }}" class="btn btn-success">See Remarks</a>   
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