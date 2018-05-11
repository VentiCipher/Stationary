@extends('layouts.app')

<head>
    <meta charset="UTF-8">
    <title>Add Account</title>

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
    <form id="checkoutc" class="form-horizontal" method="POST" action="{{route('credit.order.pay')}}"
          enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="omise_token" readonly>
        <input type="hidden" name="orderid" value="{{$orderid}}" readonly>
        <input type="hidden" name="name" value="{{$name}}" readonly>
        <div id="token_errors"></div>
        <h1>Payment by Credit Card</h1>
        <br>
        <fieldset>


            <legend><span class="number">1</span>User Info</legend>
            <br>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="number">Card Number:</label>

                <input type="text" data-omise="number" required value="{{$cardno}}" readonly>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="holder_name">Card Holder name:</label>
                <input type="text" data-omise="holder_name" required>

            </div>

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="expiration_month">Expiration Month:</label>
                <input type="text" data-omise="expiration_month" size="4">

            </div>
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="expiration_year">Expiration Year:</label>
                <input type="text" data-omise="expiration_year" size="8">
            </div>

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="security_code">Security Code (CVC):</label>
                <input type="text" data-omise="security_code" size="8">
            </div>


        </fieldset>
        <br>

        <br>

        <button id="create_token" type="submit">Create Payment</button>
    </form>
    <script src="https://cdn.omise.co/omise.js"></script>
    <script src="http://code.jquery.com/jquery.min.js" type="text/javascript"></script>
    <script>Omise.setPublicKey("pkey_test_5bv8bv1syowtocv6su4");</script>
    <script>
        $("#checkoutc").on('submit',(function () {

            var form = $(this);

            // Disable the submit button to avoid repeated click.
            form.find("input[type=submit]").prop("disabled", true);

            // Serialize the form fields into a valid card object.
            var card = {
                "name": form.find("[data-omise=holder_name]").val(),
                "number": form.find("[data-omise=number]").val(),
                "expiration_month": form.find("[data-omise=expiration_month]").val(),
                "expiration_year": form.find("[data-omise=expiration_year]").val(),
                "security_code": form.find("[data-omise=security_code]").val()
            };

            // Send a request to create a token then trigger the callback function once
            // a response is received from Omise.
            //
            // Note that the response could be an error and this needs to be handled within
            // the callback.
            Omise.createToken("card", card, function (statusCode, response) {
                if (response.object == "error") {
                    // Display an error message.
                    var message_text = "SET YOUR SECURITY CODE CHECK FAILED MESSAGE";
                    if(response.object == "error") {
                        message_text = response.message;
                    }
                    $("#token_errors").html(message_text);

                    // Re-enable the submit button.
                    form.find("input[type=submit]").prop("disabled", false);
                } else {
                    // Then fill the omise_token.
                    form.find("[name=omise_token]").val(response.id);

                    // Remove card number from form before submiting to server.
                    form.find("[data-omise=number]").val("");
                    form.find("[data-omise=security_code]").val("");

                    // submit token to server.
                    form.get(0).submit();
                };
            });

            // Prevent the form from being submitted;

            return false;

        }));
    </script>

    </body>
@endsection
