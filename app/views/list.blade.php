@extends('_base')

@section('head')

@stop

@section('title')
Degree Tracker PET
@stop

@section('top')
@stop

@section('middle')
    @include('table_row')
@stop

@section('bottom')
<p>
    <?php
    if($allCourses->isEmpty() != TRUE) {

        # Typically we'd pass $books to a View, but for quick and dirty demonstration, let's just output here...
        foreach($allCourses as $oneCourse) {
            echo $oneCourse->student_name.' ';
            echo $oneCourse->course_number.' ';
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
@stop

