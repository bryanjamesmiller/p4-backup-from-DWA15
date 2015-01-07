<?php
echo '<tr>
            <th class="course_title_header" colspan="2">Course Title</th>
            <th class="concentration_header">Concentration</th>
            <th class="course_attributes_header" colspan="5">Course Attributes</th>
            <th class="field_of_study_header" colspan="2">Field of Study</th>
            <th class="minor_header" colspan="2">Minor</th>
            <th class="semester_header" colspan="2">Semester</th>
        </tr>

        <tr>
            <td class="course_title_box" colspan="2">' ?>  {{{$oneCourse->course_title}}}<?php echo '</td>
            <td class="concentration_box">' ?>  {{{$oneCourse->course_concentration}}}<?php echo ' </td>
            <td class="course_attributes_box">' ?>  {{{$oneCourse->course_attributes_1}}}<?php echo '</td>
            <td class="course_attributes_box">' ?>  {{{$oneCourse->course_attributes_2}}}<?php echo '</td>
            <td class="course_attributes_box">' ?>  {{{$oneCourse->course_attributes_3}}}<?php echo '</td>
            <td class="course_attributes_box">' ?>  {{{$oneCourse->course_attributes_4}}}<?php echo '</td>
            <td class="course_attributes_box">' ?>  {{{$oneCourse->course_attributes_5}}}<?php echo '</td>
            <td class="field_of_study_box" colspan="2">' ?>  {{{$oneCourse->field_of_study}}}<?php echo '</td>
            <td class="minor_box" colspan="2">' ?>  {{{$oneCourse->minor}}}<?php echo '</td>
            <td class="semester_box">' ?>  {{{$oneCourse->semester_and_year}}}<?php echo '</td>
        </tr>

        <tr>
            <th class="course_number_header">Course Number</th>
            <th class="course_delivery_header">Course Delivery</th>
            <th class="crn_number_header">CRN#</th>
            <th class="section_header">Section</th>
            <th class="tuition_header">Tuition</th>
            <th class="professors_header">Professor(s)</th>
            <th class="days_and_times_header" colspan="2">Day(s) and Time(s)</th>
            <th class="status_header">Status</th>
            <th class="letter_grade_header">Letter Grade</th>
            <th class="grade_points_header">Grade Points</th>
            <th class="transfer_credits_header">Transfer Credits</th>
            <th class="hes_credits_header">HES Credits</th>
        </tr>

        <tr>
            <td class="course_number_box">' ?> {{{$oneCourse->course_number}}} <?php echo '</td>
            <td class="course_delivery_box">' ?>  {{{$oneCourse->course_delivery }}} <?php echo '</td>
            <td class="crn_number_box">' ?>  {{{$oneCourse->crn_number }}}<?php echo '</td>
            <td class="section_box">' ?>  {{{ $oneCourse->section  }}}<?php echo '</td>
            <td class="tuition_box">' ?>  {{{$oneCourse->tuition  }}}<?php echo '</td>
            <td class="professors_box">' ?>  {{{$oneCourse->professors  }}}<?php echo '</td>
            <td class="days_and_times_box" colspan="2">' ?>  {{{$oneCourse->days_and_times  }}}<?php echo '</td>
            <td class="status_box">' ?>  {{{$oneCourse->status  }}}<?php echo '</td>
            <td class="letter_grade_box">' ?>  {{{$oneCourse->letter_grade  }}}<?php echo '</td>
            <td class="grade_points_box">' ?>  {{{$oneCourse->grade_points  }}}<?php echo '</td>
            <td class="transfer_credits_box">' ?>  {{{$oneCourse->transfer_credits  }}}<?php echo '</td>
            <td class="hes_credits_box">' ?>  {{{ $oneCourse->hes_credits  }}}<?php echo '</td>
        </tr>

        <tr class="edit_delete_row">
            <td class = "edit_or_delete_rows" colspan="22">
                  <span>
                      <a class="edit_delete_buttons" href="/course_edit/' ?> {{$oneCourse->id}}<?php echo '" > Edit course information</a>
                  </span>
                  <span>
                      <a class="edit_delete_buttons" href="/course_confirm_delete/' ?> {{$oneCourse->id}}<?php echo '" > Delete course entry </a>
                  </span>
            </td>
        </tr>

        <tr class = "separator_row">
            <td  colspan="22">
        </tr>
';
