@extends('..._base')

@section('head')

@stop

@section('title')
Degree Tracker PET
@stop

@section('top')
@stop

@section('middle')
    <div class="font_wrapper_new_course">
    <a href="/course/create">Click here to add a new course</a>
    </div>
@stop

@section('bottom')
    @include('output')
@stop