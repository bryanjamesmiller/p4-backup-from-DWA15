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
            echo '<td>' . $oneCourse->course_name. '<td>';
            
            echo $oneCourse->course_delivery.' ';
            echo $oneCourse->crn_number.' ';
            echo $oneCourse->section . ' ';
                        echo $oneCourse->tuition . ' ';
                        echo $oneCourse->course_title . ' ';
                        echo $oneCourse->course_attributes_1 . ' ';
                        echo $oneCourse->course_attributes_2 . ' ';
                        echo $oneCourse->course_attributes_3 . ' ';
                        echo $oneCourse->course_attributes_4 . ' ';
                        echo $oneCourse->course_attributes_5 . ' ';
                        echo $oneCourse->semester . ' ';
                        echo $oneCourse->days . ' ';
                        echo $oneCourse->times . ' ';
                        echo $oneCourse->year . ' ';
                        echo $oneCourse->professors . ' ';
                        echo $oneCourse->status . ' ';
                        echo $oneCourse->letter_grade . ' ';
                        echo $oneCourse->grade_points . ' ';
                        echo $oneCourse->transfer_credits . ' ';
                        echo $oneCourse->hes_credits . ' ';

            echo '<br>';
        }
    }
    else {
        return 'No courses found';
    }
   ?>
   </p>
