<div class="negative_table_pink_border_issue_indent_over_from_left_margin">
        <div class="font_wrapper">
            <table class="myTable">
                <tr>
                    <th class="course_title_header" colspan="2">Course Title</th>
                    <th class="concentration_header">Concentration</th>
                    <th class="course_attributes_header" colspan="5">Course Attributes</th>
                    <th class="field_of_study_header" colspan="2">Field of Study</th>
                    <th class="minor_header" colspan="2">Minor</th>
                    <th class="semester_header" colspan="2">Semester</th>
                </tr>

                <tr>
                    <td class="course_title_box" colspan="2">  {{{$course->course_title}}}</td>
<td class="concentration_box"> {{{$course->course_concentration}}} </td>
<td class="course_attributes_box">{{{$course->course_attributes_1}}}</td>
<td class="course_attributes_box">{{{$course->course_attributes_2}}}</td>
<td class="course_attributes_box"> {{{$course->course_attributes_3}}}</td>
<td class="course_attributes_box"> {{{$course->course_attributes_4}}}</td>
<td class="course_attributes_box">  {{{$course->course_attributes_5}}}</td>
<td class="field_of_study_box" colspan="2"> {{{$course->field_of_study}}}</td>
<td class="minor_box" colspan="2">  {{{$course->minor}}}</td>
<td class="semester_box">  {{{$course->semester_and_year}}}</td>
</tr>

<tr>
    <th class="course_number_header">Course Number</th>
    <th class="course_delivery_header">Course Delivery</th>
    <th class="crn_number_header">CRN#</th>
    <th class="section_header">Section</th>
    <th class="tuition_header">Tuition</th>
    <th class="professors_header">Professor(s)</th>
    <th class="days_and_times_header" colspan="2">Day(s) and Time(s)</th>
    <th class="status_header">Status*</th>
    <th class="letter_grade_header">Letter Grade*</th>
    <th class="grade_points_header">Grade Points*</th>
    <th class="transfer_credits_header">Transfer Credits*</th>
    <th class="hes_credits_header">HES Credits*</th>
</tr>

<tr>
    <td class="course_number_box"> {{{$course->course_number}}} </td>
    <td class="course_delivery_box">  {{{$course->course_delivery }}} </td>
    <td class="crn_number_box">  {{{$course->crn_number}}}</td>
    <td class="section_box">  {{{ $course->section}}}</td>
    <td class="tuition_box">  {{{$course->tuition}}}</td>
    <td class="professors_box">  {{{$course->professors}}}</td>
    <td class="days_and_times_box" colspan="2"> {{{$course->days_and_times}}}</td>
    <td class="status_box">  {{{$course->status}}}</td>
    <td class="letter_grade_box">  {{{$course->letter_grade}}}</td>
    <td class="grade_points_box">  {{{$course->grade_points}}}</td>
    <td class="transfer_credits_box">  {{{$course->transfer_credits}}}</td>
    <td class="hes_credits_box">  {{{$course->hes_credits}}}</td>
</tr>
</table>
</div>

<br>
<div class="indent_over_from_left_margin">
    <div class="custom_h3">Are you sure you want to delete this course?</div>
    <br>

    <div class="font_wrapper_delete_confirmation_buttons"><a href="/delete/{{$course->id}}">Delete this course.</a></div><br>
    <div class="font_wrapper_delete_confirmation_buttons"><a href="/course">Click to view your courses.</a></div>


    <br>
    <!--<div class="font_wrapper_delete_confirmation_buttons2"><a href="/course">Click to view your courses.</a></div>-->
</div>
