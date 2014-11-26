<?php
/**
 * Created by PhpStorm.
 * User: B
 * Date: 11/26/2014
 * Time: 12:17 AM
 */

class IndexController extends BaseController{

    public function getIndex(){
        return View::make('index');
    }

}