@extends('layouts.adminapp')
<style>
.hideplz
{
    visibility: hidden;
}
</style>
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
               <h3> Add a Categories</h3> <a href="{{ route('index') }}" class="label label-primary pull-right">Back</a>
            </div>
            <div class="panel-body">
                
                <form action="{{ route('cat.update',$cat->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }} 
              
              
                    
                   


                    <div class="form-group">
                        <label class="col-md-4 control-label" >Categories Name </label>

                        <div class="col-md-6">
                            <input type="text" name="name" id="name" class="form-control" value="{{$cat->name}}">
                        </div>
                    </div>

                     <div class="form-group">
                        <label class="col-md-4 control-label" >Categories Description </label>

                        <div class="col-md-12">
                            <textarea id="description" name="description" class="form-control" style="    width: 75%;height: 30%;"  >{{$cat->description}}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-default" value="Update Categories" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

