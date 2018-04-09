@extends('layouts.app')
<style>
.hideplz
{
    margin:0px;
    visibility: hidden;
}

</style>
@section('content')

<div class="container">

    <div class="row">

        <div class="col-md-8 col-md-offset-2">
                    @if (Session::has('message1'))
                        <div class="alert alert-info">{{ Session::get('message1') }}</div>
                    @endif
                     @if (Session::has('error'))
                        <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif
            <div class="panel panel-default">
                  
                <div class="panel-heading">Course Enroll Authorization</div>

                <div class="panel-body">
                   
                      <form class="form-horizontal" role="form" method="POST" action="{{ route('user.courses.enroll',$ids->id) }}"> 
                        {{ csrf_field() }}
                       
                        <div class="col-md-1">
                            <strong>Course  {{$ids->coursename}}</strong> 
                                <input id="ider" type="text" class="form-control hideplz" name="ider" value = "{{$ids->id}}">
                        </div>
                    
                         &nbsp;
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Course Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                       <!-- <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Edit Course
                                </button>

                            </div> 
                        </div> !-->
                      <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure to Enroll this course ?')">
                                    Enroll Course
                                </button>

                            
                            </div>
                        </div>
                    </form>


                </div>
            </div>
        </div>

     <!--   <a href="/admin/Course/courselist">Course Management</a> -->
    </div>
</div>
@endsection
