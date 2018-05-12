@extends('layouts.app')
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
               <h3>Upload Transfer Receipt</h3> <!-- <a href="{{ route('index') }}" class="label label-primary pull-right">Back</a> -->
            </div>
            <div class="panel-body">
                
                <form action="{{ route('transfer.order.pay') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }} 
              
              
                    
                   


                    <div class="form-group">
                        <label class="col-md-4 control-label" >Transfer Bank Account </label>

                        <div class="col-md-6">
                            <input data-preview="#preview" name="filepath" type="file" id="filepath" class="form-control" required>
                        </div>
                    </div>
                    <input type="hidden" id="name" class="form-control" name="name" value="{{$name}}"/>
                    <input type="hidden" id="orderid" class="form-control" name="orderid" value="{{$orderid}}"/>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-primary" value="Upload Receipt" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

