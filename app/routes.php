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

Route::post('/list', array('before' => 'csrf', function()
{
    // Handle our posted form data.
    echo Pre::render($_POST);
}));

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