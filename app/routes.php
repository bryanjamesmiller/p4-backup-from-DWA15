<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
    return View::make('index');
});

Route::get('/signup',
    array(
        'before' => 'guest',
        function() {
            return View::make('signup');
        }
    )
);

Route::post('/signup',
    array(
        'before' => 'csrf',
        function() {

            $user = new User;
            $user->email    = Input::get('email');
            $user->password = Hash::make(Input::get('password'));

            # Try to add the user
            try {
                $user->save();
            }
                # Fail
            catch (Exception $e) {
                return Redirect::to('/signup')->with('flash_message', 'Sign up failed; please try again.')->withInput();
            }

            # Log the user in
            Auth::login($user);


            #Create an Account for the user
            $account = new Account;
            $account ->student_name    = Input::get('student_name');
            $account ->email    = Input::get('email');
     //       $account ->degree_program =
            return Redirect::to('/')->with('flash_message', 'Welcome to Degree Tracker!');

        }
    )
);

Route::get('/login',
    array(
        'before' => 'guest',
        function() {
            return View::make('login');
        }
    )
);

Route::post('/login',
    array(
        'before' => 'csrf',
        function() {

            $credentials = Input::only('email', 'password');

            if (Auth::attempt($credentials, $remember = true)) {
                return Redirect::intended('/list')->with('flash_message', 'Welcome Back!');
            }
            else {
                return Redirect::to('/login')->with('flash_message', 'Log in failed; please try again.');
            }

            return Redirect::to('login');
        }
    )
);

Route::get('/logout', function() {

    # Log out
    Auth::logout();

    # Send them to the homepage
    return Redirect::to('/');

});

Route::get('/list', function(){
    $allCourses = Course::all();

    // Output all current courses that are saved in the database
    return View::make('list')
        ->with('allCourses', $allCourses);
});

Route::post('/list', array('before' => 'csrf', function() {
    // Output all current courses that are saved in the database

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
 //   $student_user = new User;
 //   $student_user->student_name = Auth::user()->student_name;
 //   $student_user->save();
 //   $course->student_user()->associate($student_user);
    $course->save();

    # The all() method will fetch all the rows from a Model/table
    $allCourses = Course::all();

    return Redirect::to('/list')
        ->with('allCourses', $allCourses)
        ->with('flash_message', 'New course added!');
}));

Route::get('/delete/{format?}', function($format = 'null') {
    $all_the_courses = Course::all();
    if($all_the_courses->isEmpty() != TRUE) {

        foreach ($all_the_courses as $possible_course_to_delete) {
            if ($possible_course_to_delete->id == $format) {
                $possible_course_to_delete->delete();
            }
        }
    }
    return Redirect::to('/list')
        ->with('flash_message', 'Course deleted!');
});

Route::get('/edit/{id?}', function($id = 'null') {

    try{
        $course = Course::findOrFail($id);
    }
    catch(exception $e){
        return Redirect::to('/list')->with('flash_message', 'Course not found!');
    }

    return View::make('edit')
        ->with('course', $course);
});


Route::post('/edit', function() {
    try {
        $course = Course::findOrFail(Input::get('id'));
    }
    catch(exception $e) {
        return Redirect::to('/list')->with('flash_message', 'Course not found!');
    }

    $edit_option = Input::get('edit_options');
    $course->$edit_option = Input::get('new_value');
    $course->save();

    $link = Input::get('id');
    return Redirect::to('/edit/' . $link)->with('flash_message','Your changes have been saved!');

});

Route::get('mysql-test', function() {

    # Print environment
    echo 'Environment: '.App::environment().'<br>';

    # Use the DB component to select all the databases
    $results = DB::select('SHOW DATABASES;');

    # If the "Pre" package is not installed, you should output using print_r instead
    echo Pre::render($results);

});

Route::get('/get-environment',function() {

    echo "Environment: ".App::environment();

});


Route::get('/trigger-error',function() {

    # Class Foobar should not exist, so this should create an error
    $foo = new Foobar;

});

# /app/routes.php
Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>environment.php</h1>';
    $path   = base_path().'/environment.php';

    try {
        $contents = 'Contents: '.File::getRequire($path);
        $exists = 'Yes';
    }
    catch (Exception $e) {
        $exists = 'No. Defaulting to `production`';
        $contents = '';
    }

    echo "Checking for: ".$path.'<br>';
    echo 'Exists: '.$exists.'<br>';
    echo $contents;
    echo '<br>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(Config::get('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    print_r(Config::get('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    }
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});