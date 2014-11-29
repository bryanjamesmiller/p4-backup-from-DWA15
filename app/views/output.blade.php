<div class="font_wrapper">
<table>
    <?php

    $total_hes_credits=0;
    $total_transfer_credits=0;
    $gradePoints_times_credits_all_added_together=0;

    if($allCourses->isEmpty() != TRUE) {
        ?>
        @foreach($allCourses as $oneCourse)
<?php
     $currentAccount = $oneCourse->account;
     if($currentAccount->email == Auth::user()->email)
{
echo '<tr>
              <th class="course_number_header">Course Number</th>
              <th class="course_delivery_header">Course Delivery</th>
              <th class="crn_number_header">CRN#</th>
              <th  class="section_header">Section</th>
              <th class="tuition_header">Tuition</th>
              <th class="course_title_header">Course Title</th>
              <th class="course_attributes_header" colspan="5">Course Attributes</th>
              <th class="semester_header">Semester</th>
              <th class="days_header">Day(s)</th>
              <th class="times_header">Time(s)</th>
              <th class="year_header">Year</th>
              <th class="professors_header">Professor(s)</th>
              <th class="status_header">Status*</th>
              <th class="letter_grade_header">Grade</th>
              <th class="grade_points_header">Grade Points**</th>
              <th class="transfer_credits_header">Transfer Credits**</th>
              <th class="hes_credits_header">HES Credits**</th>
    </tr>
    <tr>
<td class="course_number_box">' ?> {{{$oneCourse->course_number}}} <?php echo '</td>
<td class="course_delivery_box">' ?>  {{{$oneCourse->course_delivery }}} <?php echo '</td>
<td class="crn_number_box">' ?>  {{{$oneCourse->crn_number }}}<?php echo '</td>
<td class="section_box">' ?>  {{{ $oneCourse->section  }}}<?php echo '</td>
<td class="tuition_box">' ?>  {{{$oneCourse->tuition  }}}<?php echo '</td>
<td class="course_title_box">' ?>  {{{$oneCourse->course_title  }}}<?php echo '</td>
<td class="course_attributes_box">' ?>  {{{$oneCourse->course_attributes_1  }}}<?php echo ' </td>
<td class="course_attributes_box">' ?>  {{{$oneCourse->course_attributes_2  }}}<?php echo '</td>
<td class="course_attributes_box">' ?>  {{{$oneCourse->course_attributes_3  }}}<?php echo '</td>
<td class="course_attributes_box">' ?>  {{{$oneCourse->course_attributes_4  }}}<?php echo '</td>
<td class="course_attributes_box">' ?>  {{{$oneCourse->course_attributes_5  }}}<?php echo '</td>
<td class="semester_box">' ?>  {{{$oneCourse->semester  }}}<?php echo '</td>
<td class="days_box">' ?>  {{{$oneCourse->days  }}}<?php echo '</td>
<td class="times_box">' ?>  {{{$oneCourse->times  }}}<?php echo '</td>
<td class="year_box">' ?>  {{{$oneCourse->year  }}}<?php echo '</td>
<td class="professors_box">' ?>  {{{$oneCourse->professors  }}}<?php echo '</td>
<td class=class="status_box">' ?>  {{{$oneCourse->status  }}}<?php echo '</td>
<td class="letter_grade_box">' ?>  {{{$oneCourse->letter_grade  }}}<?php echo '</td>
<td class="grade_points_box">' ?>  {{{$oneCourse->grade_points  }}}<?php echo '</td>
<td class="transfer_credits_box">' ?>  {{{$oneCourse->transfer_credits  }}}<?php echo '</td>
<td class="hes_credits_box">' ?>  {{{ $oneCourse->hes_credits  }}}<?php echo '</td>
</tr>

<tr class="data_row">
    <td class = "edit_or_delete_rows" colspan="22">
             <span>
                    <a class="edit_or_delete_text" href="/course_edit/' ?> {{$oneCourse->id}}<?php echo '" > Edit course information</a>
             </span>
             <span>
                    <a class="edit_or_delete_text" href="/delete/' ?> {{$oneCourse->id}}<?php echo '" > Delete course entry </a>
             </span>
    </td>
</tr>
<tr class = "separator_row">
    <td  colspan="22">
</tr>
  ';

  // strcasecmp ignores case
  if(strcasecmp($oneCourse->status, 'Complete') == 0)
  {
     $total_hes_credits += $oneCourse->hes_credits;
     $total_transfer_credits = $total_transfer_credits + $oneCourse->transfer_credits;
     $gradePoints_times_credits_all_added_together += $oneCourse->grade_points * ($oneCourse->hes_credits + $oneCourse->transfer_credits);
  }
 }

?>
              @endforeach
<tr class = "bottom_separator_row">
    <td  colspan="22">
</tr>
        <?php
    }
    else {
        echo '<p>No courses found<p>';
    }
    $total_credits = $total_hes_credits + $total_transfer_credits;
   ?>
</table><br>
<div class="font_wrapper">
<div>Total credits: {{{$total_credits}}} credits.  You have {{{$total_hes_credits}}} HES and {{{$total_transfer_credits}}} transfer credits.</div>
  <div class="fine_print">*Status must be marked as "Complete" for that course to count towards Total Credits and GPA</div><br>
<div>Your grade point average (GPA) is
<?php
if($total_hes_credits != 0 || $total_transfer_credits != 0)
{
?>
{{{ number_format(($gradePoints_times_credits_all_added_together / $total_credits), 2) }}}
<?php
}
else{
echo " 0.00</div> ";
}
?>
<div class="fine_print">**Enter Credits earned to calculate GPA.  Courses worth more credit hours have a bigger impact on your GPA.</div>
<div class="fine_print">**Degree Tracker truncates your Grade Points to 2 decimal places.  An A- is set as a 3.66 Grade Point.<br>
  If your school calculates GPA differently, please have your registrar email mydegreetracker@gmail.com</div><br>

Graduation Eligibility:  Keep up the good work!<br>
<div class="fine_print">You need ___ credits.  You have ___ credits left.</div>
<div class="fine_print">You need at least a ___ GPA.  You have a ___ GPA.</div><br>

</div>
</div>
</div>