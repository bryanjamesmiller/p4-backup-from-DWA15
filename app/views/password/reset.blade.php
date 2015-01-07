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
<div class="font_wrapper_sign_in_log_in">
<div class="custom_h2">To reset your password:</div>
<form action="{{ action('RemindersController@postReset') }}" method="POST">
    <input type="hidden" name="token" class='settings_email_or_password' value="{{ $token }}">
    Please enter your email:<br>
    <input type="email" class='settings_email_or_password' name="email"><br><br>
    Enter a password (must be at least 8 characters):<br>
    <input type="password" name="password" class='settings_email_or_password'><br><br>
    Re-type password to confirm:<br>
    <input type="password" name="password_confirmation" class='settings_email_or_password'><br>
    <input type="submit" value="Reset Password">
</form>
</div>
<br><br><br><br><br><br>
@stop

@section('bottom')
    @include('includes.footer')
@stop
