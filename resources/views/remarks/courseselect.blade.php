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
    <!-- courses list -->
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left animated fadeInLeft"">
                    <h2>My Enrolled Course List </h2>
                    @if (sizeof($courses) > 0)
                        <h3>{{sizeof($courses)}} Courses</h3>
                    @else
                        <h3>No Course Enroll</h3>
                    @endif
                    
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table table-striped task-table animated fadeInUp"">
                    <!-- Table Headings -->
                    <thead>
                        <th width="40%">Course Name</th>
                        <th width="25%">Course Owned By</th>
                        <th width="15%">Created</th>
                        <th width="20%">Action</th>
                    </thead>
    
                    <!-- Table Body -->
                    <tbody>
                    @foreach($courses as $course)
                        
                       
                            <tr>
                                <td class="table-text">
                                    <div>{{$course->coursename}}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{$course->createby}}</div>
                                </td>
                                    <td class="table-text">
                                    <div>{{$course->created_at}}</div>
                                </td>
                                <td>
                                    <a href="{{ route('user.grades.allscore', $course->id) }}" class="btn btn-success">Score</a>   
                                    <a href=" {{route('user.grades.allscore',$course->id)}}" class="btn btn-warning">Grade</a>   
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