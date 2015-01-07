<div class="padding_welcome">
    @if(Auth::check())
        <div class="login_logout_signup_welcome"><a href='/logout'>Log out: {{ Auth::user()->email; }}</a></div>
    @else
        <div class="login_logout_signup_welcome"><a href='/signup'>Sign Up</a> or <a href='/login'>Log In</a> instead?</div>
    @endif
</div>

@extends('_base_welcome')

@section('head')
@stop

@section('title')
Degree Tracker PET password reset
@stop

@section('top')
@stop

@section('middle')
<div class="indent_over_from_left_margin">
<div class="font_wrapper_sign_in_log_in">
<div class="custom_h2">Would you like to reset your password?</div>
Please enter your email address, and Degree Tracker will <br>
send you a link to reset your password:</div><br>
<form action="{{ action('RemindersController@postRemind') }}" method="POST">
    <input type="email" name="email" class="settings_email_or_password"><br>
    <div class="padder"><input type="submit" value="Send Email"></div>
</form>
</div>
<br><br><br><br><br><br><br>
@stop

@section('bottom')
    @include('includes.footer')
@stop