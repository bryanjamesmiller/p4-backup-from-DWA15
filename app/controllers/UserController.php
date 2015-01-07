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

        # Step 1) Define the rules
        $rules = array(
            'minor_1' => 'different:minor_2'
        );
        # Step 2)
        $validator = Validator::make(Input::all(), $rules);
        # Step 3
        if($validator->fails()) {
            return Redirect::to('/signup')
                ->with('flash_message', 'Error:&nbsp;&nbsp;You may not choose the same minor twice.')
                ->withInput()
                ->withErrors($validator);
        }

        # Step 1) Define the rules
        $rules = array(
            'email' => 'unique:users,email'
        );
        # Step 2)
        $validator = Validator::make(Input::all(), $rules);
        # Step 3
        if($validator->fails()) {
            return Redirect::to('/signup')
                ->with('flash_message', 'Error:&nbsp;&nbsp;The email address you entered is already in the system.')
                ->withInput()
                ->withErrors($validator);
        }

        # Step 1) Define the rules
        $rules = array(
            'email' => 'email'
        );
        # Step 2)
        $validator = Validator::make(Input::all(), $rules);
        # Step 3
        if($validator->fails()) {
            return Redirect::to('/signup')
                ->with('flash_message', 'Error:&nbsp;&nbsp;The email address you entered has an invalid format.')
                ->withInput()
                ->withErrors($validator);
        }

        # Step 1) Define the rules
        $rules = array(
            'password' => 'min:8'
        );
        # Step 2)
        $validator = Validator::make(Input::all(), $rules);
        # Step 3
        if($validator->fails()) {
            return Redirect::to('/signup')
                ->with('flash_message', 'Error:&nbsp;&nbsp;The password you chose must have at least 8 characters.')
                ->withInput()
                ->withErrors($validator);
        }

        # Step 1) Define the rules
        $rules = array(
            'student_name' => 'required',
            'email' => 'required',
            'email_confirmation' => 'required',
            'password' => 'required',
            'password_confirmation' => 'required'
        );
        # Step 2)
        $validator = Validator::make(Input::all(), $rules);
        # Step 3
        if($validator->fails()) {
            return Redirect::to('/signup')
                ->with('flash_message', 'Error:&nbsp;&nbsp;You did not fill out all of the required information.')
                ->withInput()
                ->withErrors($validator);
        }

        # Step 1) Define the rules
        $rules = array(
            'email' => 'different:password'
        );
        # Step 2)
        $validator = Validator::make(Input::all(), $rules);
        # Step 3
        if($validator->fails()) {
            return Redirect::to('/signup')
                ->with('flash_message', 'Error:&nbsp;&nbsp;You may not use your email address as the password.')
                ->withInput()
                ->withErrors($validator);
        }

        # Step 1) Define the rules
        $rules = array(
            'email' => 'confirmed'
        );
        # Step 2)
        $validator = Validator::make(Input::all(), $rules);
        # Step 3
        if($validator->fails()) {
            return Redirect::to('/signup')
                ->with('flash_message', 'Error:&nbsp;&nbsp;You entered two different email addresses.  Please confirm your email address.')
                ->withInput()
                ->withErrors($validator);
        }

        # Step 1) Define the rules
        $rules = array(
            'password' => 'confirmed'
        );
        # Step 2)
        $validator = Validator::make(Input::all(), $rules);
        # Step 3
        if($validator->fails()) {
            return Redirect::to('/signup')
                ->with('flash_message', 'Error:&nbsp;&nbsp;You entered two different passwords.  Please confirm your password.')
                ->withInput()
                ->withErrors($validator);
        }

        if($validator->passes()) {
            $confirmation_code = str_random(30);  //The confirmation code for the new user to confirm they own the email address they are trying to register with.

            $user = new User;
            $user->student_name = Input::get('student_name');
            $user->school_name = Input::get('school_name');
            $user->degree_program = Input::get('degree_program');
            $user->user_concentration = Input::get('concentration');
            $user->field_of_study = Input::get('field_of_study');
            $user->minor_1 = Input::get('minor_1');
            $user->minor_2 = Input::get('minor_2');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->confirmation_code = $confirmation_code;
            $user->save();

            Mail::send('emails.welcome_email', array('confirmation_code' => $confirmation_code, 'student_name' => Input::get('student_name')), function($message) {
                $message->to(Input::get('email'), Input::get('username'))
                    ->subject('Degree Tracker verification link');
            });

            return Redirect::to('/login')->with('flash_message', 'Before logging in, please check your email to confirm ownership of your email account.&nbsp;&nbsp;Thanks!');
        }
    }

    public function getSettings(){
        return View::make('user_settings')->with('flash_message', 'Settings gotten.');
    }

    public function postSettings()
    {

        # Step 1) Define the rules
        $rules = array(
            'minor_1' => 'different:minor_2'
        );
        # Step 2)
        $validator = Validator::make(Input::all(), $rules);
        # Step 3
        if ($validator->fails()) {
            return Redirect::to('/user_settings')
                ->with('flash_message', 'Error:&nbsp;&nbsp;You may not choose the same minor twice.')
                ->withInput()
                ->withErrors($validator);
        }

        if ($validator->passes()) {

            $id = Auth::user()->id;

            try {
                $user = User::findOrFail($id);
            } catch (exception $e) {
                return Redirect::to('/user_settings')->with('flash_message', 'User not found.');
            }

            $user->student_name = Input::get('student_name');
            $user->degree_program = Input::get('degree_program');
            $user->user_concentration = Input::get('user_concentration');
            $user->field_of_study = Input::get('field_of_study');
            $user->minor_1 = Input::get('minor_1');
            $user->minor_2 = Input::get('minor_2');

            $user->save();

            return Redirect::to('/user_settings')->with('flash_message', 'Settings successfully updated.');
        }
    }

    public function getLogin(){
        return View::make('login');
    }

    public function postLogin()
    {
        $email = Input::get('email');  //This is the problem I think
        try {
            $user = User::whereEmail($email)->firstOrFail();
        } catch (exception $e) {
            return Redirect::to('/login')->with('flash_message', 'The email address ' . $email . ' has not been registered.');
        }

        if($user->confirmed == 1)
        {
            $credentials = Input::only('email', 'password');
            if (Auth::attempt($credentials, $remember = false))
            {
                return Redirect::intended('/course')->with('flash_message', 'Welcome!');
            }
            else
            {
                return Redirect::to('/login')->with('flash_message', 'The password you entered is invalid.&nbsp;&nbsp;Please try again, or reset your password.');
            }
        }
        else
            return Redirect::to('/login')->with('flash_message', 'Before logging in, please check your email to confirm ownership of your email account.&nbsp;&nbsp;Thanks!');

        /*
        $email = Input::get('email');
        try {
            $user = User::findOrFail($email);
        } catch (exception $e) {
            return Redirect::to('/user_settings')->with('flash_message', 'User not found.');
        }

        if($user->confirmed == 1) {
            $credentials = Input::only('email', 'password');
            if (Auth::attempt($credentials, $remember = false)) {
                return Redirect::intended('/course')
                    ->with('flash_message', 'Welcome!');
            } else {
                return Redirect::to('/login')->with('flash_message', 'Log-in failed.  Please try again, or reset your password.');
            }
        }
        return Redirect::to('/');*/
    }

    public function getLogout(){
        # Log out
        Auth::logout();

        # Send them to the homepage
        return Redirect::to('/login');
    }

    /**
     * Confirm the user owns the email address they registered with.
     * This also cuts down on invalid registrations significantly.
     *
     */
    public function confirm($confirmation_code)
    {
        if( ! $confirmation_code)
        {
            throw new InvalidConfirmationCodeException;
        }

        $user = User::whereConfirmationCode($confirmation_code)->first();

        if ( ! $user)
        {
            throw new InvalidUserCodeException;
        }

        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();

        Auth::login($user);

        return Redirect::to('/login')
            ->with('flash_message', 'Thank you for confirming your email address.  You may now log in.');
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
