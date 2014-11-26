<?php
/**
 * Created by PhpStorm.
 * User: B
 * Date: 11/26/2014
 * Time: 12:17 AM
 */

class IndexController extends BaseController{

    public function __construct(){
        # Make sure to call the parent construct from BaseController or else
        # it won't get called if we define one here (unlike Java).  We need
        # the parent to be called because we have csrf protection in it!
        parent::__construct();
    }

    public function getIndex(){
        return View::make('index');
    }

}