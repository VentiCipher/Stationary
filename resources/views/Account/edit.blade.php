@extends('layouts.adminapp')

<head>
    <meta charset="UTF-8">
    <title>Edit Users Account</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">


    <link rel="stylesheet" href="css/style.css">


</head>
<style>
    *, *:before, *:after {
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
        box-sizing: border-box;
    }

    body {
        font-family: 'Nunito', sans-serif;
        color: #384047;
    }

    form {
        max-width: 300px;
        margin: 10px auto;
        padding: 10px 20px;
        background: #f4f7f8;
        border-radius: 8px;
    }

    h1 {
        margin: 0 0 30px 0;
        text-align: center;
    }

    input[type="text"],
    input[type="password"],
    input[type="date"],
    input[type="datetime"],
    input[type="email"],
    input[type="number"],
    input[type="search"],
    input[type="tel"],
    input[type="time"],
    input[type="url"],
    textarea,
    select {
        background: rgba(255, 255, 255, 0.1);
        border: none;
        font-size: 16px;
        height: auto;
        margin: 0;
        outline: 0;
        padding: 15px;
        width: 100%;
        background-color: #e8eeef;
        color: #8a97a0;
        box-shadow: 0 1px 0 rgba(0, 0, 0, 0.03) inset;
        margin-bottom: 30px;
    }

    input[type="radio"],
    input[type="checkbox"] {
        margin: 0 4px 8px 0;
    }

    select {
        padding: 6px;
        height: 32px;
        border-radius: 2px;
    }

    button {
        padding: 19px 39px 18px 39px;
        color: #FFF;
        background-color: #4bc970;
        font-size: 18px;
        text-align: center;
        font-style: normal;
        border-radius: 5px;
        width: 100%;
        border: 1px solid #3ac162;
        border-width: 1px 1px 3px;
        box-shadow: 0 -1px 0 rgba(255, 255, 255, 0.1) inset;
        margin-bottom: 10px;
    }

    fieldset {
        margin-bottom: 30px;
        border: none;
    }

    legend {
        font-size: 1.4em;
        margin-bottom: 10px;
    }

    label {
        display: block;
        margin-bottom: 8px;
    }

    label.light {
        font-weight: 300;
        display: inline;
    }

    .number {
        background-color: #5fcf80;
        color: #fff;
        height: 30px;
        width: 30px;
        display: inline-block;
        font-size: 0.8em;
        margin-right: 4px;
        line-height: 30px;
        text-align: center;
        text-shadow: 0 1px 0 rgba(255, 255, 255, 0.2);
        border-radius: 100%;
    }

    @media screen and (min-width: 480px) {

        form {
            max-width: 480px;
        }

    }
