<?php

class CourseController extends \BaseController
{

    public function __construct()
    {
        # Make sure to call the parent construct from BaseController or else
        # it won't get called if we define one here (unlike Java).  We need
        # the parent to be called because we have csrf protection in it!
        parent::__construct();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        // Output all current courses that are saved in the database
        $allCourses = Course::all();
        return View::make('course_index')
            ->with('allCourses', $allCourses);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $allCourses = Course::all();
        return View::make('course_create')
            ->with('allCourses', $allCourses);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $course = new Course();

        $course->course_number = Input::get('course_number');
        $course->course_delivery = Input::get('course_delivery');
        $course->crn_number = Input::get('crn_number');
        $course->section = Input::get('section');
        $course->tuition = Input::get('tuition');
        $course->course_title = Input::get('course_title');

        if(Auth::user()->degree_program === "Master's of Liberal Arts (ALM)") {
            if (Input::get('thesis') === 'y') {
                $course->course_attributes_1 = "Thesis";
            } else {
                $course->course_attributes_1 = "";
            }
            if (Input::get('capstone') === 'y') {
                $course->course_attributes_2 = "Capstone";
            } else {
                $course->course_attributes_2 = "";
            }
            if (Input::get('residency') === 'y') {
                $course->course_attributes_3 = "Residency";
            } else {
                $course->course_attributes_3 = "";
            }
            if (Input::get('proseminar') === 'y') {
                $course->course_attributes_4 = "Proseminar";
            } else {
                $course->course_attributes_4 = "";
            }
            if (Input::get('elective') === 'y') {
                $course->course_attributes_5 = "Elective";
            } else {
                $course->course_attributes_5 = "";
            }
        }
        else
        {
            $course_array = array();
            for($j = 0; $j < 5; $j++)
            {
                $course_array[$j] = '';
            }

            $i=0;
            if (Input::get('sciences') === 'y') {
                $course->course_concentration = "Sciences";} else if (Input::get('social_sciences') === 'y'){
                $course->course_concentration = "Social Sciences";} else if (Input::get('humanities') === 'y'){
                $course->course_concentration = "Humanities";} else if (Input::get('outside_concentrations') === 'y'){
                $course->course_concentration = "Outside";}

            if (Input::get('expository_writing') === 'y'){
                $course_array[$i] = "Expository Writing";
                $i = $i + 1;
            }
            if (Input::get('writing_intensive') === 'y'){
                $course_array[$i] = "Writing Intensive";
                $i = $i + 1;
            }
            if (Input::get('foreign_language_lower') === 'y'){
                $course_array[$i] = "Foreign Language (lower)";
                $i = $i + 1;
            }
            else if(Input::get('foreign_language_upper') === 'y'){
                $course_array[$i] = "Foreign Language (upper)";
                $i = $i + 1;
            }
            if (Input::get('moral_reasoning') === 'y'){
                $course_array[$i] = "Moral Reasoning";
                $i = $i + 1;
            }
            else if (Input::get('quantitative_reasoning') === 'y'){
                $course_array[$i] = "Quantitative Reasoning";
                $i = $i + 1;
            }
            if (Input::get('harvard_instructor') === 'y'){
                $course_array[$i] = "Harvard Instructor";
                $i = $i + 1;
            }
            if (Input::get('upper_level_course') === 'y'){
                $course_array[$i] = "Upper Level Course";
                $i = $i + 1;
            }
            if (Input::get('residency') === 'y'){
                $course_array[$i] = "Residency";
                $i = $i + 1;
            }

            if($i>5){
                return Redirect::to('/course/create')
                    ->with('flash_message', 'Error:  Select a maximum of 5 course attributes.')
                    ->withInput();
            }

            $course->course_attributes_1 = $course_array[0];
            $course->course_attributes_2 = $course_array[1];
            $course->course_attributes_3 = $course_array[2];
            $course->course_attributes_4 = $course_array[3];
            $course->course_attributes_5 = $course_array[4];

            if (Input::get('field_of_study') === 'y'){
                $course->field_of_study = Auth::user()->field_of_study;
            }
            if (Input::get('minor_1') === 'y'){
                $course->minor = Auth::user()->minor_1;
            }
            else if(Input::get('minor_2') === 'y'){
                $course->minor = Auth::user()->minor_2;
            }

        }
        $semester_year = Input::get('semester_year');
        $semester_term = Input::get('semester_term');
        $semester = $semester_year . " " . $semester_term;
        $course->semester_and_year = $semester;
        $course->days_and_times = Input::get('days_and_times');
        $course->professors = Input::get('professors');
        $course->status = Input::get('status');
        $lg = Input::get('letter_grade');
        $course->letter_grade = $lg;
        if($lg === 'A')
                $course->grade_points = 4;
        else if($lg === 'A-')
            $course->grade_points = 3.67;
        else if($lg === 'B+')
            $course->grade_points = 3.33;
        else if($lg === 'B')
            $course->grade_points = 3;
        else if($lg === 'B-')
            $course->grade_points = 2.67;
        else if($lg === 'C+')
            $course->grade_points = 2.33;
        else if($lg === 'C')
            $course->grade_points = 2;
        else if($lg === 'C-')
            $course->grade_points = 1.67;
        else if($lg === 'D+')
            $course->grade_points = 1.33;
        else if($lg === 'D')
            $course->grade_points = 1;
        else if($lg === 'D-')
            $course->grade_points = .67;
        else
            $course->grade_points = 0;

        $course->transfer_credits = Input::get('transfer_credits');
        $course->hes_credits = Input::get('hes_credits');

        # I'm not sure if the below line is necessar since I removed the "accounts" database;
        # however, I think it just associates a particular user with a particular course.
        $course->user()->associate(Auth::user());

        # Save all the new course information added above.
        $course->save();

        # The all() method will fetch all the rows from a Model/table
        $allCourses = Course::all();

        return Redirect::to('/course')
            ->with('allCourses', $allCourses)
            ->with('flash_message', 'New course added.');
    }


    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        try{
            $course = Course::findOrFail($id);
        }
        catch(exception $e){
            return Redirect::to('/course')->with('flash_message', 'Course not found.');
        }

