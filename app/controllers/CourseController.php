<?php

class CourseController extends \BaseController {

    public function __construct(){
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
        $allCourses = Course::all();

        // Output all current courses that are saved in the database
        return View::make('course')
            ->with('allCourses', $allCourses);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{


    }


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
        $course_number = Input::get('course_number');
        $course_delivery = Input::get('course_delivery');
        $crn_number = Input::get('crn_number');
        $section= Input::get('section');
        $tuition= Input::get('tuition');
        $course_title= Input::get('course_title');
        $course_attributes_1 = Input::get('course_attributes_1');
        $course_attributes_2 = Input::get('course_attributes_2');
        $course_attributes_3 = Input::get('course_attributes_3');
        $course_attributes_4 = Input::get('course_attributes_4');
        $course_attributes_5 = Input::get('course_attributes_5');

        $semester = Input::get('semester');
        $days = Input::get('days');
        $times = Input::get('times');
        $year = Input::get('year');
        $professors = Input::get('professors');
        $status= Input::get('status');
        $letter_grade = Input::get('letter_grade');
        $grade_points = Input::get('grade_points');
        $transfer_credits = Input::get('transfer_credits');
        $hes_credits = Input::get('hes_credits');

        $course = new Course();

        $course->course_number = $course_number;
        $course->course_delivery = $course_delivery;
        $course->crn_number = $crn_number;
        $course->section = $section;
        $course->tuition = $tuition;
        $course->course_title = $course_title;
        $course->course_attributes_1 = $course_attributes_1;
        $course->course_attributes_2 = $course_attributes_2;
        $course->course_attributes_3 = $course_attributes_3;
        $course->course_attributes_4 = $course_attributes_4;
        $course->course_attributes_5 = $course_attributes_5;
        $course->semester = $semester;
        $course->days = $days;
        $course->times = $times;
        $course->year = $year;
        $course->professors = $professors;
        $course->status = $status;
        $course->letter_grade = $letter_grade;
        $course->grade_points = $grade_points;
        $course->transfer_credits = $transfer_credits;
        $course->hes_credits = $hes_credits;

        #add in the student's database so we can pull up one student's courses at a time
        $all_the_accounts =Account::all();
        if($all_the_accounts->isEmpty() != TRUE) {
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
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
