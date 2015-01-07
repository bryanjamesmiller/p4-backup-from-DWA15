@extends('_base_welcome')

@section('head')
@stop

@section('title')
Degree Tracker PET
@stop

@section('top')
@stop

@section('middle')
<div class="indent_over_from_left_margin">
<div class="font_wrapper_sign_in_log_in">
<div class="custom_h2">Log in</div>

{{ Form::open(array('url' => '/login')) }}

    Email<br>
    {{Form::text('email', '', array('class' => 'settings_email_or_password'))}}<br><br>

    Password:<br>
    {{Form::password('password', array('class' => 'settings_email_or_password'))}}<br>


    {{Form::submit('Submit')}}

{{ Form::close() }}

<div class="custom_h2"><span>Forgot your password?</span><span class="lined_up_for_sign_up">Need to sign up instead?</span></div>
<span><a href="password/remind">Click here to reset it.</a></span><span class="lined_up_for_sign_up"><a href="/signup">Click here to register.</a></span>
</div>
</div>
    <br><br>
@stop

@section('bottom')
    @include('includes.footer')
@stop
