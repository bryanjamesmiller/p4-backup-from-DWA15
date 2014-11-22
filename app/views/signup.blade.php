@extends('_base_nameless')

@section('head')

@stop

@section('title')
Degree Tracker PET
@stop

@section('top')
@stop

@section('middle')
<h2>Sign up</h2>

{{ Form::open(array('url' => '/signup')) }}

    Student's Name<br>
    {{ Form::text('student_name') }}<br><br>

    Email<br>
    {{ Form::text('email') }}<br><br>

    Password:<br>
    {{ Form::password('password') }}<br><br>

    {{ Form::submit('Submit') }}

{{ Form::close() }}
@stop

@section('bottom')

@stop

