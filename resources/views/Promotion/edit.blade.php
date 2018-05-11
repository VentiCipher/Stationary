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
               <h3> Edit a Coupon/Promotion</h3> <!-- <a href="#" class="label label-primary pull-right">Back</a> -->
            </div>
            <div class="panel-body">
                
                <form action="{{ route('promo.update') }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                    {{ csrf_field() }} 
              
              
                    
                   


                    <div class="form-group">
                        <label class="col-md-4 control-label" >Coupon Code </label>

                        <div class="col-md-6">
                            <input type="text" required name="promocoder" id="promocoder" class="form-control" value="{{$promotion->promocoder}}">
                        </div>
                    </div>


                     <div class="form-group">
                        <label class="col-md-4 control-label" >Coupon information </label>

                        <div class="col-md-12">
                            <textarea id="info" name="info" class="form-control" style="    width: 75%;height: 30%;" required >{{$promotion->info}}</textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label" >Discount </label>

                        <div class="col-md-6">
                            <input type="text" name="salemore" id="salemore" class="form-control" value="{{$promotion->salemore}}">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" >Limit use </label>

                        <div class="col-md-6">
                            <input type="number" name="limit" id="limit" class="form-control" value="{{$promotion->limit}}">

                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label" >Free-ship </label>

                        <div class="col-md-6">
                            <input type="number" name="freeship" id="freeship" class="form-control" value="{{$promotion->freeship}}">

                        </div>
                    </div>

                    <input type="hidden" name="createby" id="createby" value="{{Auth::user()->name}}" class="form-control">
                    <input type="hidden" name="id" id="id" value="{{$promotion->id}}" class="form-control">

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <input type="submit" class="btn btn-default" value="Edit Coupon" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

