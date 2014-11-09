@extends('_base')

@section('head')

@stop

@section('title')
Edit Course Information
@stop

@section('top')
 <img src="images/wheat logo.PNG" alt="wheat logo">
@stop

@section('middle')
<p>Select the item to edit:</p>

{{ Form::open(array('url' => 'edit')) }}
<select class="dropboxlabels" name="edit_options" id="edit_options">
            <optgroup class="dropdowns">
                <option>Course Number</option>
                <option>Course Delivery</option>
                <option>CRN#</option>
                <option>Section</option>
                <option>Tuition</option>
                <option>Course Title</option>
                <option>Course Attribute #1</option>
                <option>Course Attribute #2</option>
 <option>Course Attribute #3</option>
                <option>Course Attribute #4</option>
                <option>Course Attribute #5</option>
                <option>Semester</option>
                <option>Day(s)</option>
 <option>Time(s)</option>
                <option>Year</option>
                <option>Professor(s)</option>
                <option>Status</option>
                <option>Grade</option>
<option>Grade Points</option>
<option>Transfer Credits</option>
<option>HES Credits</option>
     </optgroup>
</select>
<p>Enter new value:</p>
{{Form::text('new_value', '', array('id' => 'new_value'))}}
{{ Form::submit('Click to Update Changes!')}}
{{ Form::close() }}
{{$format}}
@stop

@section('bottom')

@stop




