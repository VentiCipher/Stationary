@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-8 col-md-offset-2">
        <div class="pull-left">
            <h2>Course Info</h2>
        </div>
        <div class="pull-right">
            <a href="{{ URL::previous() }}" class="label label-primary pull-right"> Back</a>
        </div>
    </div>
</div>
&nbsp;
<div class="row">
    <div class= "col-md-8 col-md-offset-2">
        <div class="form-group">
            <strong>Course Name:</strong>
            {{ $courses->coursename }}
        </div>
    </div>
    <div class="col-md-8 col-md-offset-2">
        <div class="form-group">
            <strong>Owned By:</strong>
            {{ $courses->createby }}
        </div>
    </div>
    <div class="col-md-8 col-md-offset-2">
        <div class="form-group">
            <strong>Course Publish On:</strong>
            {{ $courses->created }}
        </div>
    </div>
    <div class="col-md-8 col-md-offset-2">
        <div class="form-group">
            <strong>Allow Register:</strong>
            @if($courses->allowregister == 1)
                Allowed Register
            @else
                Disallowed Register
            @endif
        </div>
    </div>
    <div class="col-md-8 col-md-offset-2">
        <div class="form-group">
            <strong>Your Enroll Status for this Course:</strong>
             
            @if($isregis >= 1)                 
            <strong>Registered</strong>
            @else                 
                <strong>Unregistered</strong>             
            @endif
             
            
        </div>
    </div>

             <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    <strong>Homework:</strong>
                    {{ $courses->homework }}
                </div>
            </div>
           <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    <strong>Assignments:</strong>
                    {{ $courses->assignments }}
                </div>
            </div>

             <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    <strong>Midterm:</strong>
                    {{ $courses->midterm }}
                </div>
            </div>
           
              <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    <strong>Final:</strong>
                    {{ $courses->final }}
                </div>
            </div>

  <div class="col-md-8 col-md-offset-2">
                <div class="form-group">
                    @if(!empty($courses->coursepdf))
                    <strong>Course Outline:</strong>
                    <a href="{{ route('user.courses.detail', $courses->id) }}" class="btn btn-warning">Detail</a>
                    @endif
                </div>
            </div>



</div>
@endsection