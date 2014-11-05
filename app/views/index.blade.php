@extends('_base')

@section('head')

@stop

@section('title')
Degree Tracker PET
@stop


@section('top')
    <div id="heading">
        <h1 id="wheatImage">
            <img src="images/wheat logo.PNG" alt="wheat logo">
        </h1>
        <caption>
            <h1 id="studentName">
                <label for="name" id="name">Student Name: </label>
                <input type="text" class="textboxes" name="name" id="name">
            </h1>
        </caption>
    </div>
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

