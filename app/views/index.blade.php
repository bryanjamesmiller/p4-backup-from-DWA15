@extends('_base')

@section('head')

@stop

@section('title')
Degree Tracker PET
@stop


@section('top')
    <p> @include('banner_header')</p>
@stop

@section('middle')

<p> @include('table_header')</p>

@for ($i = 0; $i < 30; $i++)
    <p> @include('tablerow')</p>
@endfor
        </table>
@stop

@section('bottom')

@stop

