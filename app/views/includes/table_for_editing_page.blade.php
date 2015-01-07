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

    <div class="indent_over_from_left_margin">
        <div class="fine_print">*These fields must be filled out to impact GPA calculation.&nbsp;&nbsp;"Status" must be set to complete.&nbsp;&nbsp;Either HES or transfer credits must have a value entered.</div>
        <br>

        <div class="custom_h3">Select the item to edit:</div>

        {{ Form::open(array('url' => 'course_edit'))}}
        <select name="edit_options" class="font_wrapper">
            <optgroup class="font_wrapper">
                <option value="course_number" >Select Here</option>
                <option value="course_title">Course Title</option>
                <option value="course_concentration">Course Concentration</option>
                <option value="course_attributes_1">Course Attribute #1</option>
                <option value="course_attributes_2">Course Attribute #2</option>
                <option value="course_attributes_3">Course Attribute #3</option>
                <option value="course_attributes_4">Course Attribute #4</option>
                <option value="course_attributes_5">Course Attribute #5</option>
                <option value="field_of_study">Field of Study</option>
                <option value="minor">Minor</option>
                <option value="semester">Semester</option>
                <option value="course_number">Course Number</option>
                <option value="course_delivery">Course Delivery</option>
                <option value="crn_number">CRN#</option>
                <option value="section">Section</option>
                <option value="tuition">Tuition</option>
                <option value="days_and_times">Day(s) and Time(s)</option>
                <option value="status">Status*</option>
                <option value="letter_grade">Letter Grade*</option>
                <option value="professors">Professor(s)</option>
                <!--<option value="grade_points">Grade Points</option>-->
                <option value="transfer_credits">Transfer Credits*</option>
                <option value="hes_credits">HES Credits*</option>
            </optgroup>
        </select>
        <br><br>

        <div class="custom_h3">Enter new value:</div>

        {{ Form::text('new_value', '', array('id' => 'new_value'))}}
        {{ Form::hidden('id', $course['id']); }}<br>
        <div>{{ Form::submit('Click to save your changes.')}}</div>
        <div class="font_wrapper_edit_confirmation_buttons2"><a href="/course">Click to view your courses.</a></div>
        {{ Form::close() }}
    </div>
</div>
</div>