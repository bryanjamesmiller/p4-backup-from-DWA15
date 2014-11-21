<table>
    <?php
    if($allCourses->isEmpty() != TRUE) {
        ?>
        @foreach($allCourses as $oneCourse)

    <tr>
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
              <th class="status_header">Status</th>
              <th class="letter_grade_header">Grade</th>
              <th class="grade_points_header">Grade Points</th>
              <th class="transfer_credits_header">Transfer Credits</th>
              <th class="hes_credits_header">HES Credits</th>
    </tr>
    <tr">
<td class="course_number_box">{{{$oneCourse->course_number}}}</td>
<td class="course_delivery_box">  {{{$oneCourse->course_delivery }}} </td>
<td class="crn_number_box">  {{{$oneCourse->crn_number }}}</td>
<td class="section_box">  {{{ $oneCourse->section  }}}</td>
<td class="tuition_box">  {{{$oneCourse->tuition  }}}</td>
<td class="course_title_box">  {{{$oneCourse->course_title  }}}</td>
<td class="course_attributes_box">  {{{$oneCourse->course_attributes_1  }}} </td>
<td class="course_attributes_box">  {{{$oneCourse->course_attributes_2  }}}</td>
<td class="course_attributes_box">  {{{$oneCourse->course_attributes_3  }}}</td>
<td class="course_attributes_box">  {{{$oneCourse->course_attributes_4  }}}</td>
<td class="course_attributes_box">  {{{$oneCourse->course_attributes_5  }}}</td>
<td class="semester_box">  {{{$oneCourse->semester  }}}</td>
<td class="days_box">  {{{$oneCourse->days  }}}</td>
<td class="times_box">  {{{$oneCourse->times  }}}</td>
<td class="year_box">  {{{$oneCourse->year  }}}</td>
<td class="professors_box">  {{{$oneCourse->professors  }}}</td>
<td class=class="status_box">  {{{$oneCourse->status  }}}</td>
<td class="letter_grade_box">  {{{$oneCourse->letter_grade  }}}</td>
<td class="grade_points_box">  {{{$oneCourse->grade_points  }}}</td>
<td class="transfer_credits_box">  {{{$oneCourse->transfer_credits  }}}</td>
<td class="hes_credits_box">  {{{ $oneCourse->hes_credits  }}}</td>
</tr>

<tr class="data_row">
    <td class = "edit_or_delete_rows" colspan="22">
             <span>
                    <a class="edit_or_delete_text" href="/edit/{{$oneCourse->id}}" > Edit course information</a>
             </span>
             <span>
                    <a class="edit_or_delete_text" href="/delete/{{$oneCourse->id}}" > Delete course entry </a>
             </span>
    </td>
</tr>
<tr class = "separator_row">
    <td  colspan="22">
</tr>
              @endforeach
<tr class = "bottom_separator_row">
    <td  colspan="22">
</tr>
        <?php
    }
    else {
        return 'No courses found';
    }
   ?>
