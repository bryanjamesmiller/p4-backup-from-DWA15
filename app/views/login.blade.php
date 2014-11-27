@extends('_base_welcome')

@section('head')

@stop

@section('title')
Degree Tracker PET
@stop

@section('top')
@stop

@section('middle')
<div class="font_wrapper_sign_in_log_in">
<h2>Log in</h2>

{{ Form::open(array('url' => '/login')) }}

    Email<br>
    {{ Form::text('email') }}<br><br>

    Password:<br>
    {{ Form::password('password') }}<br>

    {{ Form::submit('Submit') }}<br><br>

{{ Form::close() }}

<h2>Forgot your password?</h2><br>
<a href="password/remind">Click here to reset it.</a>
</div>
@stop

@section('bottom')

@stop
