@extends('_base_welcome')

@section('head')

@stop

@section('title')
Welcome to Degree Tracker PET
@stop

@section('top')
@stop

@section('middle')
<div class="indent_over_from_left_margin">
<div class="custom_h2">Need to create a new account?</div>
<a href="/signup" class="font_wrapper2">Click here to Sign Up.</a>
<br><br>

<div class="custom_h2">If you already have an account,</div>
<a href="/login" class="font_wrapper2">Click here to Log In.</a>
</div>
@stop

@section('bottom')
    <br><br><br><br><br><br><br><br><br><br><br><br>
    @include('includes.footer')
@stop
