

<table>
    <thead>
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
    </thead>
    <tr>

    <?php
    if($allCourses->isEmpty() != TRUE) {
        ?>
        @foreach($allCourses as $oneCourse)
                <td class="course_number">{{{$oneCourse->course_number}}}</td>
                       <td class="course_delivery" class="dropdowns">  {{{$oneCourse->course_delivery }}} </td>
                       <td class="crn_number">  {{{$oneCourse->crn_number }}}</td>
                       <td class="section">  {{{ $oneCourse->section  }}}</td>
                       <td class="tuition">  {{{$oneCourse->tuition  }}}</td>
                       <td class="course_title">  {{{$oneCourse->course_title  }}}</td>
                       <td class="dropdowns">  {{{$oneCourse->course_attributes_1  }}} </td>
                       <td class="dropdowns">  {{{$oneCourse->course_attributes_2  }}}</td>
                       <td class="dropdowns">  {{{$oneCourse->course_attributes_3  }}}</td>
                       <td class="dropdowns">  {{{$oneCourse->course_attributes_4  }}}</td>
                       <td class="dropdowns">  {{{$oneCourse->course_attributes_5  }}}</td>
                       <td class="dropdowns" class="semester">  {{{$oneCourse->semester  }}}</td>
                       <td class="days">  {{{$oneCourse->days  }}}</td>
                       <td class="times">  {{{$oneCourse->times  }}}</td>
                       <td class="year">  {{{$oneCourse->year  }}}</td>
                       <td class="professors">  {{{$oneCourse->professors  }}}</td>
                       <td class="dropdowns" class="status">  {{{$oneCourse->status  }}}</td>
                       <td class="dropdowns" class="letter_grade">  {{{$oneCourse->letter_grade  }}}</td>
                       <td class="dropdowns" class="grade_points">  {{{$oneCourse->grade_points  }}}</td>
                       <td class="transfer_credits">  {{{$oneCourse->transfer_credits  }}}</td>
                       <td class="hes_credits">  {{{ $oneCourse->hes_credits  }}}</td>
                   </tr>

                   <tr>
                       <td class = "edit_or_delete_rows" colspan="22">
                           <nav>
                               <ul>
                                   <li>
                                       <a class="edit_or_delete_text" href="/edit/{{$oneCourse->id}}" > edit course information (above)</a>
                                   </li>
                                   <li>
                                       <a class="edit_or_delete_text" href="/delete/{{$oneCourse->id}}" > delete course entry (above)</a>
                                   </li>
                               </ul>
                           </nav>
                       </td>
                   </tr>

              @endforeach

        <?php
    }
    else {
        return 'No courses found';
    }
   ?>
