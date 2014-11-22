<?php
/**
 * Created by PhpStorm.
 * User: B
 * Date: 11/6/2014
 * Time: 3:11 PM
 */

class Course extends Eloquent
{
    protected $guarded = array('id');

    public function course()
    {
        # User has many Courses
        # Defines a one-to-many relationship
        return $this->hasMany('Course');
    }
}
