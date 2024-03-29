<?php

class RemindersController extends Controller {


        # Make sure to call the parent construct from BaseController or else
        # it won't get called IF WE DEFINE ONE HERE. (unlike Java).  We need
        # the parent to be called because we have csrf protection in it!

	/**
	 * Display the password reminder view.
	 *
	 * @return Response
	 */
	public function getRemind()
	{
		return View::make('password.remind');
	}

	/**
	 * Handle a POST request to remind a user of their password.
	 *
	 * @return Response
	 */
	public function postRemind()
	{
        $email = Input::get('email');

		switch ($response = Password::remind(Input::only('email'), function($message)
		{
			$message->subject('A reset for your Degree Tracker password has been requested');
		}))
		{
			case Password::INVALID_USER:
				return Redirect::back()->with('error', Lang::get($response))
				->with('flash_message','Sorry, the following email address has not been registered with Degree Tracker:&nbsp;&nbsp;' . $email . '.&nbsp;&nbsp;Please try again or sign up a new account.');

			case Password::REMINDER_SENT:
				return Redirect::back()->with('status', Lang::get($response))
                    ->with('flash_message','An email has been sent to ' . $email . ' with a link to reset your password.');
		}
	}

	/**
	 * Display the password reset view for the given token.
	 *
	 * @param  string  $token
	 * @return Response
	 */
	public function getReset($token = null)
	{
		if (is_null($token)) App::abort(404);

		return View::make('password.reset')->with('token', $token);
	}

	/**
	 * Handle a POST request to reset a user's password.
	 *
	 * @return Response
	 */
	public function postReset()
	{
		$credentials = Input::only(
			'email', 'password', 'password_confirmation', 'token'
		);

		$response = Password::reset($credentials, function($user, $password)
		{
			$user->password = Hash::make($password);

			$user->save();
		});

		switch ($response)
		{
			case Password::INVALID_PASSWORD:
			case Password::INVALID_TOKEN:
			case Password::INVALID_USER:
				return Redirect::back()->with('error', Lang::get($response));

			case Password::PASSWORD_RESET:
				return Redirect::to('/')
					->with('flash_message', 'Password successfully reset.');
		}
	}

}
