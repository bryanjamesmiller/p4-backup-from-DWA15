<?php
/**
 * Created by PhpStorm.
 * User: B
 * Date: 11/6/2014
 * Time: 3:11 PM
 */

class Course extends Eloquent {

    public function user(){
        #Course belongs to Account
        # Defines an inverse one-to-many relationship
        return $this->belongsTo('User');
    }
}