@extends('_base_welcome')

@section('head')

@stop

@section('title')
Welcome to Degree Tracker PET
@stop

@section('top')
@stop

@section('middle')
<div class="font_wrapper_sign_in_log_in">
    <h1 class="welcome_header">Welcome to Degree Tracker</h1>
</div>

<div class="new">
Need to create a new account?<br>
<a href="/signup">Click here to Sign Up</a>
</div>

<div class="old">
If you already have an account<br>
<a href="/login">Click here to Log In</a>
</div>
@stop

@section('bottom')

@stop
