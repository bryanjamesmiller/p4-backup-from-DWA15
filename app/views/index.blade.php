@extends('_base')

@section('head')

@stop

@section('title')
Degree Tracker PET
@stop


@section('top')
    @include('banner_header')
@stop

@section('middle')

@include('table_header')

@for ($i = 0; $i < 30; $i++)
    @include('tablerow')
@endfor

@include('table_bottom')

@stop

@section('bottom')

@stop

