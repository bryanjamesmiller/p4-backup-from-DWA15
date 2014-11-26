@extends('_base_nameless')

@section('head')

@stop

@section('title')
Degree Tracker PET password reset
@stop

@section('top')
@stop

@section('middle')
<div class="font_wrapper_sign_in_log_in">
<form action="{{ action('RemindersController@postReset') }}" method="POST">
    <input type="hidden" name="token" value="{{ $token }}">
    Please enter your email:<br>
    <input type="email" name="email"><br><br>
    Enter a password:<br>
    <input type="password" name="password"><br>
    Confirm password again:<br>
    <input type="password" name="password_confirmation"><br>
    <input type="submit" value="Reset Password">
</form>
</div>
@stop

@section('bottom')

@stop
