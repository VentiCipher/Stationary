@extends('layouts.sellerapp')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Add Product</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('prod.show.create') }}" enctype="multipart/form-data">
                            @csrf


                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">In Stock</label>
                                <div class="col-md-6">
                                    <input id="in_stock" type="number"
                                           class="form-control{{ $errors->has('in_stock') ? ' is-invalid' : '' }}"
                                           name="in_stock" required>

                                    @if ($errors->has('in_stock'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('in_stock') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Description</label>


                                <div class="col-md-8">
                                    <textarea id="description" name="description" class="form-control"
                                              style="    width: 75%;height: 70%;"></textarea>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Color</label>
                                <div class="col-md-6">
                                    <input id="color" type="text"
                                           class="form-control{{ $errors->has('color') ? ' is-invalid' : '' }}"
                                           name="color">


                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Price</label>
                                <div class="col-md-6">
                                    <input id="price" type="number"
                                           class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}"
                                           name="price" required>

                                    @if ($errors->has('price'))
                                        <span class="invalid-feedback">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">Price on Promotion</label>
                                <div class="col-md-6">
                                    <input id="price_promo" type="number"
                                           class="form-control{{ $errors->has('price_promo') ? ' is-invalid' : '' }}"
                                           name="price_promo" >


                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="promotion_id" class="col-md-4 col-form-label text-md-right">Promotion
                                    ID</label>
                                <div class="col-md-6">
                                    <input id="promotion_id" type="text"
                                           class="form-control{{ $errors->has('promotion_id') ? ' is-invalid' : '' }}"
                                           name="promotion_id">


                                </div>


                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Product photos (can attach more
                                    than one):</label>
                                <div class="col-md-6">


                                    <input type="file" name="images[]" multiple upload/>


                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="categories" class="col-md-4 col-form-label text-md-right">Categories</label>
                                <div class="col-md-6">

                                    {{--<select multiple="multiple" name="cat[]" id="categories" style="    width: 100%;">--}}
                                    {{--<label class="col-md-4 control-label" >Categories Name </label>--}}
                                    {{--@foreach($allcat as $aKey )--}}

                                    {{--<option value="{{$aKey->name}}" >{{$aKey->name}}</option>--}}

                                    {{--@endforeach--}}
                                    {{--</select>--}}
                                    @foreach($allcat as $aKey )
                                        <input type="checkbox" name="categories[]"
                                               value="{{$aKey->id}}"> {{$aKey->name}}<br>

                                    @endforeach

                                </div>

                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Add Product
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
