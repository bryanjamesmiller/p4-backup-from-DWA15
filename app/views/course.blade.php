@extends('_base')

@section('head')

@stop

@section('title')
Degree Tracker PET
@stop

@section('top')
@stop

@section('middle')
    <div>
    <p><a href="/course/create">Click here to add a new course</a></p>
    </div>
@stop

@section('bottom')
    @include('output')
@stop