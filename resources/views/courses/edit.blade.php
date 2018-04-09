@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-lg-12">
        @if($errors->any())
            <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach()
            </div>
        @endif
        <div class="panel panel-default">
            <div class="panel-heading">
                Edit Course <a href="{{ route('admin.courses.index') }}" class="label label-primary pull-right">Back</a>
            </div>
            <div class="panel-body">
                @if (Session::has('message1'))
                        <div class="alert alert-info">{{ Session::get('message1') }}</div>
                    @endif
                <form action="{{ route('admin.courses.update', $courses->id) }}" method="POST" class="form-horizontal " enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label class="control-label col-sm-4" >Course Name</label>
                        <div class="col-sm-6">
                            <input type="text" name="coursename" id="coursename" class="form-control" value="{{ $courses->coursename }}">
                        </div>
                    </div>
                   <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Course Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Course Password</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group">
                        <label class="col-md-4 control-label" >Allow Register ?</label>

                        <div class="col-md-6">
                              <input name="allowregister" type="checkbox" ">

                        </div>
                    </div>

 <div class="form-group">
                        <label class="col-md-4 control-label" >Full Homework (Percents or Scores or Text)</label>

                        <div class="col-md-1">
                            <input type="text" name="homework" id="homework" class="form-control">
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-md-4 control-label" >Full assignments (Percents or Scores or Text) </label>

                        <div class="col-md-1">
                            <input type="text" name="assignments" id="assignments" class="form-control">
                        </div>
                    </div>
                     <div class="form-group">
                        <label class="col-md-4 control-label" >Full Midterm (Percents or Scores or Text) </label>

                        <div class="col-md-1">
                            <input type="text" name="midterm" id="midterm" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" >Full Final (Percents or Scores or Text) </label>

                        <div class="col-md-1">
                            <input type="text" name="final" id="final" class="form-control">
                        </div>
                    </div>
                   
                 
                   <div class="form-group">
                        <label class="col-md-4 control-label" >Course Outline File</label>

                        <div class="col-md-1">
                             <input class="field" id = "coursepdf" name="coursepdf" type="file" >
                        </div>
                    </div>


                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-default" value="Update Course" />

                             <a href="{{ route('admin.courses.delete', $courses->id) }}" class="btn btn-default label-danger "" onclick="return confirm('Are you sure to delete this course? Once you done you cannot undo')" ; style="
    color: #fff;">Delete Courses</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection