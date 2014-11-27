<?php

class UserController extends \BaseController {

    public function __construct(){
        # Make sure to call the parent construct from BaseController or else
        # it won't get called if we define one here (unlike Java).  We need
        # the parent to be called because we have csrf protection in it!
        parent::__construct();
    }

    public function getSignup(){
        return View::make('signup');
    }

    public function postSignup(){
        $user = new User;
        $user->student_name    = Input::get('student_name');
        $user->email    = Input::get('email');
        $user->password = Hash::make(Input::get('password'));

        # Try to add the user
        try {
            $user->save();
        }
        # If signup attempt fails
        catch (Exception $e) {
            return Redirect::to('/signup')->with('flash_message', 'Sign up failed; please try again.')->withInput();
        }

        # Log the user in
        Auth::login($user);

        #Create an Account for the user
        $account = new Account;
        $account ->student_name = Input::get('student_name');
        $account ->email = Input::get('email');
        $account->degree_program = Input::get('degree_program');
        $account->concentration = Input::get('concentration');
        $account->save();

        return Redirect::to('/course')->with('flash_message', 'Sign-up Successful.  Welcome to Degree Tracker!');
    }

    public function getLogin(){
        return View::make('login');
    }

    public function postLogin(){
        $credentials = Input::only('email', 'password');

        if (Auth::attempt($credentials, $remember = true)) {
            return Redirect::intended('/course')->with('flash_message', 'Welcome Back!');
        }
        else {
            return Redirect::to('/login')->with('flash_message', 'Log in failed; please try again.');
        }

        return Redirect::to('login');
    }

    public function getLogout(){
        # Log out
        Auth::logout();

        # Send them to the homepage
        return Redirect::to('/login');
    }

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
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
