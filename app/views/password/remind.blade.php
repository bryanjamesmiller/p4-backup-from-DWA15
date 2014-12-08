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
<h2>Would you like to reset your password?</h2>
Please enter your email address, and we will<br>
send you a link to reset your password:<br>
<form action="{{ action('RemindersController@postRemind') }}" method="POST">
    <input type="email" name="email"><br>
    <input type="submit" value="Send Email">
</form>
</div>
@stop

@section('bottom')

@stop