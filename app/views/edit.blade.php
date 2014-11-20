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
<table id="myTable" class="tablesorter">
    <thead>
    <tr id="tableHeaders">
        <th id="course_number_header">Course Number</th>
                    <th id="course_delivery_header">Course Delivery</th>
                    <th id="crn_number_header">CRN#</th>
                    <th  id="section_header">Section</th>
                    <th id="tuition_header">Tuition</th>
                    <th id="course_title_header">Course Title</th>
                    <th id="course_attributes_header" colspan="5">Course Attributes</th>
                    <th id="semester_header">Semester</th>
                    <th id="days_header">Day(s)</th>
                    <th id="time_header">Time(s)</th>
                    <th id="year_header">Year</th>
                    <th id="professors_header">Professor(s)</th>
                    <th id="status_header">Status</th>
                    <th id="letter_grade_header">Grade</th>
                    <th id="grade_points_header">Grade Points</th>
                    <th id="transfer_credits_header">Transfer Credits</th>
                    <th id="hes_credits_header">HES Credits</th>
    </tr>
    </thead>
    <tr>
        <td id="course_number">{{{$course->course_number}}}</td>
        <td id="course_delivery" class="dropdowns">  {{{$course->course_delivery }}} </td>
        <td id="crn_number">  {{{$course->crn_number }}}</td>
        <td id="section">  {{{ $course->section  }}}</td>
        <td id="tuition">  {{{$course->tuition  }}}</td>
        <td id="course_title">  {{{$course->course_title  }}}</td>
        <td class="dropdowns">  {{{$course->course_attributes_1  }}} </td>
        <td class="dropdowns">  {{{$course->course_attributes_2  }}}</td>
        <td class="dropdowns">  {{{$course->course_attributes_3  }}}</td>
        <td class="dropdowns">  {{{$course->course_attributes_4  }}}</td>
        <td class="dropdowns">  {{{$course->course_attributes_5  }}}</td>
        <td class="dropdowns" id="semester">  {{{$course->semester  }}}</td>
        <td id="days">  {{{$course->days  }}}</td>
        <td id="times">  {{{$course->times  }}}</td>
        <td id="year">  {{{$course->year  }}}</td>
        <td id="professors">  {{{$course->professors  }}}</td>
        <td class="dropdowns" id="status">  {{{$course->status  }}}</td>
        <td class="dropdowns" id="letter_grade">  {{{$course->letter_grade  }}}</td>
        <td class="dropdowns" id="grade_points">  {{{$course->grade_points  }}}</td>
        <td id="transfer_credits">  {{{$course->transfer_credits  }}}</td>
        <td id="hes_credits">  {{{ $course->hes_credits  }}}</td>
    </tr>
</table>


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
                <option value="course_attributes_1">Course Attribute #1</option>
                <option value="course_attributes_2">Course Attribute #2</option>
                <option value="course_attributes_3">Course Attribute #3</option>
                <option value="course_attributes_4">Course Attribute #4</option>
                <option value="course_attributes_5">Course Attribute #5</option>
                <option value="semester">Semester</option>
                <option value="days">Day(s)</option>
                <option value="times">Time(s)</option>
                <option value="year">Year</option>
                <option value="professors">Professor(s)</option>
                <option value="status">Status</option>
                <option value="letter_grade">Grade</option>
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





