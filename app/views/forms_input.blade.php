<div class="font_wrapper">
Check the relevant course attributes:<br>
<?php
$account = Account::search(Auth::user()->email);

if($account->degree_program === "Bachelor's of Liberal Arts (ALB)")
{
?>
    @include('course_attributes_checkbox_alm')
<?php
}
else
{
?>
    @include('course_attributes_checkbox_alm')
<?php
}
?>

{{ Form::open(array('action' => 'CourseController@store')) }}
   <table>
        <thead>
        <tr>
            <th class="course_title_header" colspan="2">Course Title</th>
            <th class="days_header">Day(s)</th>
            <th class="times_header">Time(s)</th>
            <th class="year_header">Year</th>
            <th class="professors_header">Professor(s)</th>
              <th class="semester_header">Semester</th>
                      <th class="course_delivery_header">Course Delivery</th>


        </tr>
        </thead>

    <tr>
    <td class="course_title_box" colspan="2"> {{Form::text('course_title', '', array('class' => 'course_title'))}}</td>

    <td class="days_box"> {{Form::text('days', '', array('class' => 'days'))}}</td>
    <td class="times_box"> {{Form::text('times', '', array('class' => 'times'))}}</td>
    <td class="year_box"> {{Form::text('year', '', array('class' => 'year'))}}</td>
    <td class="professors_box"> {{Form::text('professors', '', array('class' => 'professors'))}}</td>
<td class="semester_box">
        <select name="semester" class="semester">
            <optgroup>
                <option>Fall</option>
                <option>January</option>
                <option>Spring</option>
                <option>June</option>
                <option>Summer</option>
                <option>Other</option>
            </optgroup>
        </select>
    </td>

    <td class="course_delivery_box">
        <select name="course_delivery" class="course_delivery">
            <optgroup>
                <option>Online</option>
                <option>On Campus</option>
                <option>Web Conference</option>
                <option>Simulation</option>
                <option>Hybrid</option>
                <option>Internship</option>
            </optgroup>
        </select>
    </td>
</tr>
<tr>
            <th class="crn_number_header">CRN#</th>
            <th class="course_number_header">Course Number</th>
            <th  class="section_header">Section</th>
            <th class="tuition_header">Tuition</th>
            <!-- <th class="course_attributes_header" colspan="5">Course Attributes</th> -->
            <th class="status_header">Status</th>
            <th class="letter_grade_header">Grade</th>
            <!--<th class="grade_points_header">Grade Points</th> -->
            <th class="transfer_credits_header">Transfer Credits</th>
            <th class="hes_credits_header">HES Credits</th>
</tr>
<tr>
    <td class="crn_number_box"> {{Form::text('crn_number', '', array('class' => 'crn_number'))}}</td>
    <td class="course_number_box"> {{Form::text('course_number', '', array('class' => 'course_number'))}}</td>
    <td class="section_box"> {{Form::text('section', '', array('class' => 'section'))}}</td>
    <td class="tuition_box"> {{Form::text('tuition', '', array('class' => 'tuition'))}}</td>
    <td class="status_box">
        <select name="status" class="status">
            <optgroup>
                <option>Complete</option>
                <option>In Progress</option>
                <option>Scheduled</option>
                <option>Incomplete</option>
                <option>Other</option>
            </optgroup>
        </select>
    </td>
    <td class="letter_grade_box">
        <select name="letter_grade" class="letter_grade">
            <optgroup>
                <option></option>
                <option>A</option>
                <option>A-</option>
                <option>B+</option>
                <option>B</option>
                <option>B-</option>
                <option>C+</option>
                <option>C</option>
                <option>C-</option>
                <option>D+</option>
                <option>D</option>
                <option>D-</option>
                <option>E</option>
                <option>WD</option>
                <option>WA</option>
            </optgroup>
        </select>
    </td>
    <!--<td class="grade_points_box"> {{--{{Form::text('grade_points', '', array('class' => 'grade_points'))}}--}}</td>-->
    <td class="transfer_credits_box"> {{Form::text('transfer_credits', '', array('class' => 'transfer_credits'))}}</td>
    <td class="hes_credits_box"> {{Form::text('hes_credits', '', array('class' => 'hes_credits'))}}</td>
</tr>

</table>
<div class="buttons">{{ Form::submit('Add Course')}}</div>
{{ Form::close() }}
</div>