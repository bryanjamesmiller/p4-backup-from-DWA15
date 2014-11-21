@extends('_base')

@section('head')

@stop

@section('title')
Degree Tracker PET
@stop

@section('top')
@stop

@section('middle')
    @include('forms_user_input_table')
@stop

@section('bottom')
<div>
<p><a href="/list">Click here</a> to view a list of your courses.</p>
</div>
@stop

