@extends('_base')

@section('head')

@stop

@section('title')
Edit Course Information
@stop

@section('top')
 <img src="/images/wheat logo.PNG" alt="wheat logo">
@stop

@section('middle')
<p>Select the item to edit:</p>

{{ Form::open(array('url' => 'edit'))}}
<select class="dropboxlabels" name="edit_options" id="edit_options">
            <optgroup class="dropdowns">
                <option value="course_number">Course Number</option>
                <option value="course_delivery">Course Delivery</option>
                <option value="crn_number">CRN#</option>
                <option value="section">Section</option>
                <option value="tuition">Tuition</option>
                <option value="course_title">Course Title</option>
                <option value="course_attribute_1">Course Attribute #1</option>
                <option value="course_attribute_2">Course Attribute #2</option>
                <option value="course_attribute_3">Course Attribute #3</option>
                <option value="course_attribute_4">Course Attribute #4</option>
                <option value="course_attribute_5">Course Attribute #5</option>
                <option value="semester">Semester</option>
                <option value="days">Day(s)</option>
                <option value="times">Time(s)</option>
                <option value="year">Year</option>
                <option value="professors">Professor(s)</option>
                <option value="status">Status</option>
                <option value="grade">Grade</option>
                <option value="grade_points">Grade Points</option>
                <option value="transfer_credits">Transfer Credits</option>
                <option value="hes_credits">HES Credits</option>
     </optgroup>
</select>
<p>Enter new value:</p>
{{ Form::text('new_value', '', array('id' => 'new_value'))}}
{{ Form::hidden('id', $course['id']); }}
{{ Form::submit('Click to Update Changes!')}}
{{ Form::close() }}

@stop

@section('bottom')

<div>
<p><a href="/list">Click here</a> to view a list of your courses.</p>
</div>
@stop





