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

        $account = Account::search(Auth::user()->email);
        if($account->degree_program === "Master's of Liberal Arts (ALB)") {
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
            if (Input::get('sciences') === 'y') {
                $course->course_attributes_1 = "Sciences";} else if (Input::get('social_sciences') === 'y'){
                $course->course_attributes_1 = "Social Sciences";} else if (Input::get('humanities') === 'y'){
                $course->course_attributes_1 = "Humanities";} else if (Input::get('expository_writing') === 'y'){
                $course->course_attributes_1 = "Expository Writing";} else if (Input::get('writing_intensive') === 'y'){
                $course->course_attributes_1 = "Writing Intensive";} else if (Input::get('foreign_language') === 'y'){
                $course->course_attributes_1 = "Foreign Language";} else if (Input::get('moral_reasoning') === 'y'){
                $course->course_attributes_1 = "Moral Reasoning";} else if (Input::get('quantitative_reasoning') === 'y'){
                $course->course_attributes_1 = "Quantitative Reasoning";} else if (Input::get('foreign_language') === 'y'){
                $course->course_attributes_1 = "Foreign Language";} else if (Input::get('minor') === 'y'){
                $course->course_attributes_1 = "Minor";}
            if (Input::get('harvard_instructor') === 'y'){
                $course->course_attributes_2 = "Harvard Instructor";}
            if (Input::get('upper_level_course') === 'y'){
                $course->course_attributes_3 = "Upper Level Course";}
            if (Input::get('residency') === 'y'){
                $course->course_attributes_4 = "Residency";}
            if (Input::get('field_of_study') === 'y'){
                $course->course_attributes_5 = "Field of Study";}

        }
        $course->semester = Input::get('semester');
        $course->days = Input::get('days');
        $course->times = Input::get('times');
        $course->year = Input::get('year');
        $course->professors = Input::get('professors');
        $course->status = Input::get('status');
        $lg = Input::get('letter_grade');
        $course->letter_grade = $lg;
        if($lg === 'A')
                $course->grade_points = 4;
        else if($lg === 'A-')
            $course->grade_points = 3.66;
        else if($lg === 'B+')
            $course->grade_points = 3.33;
        else if($lg === 'B')
            $course->grade_points = 3;
        else if($lg === 'B-')
            $course->grade_points = 2.66;
        else if($lg === 'C+')
            $course->grade_points = 2.33;
        else if($lg === 'C')
            $course->grade_points = 2;
        else if($lg === 'C-')
            $course->grade_points = 1.66;
        else if($lg === 'D+')
            $course->grade_points = 1.33;
        else if($lg === 'D')
            $course->grade_points = 1;
        else if($lg === 'D-')
            $course->grade_points = .66;
        else
            $course->grade_points = 0;

        $course->transfer_credits = Input::get('transfer_credits');
        $course->hes_credits = Input::get('hes_credits');

        #add in the student's database so we can pull up one student's courses at a time
        $all_the_accounts = Account::all();
        if ($all_the_accounts->isEmpty() != TRUE) {
            foreach ($all_the_accounts as $possible_account) {
                if ($possible_account->email == Auth::user()->email) {
                    $course->account()->associate($possible_account);
                }
            }
        }
        $course->save();

        # The all() method will fetch all the rows from a Model/table
        $allCourses = Course::all();

        return Redirect::to('/course')
            ->with('allCourses', $allCourses)
            ->with('flash_message', 'New course added!');
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
            return Redirect::to('/course')->with('flash_message', 'Course not found!');
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
            return Redirect::to('/course')->with('flash_message', 'Course not found!');
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
        return Redirect::to('/course_edit/' . $link)->with('flash_message','Your changes have been saved!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function delete($format)
    {
        $all_the_courses = Course::all();
        if ($all_the_courses->isEmpty() != TRUE) {
            foreach ($all_the_courses as $possible_course_to_delete) {
                if ($possible_course_to_delete->id == $format) {
                    $possible_course_to_delete->delete();
                }
            }
        }
        return Redirect::to('/course')
            ->with('flash_message', 'Course deleted!');
    }
}
