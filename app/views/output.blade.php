
<p>
<table id="myTable" class="tablesorter">
    <thead>
    <tr id="tableHeaders">
        <th id="course_number">Course Number</th>
        <th id="course_delivery">Course Delivery</th>
        <th id="crn_number">CRN#</th>
        <th  id="section">Section</th>
        <th id="tuition">Tuition</th>
        <th id="course_title">Course Title</th>
        <th id="course_attributes" colspan="5">Course Attributes</th>
        <th id="semester">Semester</th>
        <th id="days">Day(s)</th>
        <th id="time">Time(s)</th>
        <th id="year">Year</th>
        <th id="professors">Professor(s)</th>
        <th id="status">Status</th>
        <th id="letter_grade">Grade</th>
        <th id="grade_points">Grade Points</th>
        <th id="transfer_credits">Transfer Credits</th>
        <th id="hes_credits">HES Credits</th>
    </tr>
    </thead>
    <tr>

    <?php
    if($allCourses->isEmpty() != TRUE) {
        ?>
        @foreach($allCourses as $oneCourse)
                <td id="course_number">{{{$oneCourse->course_number}}}</td>
                       <td id="course_delivery" class="dropdowns">  {{{$oneCourse->course_delivery }}} </td>
                       <td id="crn_number">  {{{$oneCourse->crn_number }}}</td>
                       <td id="section">  {{{ $oneCourse->section  }}}</td>
                       <td id="tuition">  {{{$oneCourse->tuition  }}}</td>
                       <td id="course_title">  {{{$oneCourse->course_title  }}}</td>
                       <td class="dropdowns">  {{{$oneCourse->course_attributes_1  }}} </td>
                       <td class="dropdowns">  {{{$oneCourse->course_attributes_2  }}}</td>
                       <td class="dropdowns">  {{{$oneCourse->course_attributes_3  }}}</td>
                       <td class="dropdowns">  {{{$oneCourse->course_attributes_4  }}}</td>
                       <td class="dropdowns">  {{{$oneCourse->course_attributes_5  }}}</td>
                       <td class="dropdowns" id="semester">  {{{$oneCourse->semester  }}}</td>
                       <td id="days">  {{{$oneCourse->days  }}}</td>
                       <td id="times">  {{{$oneCourse->times  }}}</td>
                       <td id="year">  {{{$oneCourse->year  }}}</td>
                       <td id="professors">  {{{$oneCourse->professors  }}}</td>
                       <td class="dropdowns" id="status">  {{{$oneCourse->status  }}}</td>
                       <td class="dropdowns" id="letter_grade">  {{{$oneCourse->letter_grade  }}}</td>
                       <td class="dropdowns" id="grade_points">  {{{$oneCourse->grade_points  }}}</td>
                       <td id="transfer_credits">  {{{$oneCourse->transfer_credits  }}}</td>
                       <td id="hes_credits">  {{{ $oneCourse->hes_credits  }}}</td>
                   </tr>

                   <tr>
                       <td colspan="22">
                           <nav>
                               <ul>
                                   <li>
                                       <a href="/edit/{{$oneCourse->id}}" > edit course information (above)</a>
                                   </li>
                                   <li>
                                       <a href="/delete/{{$oneCourse->id}}" > delete course entry (above)</a>
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
   </p>
