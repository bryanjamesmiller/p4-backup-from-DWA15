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

/*
 * RESTful Routes for the "Course" thing EXCEPT the edit and delete functions
 * because they have really weird put/delete methods
*/
Route::get('/course', 'CourseController@index');
Route::get('/course/create', 'CourseController@create');
Route::post('/course', 'CourseController@store');
Route::get('/course/{course_id}', 'CourseController@show');
Route::get('/edit/{id?}', 'CourseController@edit');
Route::post('/edit', 'CourseController@update');
Route::get('/delete/{format?}', 'CourseController@delete');


/*
* RESTful Routes for the "Account" thing
*
Route::get('/account', 'AccountController@index');
Route::get('/account/create', 'AccountController@create');
Route::post('/account', 'AccountController@store');
Route::get('/account/{account_id}', 'AccountController@show');
Route::get('/account/{account_id}/edit', 'AccountController@edit');
Route::put('/account/{account_id}', 'AccountController@update');
Route::delete('/account/{account_id}', 'AccountController@destroy');

/*
 * RESTful Routes for the "User" thing - not sure if I want this one though!
*
Route::get('/user', 'UserController@index');
Route::get('/user/create', 'UserController@create');
Route::post('/user', 'UserController@store');
Route::get('/user/{user_id}', 'UserController@show');
Route::get('/user/{user_id}/edit', 'UserController@edit');
Route::put('/user/{user_id}', 'UserController@update');
Route::delete('/user/{user_id}', 'UserController@destroy');
*/

Route::get('/', 'IndexController@getIndex');

Route::get('/signup', 'UserController@getSignup');
Route::post('/signup', 'UserController@postSignup');
Route::get('/login', 'UserController@getLogin');
Route::post('/login', 'UserController@postLogin');
Route::get('/logout', 'UserController@getLogout');

Route::get('/password/remind', 'RemindersController@getRemind');
Route::post('/password/remind', 'RemindersController@postRemind');

Route::get('/password/reset/{token}', 'RemindersController@getReset');
Route::post('/password/reset', 'RemindersController@postReset');

Route::get('/welcome', function(){

   return View::make('welcome');
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