</style>
@section('content')


    <body>

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- <title>Sign Up Form</title> -->
        <link rel="stylesheet" href="css/normalize.css">
        <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
    @if (session('error'))
        <div class="alert alert-warning">{{ Session::get('error') }}</div>
    @endif
    <form id="formid" class="form-horizontal" onsubmit="setup()" method="POST"
          action="{{ route('acc.update',$datauser->id) }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <h1>Edit User</h1>
        <br>
        <fieldset>
            <legend><span class="number">1</span>User basic info</legend>
            <br>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required value="{{$datauser->email}}">
                @if ($errors->has('email'))
                    <span class="help-block">
                  <strong>{{ $errors->first('email') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required value="{{$datauser->name}}">
                @if ($errors->has('name'))
                    <span class="help-block">
                  <strong>{{ $errors->first('name') }}</strong>
                  </span>
                @endif
            </div>

            <div class="form-group{{ $errors->has('surname') ? ' has-error' : '' }}">
                <label for="surname">Surname:</label>
                <input type="text" id="surname" name="surname" required value="{{$datauser->surname}}">
                @if ($errors->has('surname'))
                    <span class="help-block">
                  <strong>{{ $errors->first('surname') }}</strong>
                  </span>
                @endif
            </div>
        <!--
          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
            <label for="password">Password:</label>
            <input type="password" id="password" class="form-control" name="password" required> 
            @if ($errors->has('password'))
            <span class="help-block">
            <strong>{{ $errors->first('password') }}</strong>
              </span>
            @endif
                </div>


                  <label for="password-confirm">Password Confirm:</label>
                  <input type="password" id="password-confirm" class="form-control" name="password-confirm" required>

                <!--<label>Age:</label>
                <input type="radio" id="under_13" value="under_13" name="user_age"><label for="under_13" class="light">Under 13</label><br>
                <input type="radio" id="over_13" value="over_13" name="user_age"><label for="over_13" class="light">13 or older</label>-->
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="control-label">Password</label>


                <input id="password" type="password" class="form-control" name="password">

                @if ($errors->has('password'))
                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif

            </div>

            <div class="form-group">
                <label for="password-confirm" class="control-label">Confirm Password</label>

                <input id="password-confirm" type="password" class="form-control" name="password_confirmation">

            </div>


        </fieldset>
        <br>
        <fieldset>
            <legend><span class="number">2</span>User profile</legend>
            <!--
          </fieldset>
          <fieldset>

          <label>Interests:</label>
            <input type="checkbox" id="development" value="interest_development" name="user_interest"><label class="light" for="development">Development</label><br>
              <input type="checkbox" id="design" value="interest_design" name="user_interest"><label class="light" for="design">Design</label><br>
            <input type="checkbox" id="business" value="interest_business" name="user_interest"><label class="light" for="business">Business</label>
         -->


            <div class="form-group{{ $errors->has('age') ? ' has-error' : '' }} ">
                <label for="age">Age:</label>
                <input type="number" id="age" class="form-control" name="age" required value="{{$datauser->age}}">
                @if ($errors->has('age'))
                    <span class="help-block">
              <strong>{{ $errors->first('age') }}</strong>
              </span>
                @endif
            </div>
            <label for="gender">Gender:</label>
            <select id="gender" name="gender">
                <optgroup label="Sex">
                    <option value="male" {{ $datauser->gender == 'male' ? 'selected' : '' }} >Male</option>
                    <option value="female" {{ $datauser->gender == 'female' ? 'selected' : '' }} >Female</option>
                    <option value="other"{{ $datauser->gender == 'other' ? 'selected' : '' }}>Other</option>
                </optgroup>
                <!--<optgroup label="Mobile">
                  <option value="Android_developer">Androild Developer</option>
                  <option value="iOS_developer">iOS Developer</option>
                  <option value="mobile_designer">Mobile Designer</option>
                </optgroup>
                <optgroup label="Business">
                  <option value="business_owner">Business Owner</option>
                  <option value="freelancer">Freelancer</option>
                </optgroup>
                <optgroup label="Other">
                  <option value="secretary">Secretary</option>
                  <option value="maintenance">Maintenance</option>
                </optgroup>-->
            </select>


            <br><br>

            <label class="center">Date of Birth</label>
            <div class="form-group{{ $errors->has('birthdate') ? ' has-error' : '' }} ">

                <input type="date" id="birthdate" class="form-control" name="birthdate" required
                       value="{{$datauser->birthdate}}">
                @if ($errors->has('birthdate'))
                    <span class="help-block">
              <strong>{{ $errors->first('birthdate') }}</strong>
              </span>
                @endif
            </div>

        </fieldset>
        <br>
        <fieldset>

            <legend><span class="number">3</span>User Contact</legend>
            <div class="form-group{{ $errors->has('phonenumber') ? ' has-error' : '' }} ">
                <label for="phonenumber">Phone Number:</label>
                <input type="number" id="phonenumber" class="form-control" name="phonenumber"
                       value="{{$datauser->phonenumber}}"
            </div>


            <label for="address">Address:</label>
            <textarea id="address" name="address">
          {{$datauser->address}}</textarea>
            <br><br>


        </fieldset>

        <br>

        <fieldset>

            <legend><span class="number">4</span>User information</legend>
            <div class="form-group">

                <label for="paymentcard">Payment Card:</label>
                <input type="number" id="paymentcard" class="form-control" name="paymentcard"
                       value="{{$datauser->paymentcard}}">
            </div>


            <label for="roles">Roles:</label>
            <select id="roles" name="roles">
                <optgroup label="Normal User">
                    <option value="user" {{ $datauser->roles == 'user' ? 'selected' : '' }} >Normal User</option>
                    <option value="seller" {{ $datauser->roles == 'seller' ? 'selected' : '' }} >Dealer user</option>
                </optgroup>
                <optgroup label="Administrator">
                    <option value="admin" {{ $datauser->roles == 'admin' ? 'selected' : '' }}>Administrator</option>
                </optgroup>
            </select>


        </fieldset>


        <br>


        <button id="submit" type="submit">Update user</button>
    </form>
    <script>

        function setup() {
            // alert("The Files was submitted");
            document.getElementById("submit").value = "Registering Up ...";
            document.getElementById("submit").disabled = true;
            // $('submit').value = 'Please Wait we are Processing ...';
            /*  document.getElementById("content").style.visibility = "hidden";
            //  document.getElementById("c").style.visibility = "hidden";
                document.getElementById("loader").style.visibility = "visible";
                document.getElementById("box").style.visibility = "visible";
                document.getElementById("shadow").style.visibility = "visible";
                document.getElementById("footer-distributed").style.visibility = "hidden";
                 //document.getElementById('submit').click();
              //document.getElementById("app").style.visibility = "visible";*/

        }
    </script>

@endsection
