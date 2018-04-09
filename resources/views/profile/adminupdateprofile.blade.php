@extends('layouts.app')

@section('content')
<style>
.hideplz
{
    visibility: hidden;
}
</style>
<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
               @if (Session::has('message1'))
                        <div class="alert alert-success">{{ Session::get('message1') }}</div>
              @endif
                @if (Session::has('error'))
                        <div class="alert alert-warning">{{ Session::get('error') }}</div>
                    @endif
            <div class="panel panel-default">

                <div class="panel-heading">Configuration Profile</div>
                   
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('admin.profile.update') }}">
                        {{ csrf_field() }}
                  
                 
                         <div class="form-group{{ $errors->has('pinid') ? ' has-error' : '' }}">
                           
                            <div class="col-md-6">
                                <input id="pinid" type="hidden" class="form-control" name="pinid" value="{{ $user->pinid}}" required >

                                @if ($errors->has('pinid'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('pinid') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         


                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name}}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                            <label for="surname" class="col-md-4 control-label">Surname</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control" name="surname" value="{{ $user->surname }}" required autofocus>

                                @if ($errors->has('surname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('surname') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email}}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('newid') }}">
                            <label for="name" class="col-md-4 control-label">New ID</label>

                            <div class="col-md-6">
                                <input id="newid" type="text" class="form-control" name="newid">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password" class="col-md-4 control-label">New Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" >

                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="confirm" class="col-md-4 control-label">Confirm New Password</label>

                            <div class="col-md-6">
                                <input id="confirm" type="password" class="form-control" name="confirm" >
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Update Profile
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
