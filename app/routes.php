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

// The auth filter prevents people who aren't logged in from gaining access to the below URLs.
Route::group(array('before' => 'auth'), function()
{
    Route::get('/course', 'CourseController@index');
    Route::get('/course/create', 'CourseController@create');
    Route::post('/course', 'CourseController@store');
    Route::post('/course_edit', 'CourseController@update');
    Route::post('/user_settings', 'UserController@postSettings');
    Route::get('/user_settings', 'UserController@getSettings');


    // The restrictPermission filter prevents a user from accessing other users' data by altering the URL.
    // Eventually it would be best to remove the id value from the URL entirely, as this is possible.
    Route::group(array('before' => 'restrictPermission'), function()
    {
        //Route::get('/course/{course_id}', 'CourseController@show');
        Route::get('/course_edit/{id?}', 'CourseController@edit');
        Route::get('/course_confirm_delete/{id?}', 'CourseController@confirm');
        Route::get('/delete/{id?}', 'CourseController@delete');
    });
});

/*
* Potential RESTful Routes for the "User" thing - not sure if I want this one though!
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

Route::get('register/verify/{confirmationCode}', [
    'as' => 'confirmation_path',
    'uses' => 'UserController@confirm'
]);



/**
 * The below routes should remain commented out unless being immediately used,
 * and then commented out again, because they pose security risks if left
 * open on an ongoing basis.
 */

/*
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
*/