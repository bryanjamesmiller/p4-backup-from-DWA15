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
<h2>Sign up</h2>

{{ Form::open(array('url' => '/signup')) }}

    Student's Name<br>
    {{ Form::text('student_name') }}<br><br>

School<br>
<select name="school_name">
            <optgroup >
                <option>Harvard Extension School (HES)</option>
            </optgroup>
</select>

Degree Program<br>
<select name="degree_program">
            <optgroup >
                <option>Bachelor's of Liberal Arts (ALB)</option>
                <option>Master's of Liberal Arts (ALM)</option>
</optgroup>
</select>

    <br><br>Concentration<br>
    {{ Form::text('concentration') }}<br><br>

    Email<br>
    {{ Form::text('email') }}<br><br>

    Password:<br>
    {{ Form::password('password') }}<br><br>

    {{ Form::submit('Submit') }}

{{ Form::close() }}
</div>
@stop

@section('bottom')

@stop

