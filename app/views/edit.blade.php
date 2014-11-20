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
<table class="myTable">
    <thead>
    <tr class="tableHeaders">
        <th class="course_number_header">Course Number</th>
                    <th class="course_delivery_header">Course Delivery</th>
                    <th class="crn_number_header">CRN#</th>
                    <th  class="section_header">Section</th>
                    <th class="tuition_header">Tuition</th>
                    <th class="course_title_header">Course Title</th>
                    <th class="course_attributes_header" colspan="5">Course Attributes</th>
                    <th class="semester_header">Semester</th>
                    <th class="days_header">Day(s)</th>
                    <th class="time_header">Time(s)</th>
                    <th class="year_header">Year</th>
                    <th class="professors_header">Professor(s)</th>
                    <th class="status_header">Status</th>
                    <th class="letter_grade_header">Grade</th>
                    <th class="grade_points_header">Grade Points</th>
                    <th class="transfer_credits_header">Transfer Credits</th>
                    <th class="hes_credits_header">HES Credits</th>
    </tr>
    </thead>
    <tr>
        <td class="course_number">{{{$course->course_number}}}</td>
        <td class="course_delivery" class="dropdowns">  {{{$course->course_delivery }}} </td>
        <td class="crn_number">  {{{$course->crn_number }}}</td>
        <td class="section">  {{{ $course->section  }}}</td>
        <td class="tuition">  {{{$course->tuition  }}}</td>
        <td class="course_title">  {{{$course->course_title  }}}</td>
        <td class="dropdowns">  {{{$course->course_attributes_1  }}} </td>
        <td class="dropdowns">  {{{$course->course_attributes_2  }}}</td>
        <td class="dropdowns">  {{{$course->course_attributes_3  }}}</td>
        <td class="dropdowns">  {{{$course->course_attributes_4  }}}</td>
        <td class="dropdowns">  {{{$course->course_attributes_5  }}}</td>
        <td class="dropdowns" class="semester">  {{{$course->semester  }}}</td>
        <td class="days">  {{{$course->days  }}}</td>
        <td class="times">  {{{$course->times  }}}</td>
        <td class="year">  {{{$course->year  }}}</td>
        <td class="professors">  {{{$course->professors  }}}</td>
        <td class="dropdowns" class="status">  {{{$course->status  }}}</td>
        <td class="dropdowns" class="letter_grade">  {{{$course->letter_grade  }}}</td>
        <td class="dropdowns" class="grade_points">  {{{$course->grade_points  }}}</td>
        <td class="transfer_credits">  {{{$course->transfer_credits  }}}</td>
        <td class="hes_credits">  {{{ $course->hes_credits  }}}</td>
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





