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
@stop

<p>
    <?php
    if($allCourses->isEmpty() != TRUE) {

        # Typically we'd pass $books to a View, but for quick and dirty demonstration, let's just output here...
        foreach($allCourses as $oneCourse) {
            echo $oneCourse->student_name.'<br>';
        }
    }
    else {
        return 'No courses found';
    }
   ?>
   </p>