        return View::make('course_edit')
            ->with('course', $course);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update()
    {
        try {
            $course = Course::findOrFail(Input::get('id'));
        }
        catch(exception $e) {
            return Redirect::to('/course')->with('flash_message', 'Course not found.');
        }

        $edit_option = Input::get('edit_options');
        $course->$edit_option = Input::get('new_value');
        if($edit_option === 'letter_grade') {
            $lg = Input::get('new_value');
            $course->letter_grade = $lg;
            if ($lg === 'A')
                $course->grade_points = 4;
            else if ($lg === 'A-')
                $course->grade_points = 3.66;
            else if ($lg === 'B+')
                $course->grade_points = 3.33;
            else if ($lg === 'B')
                $course->grade_points = 3;
            else if ($lg === 'B-')
                $course->grade_points = 2.66;
            else if ($lg === 'C+')
                $course->grade_points = 2.33;
            else if ($lg === 'C')
                $course->grade_points = 2;
            else if ($lg === 'C-')
                $course->grade_points = 1.66;
            else if ($lg === 'D+')
                $course->grade_points = 1.33;
            else if ($lg === 'D')
                $course->grade_points = 1;
            else if ($lg === 'D-')
                $course->grade_points = .66;
            else
                $course->grade_points = 0;
        }
        $course->save();

        $link = Input::get('id');
        return Redirect::to('/course_edit/' . $link)->with('flash_message','Your changes have been saved.');
    }

    /**
     * Show the form for confirming to delete the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function confirm($id)
    {
        try{
            $course = Course::findOrFail($id);
        }
        catch(exception $e){
            return Redirect::to('/course')->with('flash_message', 'Course not found.');
        }

        return View::make('course_confirm_delete')
            ->with('course', $course);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function delete($id)
    {
        try{
            $course = Course::findOrFail($id);
        }
        catch(exception $e){
            return Redirect::to('/course')->with('flash_message', 'Course not found.');
        }

        $course->delete();

        return Redirect::to('/course')
            ->with('flash_message', 'Course deleted.');
    }
}
