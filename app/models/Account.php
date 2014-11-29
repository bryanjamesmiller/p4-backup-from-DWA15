<?php
/**
 * Created by PhpStorm.
 * User: B
 * Date: 11/6/2014
 * Time: 3:11 PM
 */

class Account extends Eloquent
{
    public function course()
    {
        # User has many Courses
        # Defines a one-to-many relationship
        return $this->hasMany('Course');
    }

    public static function search($query) {
     $account = Account::where('email', 'LIKE', '%$query%')->get();

    return $account;
    }
}
