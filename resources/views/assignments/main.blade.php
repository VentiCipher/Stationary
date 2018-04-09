@extends('layouts.app')
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
@section('content')
<div class="container">
    <div class="col-lg-12">
   @if (Session::has('message1'))
    <div class="alert alert-danger">{{ Session::get('message1') }}</div>
    @endif
    <!-- courses list -->
    @if(!empty($asn))
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left animated fadeInRight">
                    <h2>Assignment List of {{$course}}</h2>
                    
                </div>
               
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <table class="table table-striped task-table animated fadeInUp">
                    <!-- Table Headings -->
                    <thead>
                        <th width="20%">Assignment Name</th>
                        <th width="10%">Language</th>
                        <th width="20%">Available at</th>
                        <th width="20%">End Date</th>
                        <th width="30%">Action</th>
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
                                <div>{{$post->starttime}} </div>
                            </td>
                                <td class="table-text">
                                <div>{{$post->endtime}}</div>
                            </td>
                            <td>
                                <a href="{{ route('user.assignments.score', $post->id) }}" class="btn btn-danger">Score</a>
                                <a href="{{ route('user.assignments.detail', $post->id) }}" class="btn btn-warning">Question</a>
                                @if($post->allow_send == 1)
                                <a href="{{ route('user.assignments.submit',$post->id) }}" class="btn btn-success">Submit</a>
                                @else
                                <a href="#" class="btn btn-danger">Time's Up</a>
                                @endif
                               
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