<?php
/**
 * Created by PhpStorm.
 * User: B
 * Date: 11/6/2014
 * Time: 3:11 PM
 */

class Course extends Eloquent {
    protected $guarded = array('id');

    public function user(){
        #Course belongs to User
        # Defines an inverse one-to-many relationship
        return $this->belongsTo('User');
    }
}