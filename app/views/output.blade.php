<p>
<table id="myTable" class="tablesorter">
        <thead>
        <tr id="tableHeaders">
            <th>Course Number</th>
            <th>Course Delivery</th>
            <th>CRN#</th>
            <th>Section</th>
            <th>Tuition</th>
            <th>Course Title</th>
            <th colspan="5">Course Attributes</th>
            <th>Semester</th>
            <th>Day(s)</th>
            <th>Time(s)</th>
            <th>Year</th>
            <th>Professor(s)</th>
            <th>Status</th>
            <th>Grade</th>
            <th>Grade Points</th>
            <th>Transfer Credits</th>
            <th>HES Credits</th>
        </tr>
        </thead>
<tr>

    <?php
    if($allCourses->isEmpty() != TRUE) {

        # Typically we'd pass $books to a View, but for quick and dirty demonstration, let's just output here...
        foreach($allCourses as $oneCourse) {
               echo '<td id="course_number">' . $oneCourse->course_name. '</td>';

                        echo '<td id="course_delivery" class="dropdowns">' .$oneCourse->course_delivery.' </td>';
                        echo '<td id="crn_number">' .$oneCourse->crn_number.'</td> ';
                        echo '<td id="section">' . $oneCourse->section . '</td> ';
                                    echo '<td id="tuition">' .$oneCourse->tuition . '</td> ';
                                    echo '<td id="course_title">' .$oneCourse->course_title . '</td> ';
                                    echo '<td class="dropdowns">' .$oneCourse->course_attributes_1 . ' </td>';
                                    echo '<td class="dropdowns">' .$oneCourse->course_attributes_2 . '</td> ';
                                    echo '<td class="dropdowns">' .$oneCourse->course_attributes_3 . '</td> ';
                                    echo '<td class="dropdowns">' .$oneCourse->course_attributes_4 . '</td> ';
                                    echo '<td class="dropdowns">' .$oneCourse->course_attributes_5 . '</td> ';
                                    echo  '<td class="dropdowns" id="semester">' .$oneCourse->semester . '</td> ';
                                    echo  '<td id="days">' .$oneCourse->days . '</td> ';
                                    echo  '<td id="times">' .$oneCourse->times . '</td> ';
                                    echo  '<td id="year">' .$oneCourse->year . '</td> ';
                                    echo  '<td id="professors">' .$oneCourse->professors . '</td> ';
                                    echo  '<td class="dropdowns" id="status>' .$oneCourse->status . '</td> ';
                                    echo '<td class="dropdowns" id="letter_grade">' .$oneCourse->letter_grade . '</td> ';
                                    echo  '<class="dropdowns" td id="grade_points">' .$oneCourse->grade_points . '</td> ';
                                    echo  '<td id="transfer_credits">' .$oneCourse->transfer_credits . '</td>';
                                    echo '<td id="hes_credits">' . $oneCourse->hes_credits . '</td></tr> ';

            
        }
    }
    else {
        return 'No courses found';
    }
   ?>
   </p>
