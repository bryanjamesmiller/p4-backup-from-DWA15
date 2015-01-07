@extends('_base')

@section('head')
    @include('includes.reusable_functions')
@stop

@section('title')
Degree Tracker PET
@stop

@section('top')
@stop

@section('middle')
    @include('includes.forms_for_creating_a_new_course')
@stop

@section('bottom')
    @include('output')
    @include('includes.footer')
@stop