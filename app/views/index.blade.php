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
<table id="myTable" class="tablesorter">
        <thead>
        <tr id="tableHeaders">
            <th>Course Number</th>
            <th>Course Delivery</th>
            <th>CRN#</th>
            <th>Section</th>
            <th>Tuition</th>
            <th>Course Title</th>
            <th colspan="5">Course Attributes</th>
            <th>Semester</th>
            <th>Day(s)</th>
            <th>Time(s)</th>
            <th>Year</th>
            <th>Professor(s)</th>
            <th>Status</th>
            <th>Grade</th>
            <th>Grade Points</th>
            <th>Transfer Credits</th>
            <th>HES Credits</th>
        </tr>
        </thead>
@for ($i = 0; $i < 30; $i++)
    <p> @include('tablerow')</p>
@endfor
        </table>
@stop

@section('bottom')

@stop

