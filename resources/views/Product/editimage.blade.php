@extends('layouts.app')
<style>
    .hideplz {
        visibility: hidden;
    }
</style>
@section('content')
    <div class="container">
        <div class="">
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach()
                </div>
            @endif
            <div class="panel panel-default">
                <div class="panel-heading" style="padding: 25px;">
                    <h3> Add new Image of Product: {{$product->name}}</h3>
                    <form method="POST" action="{{ route('prod.image.add',$product->id) }}"
                          enctype="multipart/form-data">
                        @csrf

                        <br/>

                        <br/>
                        <div class="form-group">
                            <label class="col-form-label ">Additional Product photos (can attach more
                                than one):</label>
                            <br/>
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="file" name="images[]" multiple upload/>
                                </div>
                                <i class="fa fa-image" style="font-size:24px"></i>
                                &nbsp;<label>Picture required JPG,PNG,JPEG</label>
                            </div>


                        </div>

                        <div class="form-group  ">
                            <button type="submit" class="btn btn-primary">
                                Add new Image for this Product
                            </button>
                        </div>


                    </form>
                </div>
                <br/>

                <br/>

                <div class="panel-body" style="padding: 25px;">
                    <h3> Image of Product :{{$product->name}}</h3>
                    <br/>
                    <div class="row">

                        @foreach($images as $imglink)
                            <div class="col-md-4" style="padding:20px;">
                                <div class="thumbnail">
                                    {{--<a href="/w3images/lights.jpg">--}}
                                    <img src="{{asset($imglink->path)}}" style="width:100%">

                                    <div class="caption">

                                        <br/>
                                        <div class="text-lg-center">
                                            PICTURE ID {{$imglink->id}}
                                        </div>
                                        <br/>
                                        <a href="{{route('prod.image.set',[$imglink->id,$product->id])}}"
                                           class="btn btn-success">Set as Main Photo</a>
                                        <a href="{{route('prod.image.delete',[$imglink->id,$product->id])}}"
                                           onclick="return confirm('Are you sure to Remove this image? Once you done you cannot undo!')"
                                           class="btn btn-warning">Remove Image</a>
                                    </div>
                                    {{--</a>--}}
                                </div>
                            </div>
                        @endforeach
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection

