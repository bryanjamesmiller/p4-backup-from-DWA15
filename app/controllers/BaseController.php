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

        # Only allow guests access to the login or signup pages
        $this->beforeFilter('guest',
            array(
                'only' => array('getLogin', 'getSignup', 'getIndex'
            )));

        # Only allow logged in auth users access to any other pages
        #$this->beforeFilter('auth',
        #    array(
        #        'only' => array('getLogin', 'getSignup'
        #        ));
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
