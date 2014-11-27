<?php

class BaseController extends Controller {

    public function __construct()
    {
        /*
         * You have to explicitly call the parent constructor
         * or the parent constructor won't get called, unlike in Java.
         * CSRF protection on all POST actions site-wide to prevent computers
         * posing as valid users from spamming our site wil malicious data.
         */
        $this->beforeFilter('csrf', array('on' => 'post'));

        // Deny guest access to every page except the index, login, signup,
        // remind and reset pages for guest (unauthenticated) users.  Auth users
        // will have access to every page. Take out login and signup email or put
        // in an if auth statement.
        $this->beforeFilter('auth', array('except' => 'getIndex', 'getSignup', 'getLogin'));
    }
	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

}
