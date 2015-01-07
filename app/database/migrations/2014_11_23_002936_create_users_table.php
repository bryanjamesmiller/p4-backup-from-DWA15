<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function($table) {

            $table->increments('id');
            $table->string('student_name');
            $table->string('school_name');
            $table->string('degree_program');
            $table->string('user_concentration');
            $table->string('field_of_study');
            $table->string('minor_1');
            $table->string('minor_2');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('remember_token',100);  //The 'remember_token' has a second parameter of 100 meaning
            $table->boolean('confirmed')->default(0);  //The boolean default for 'confirmed' is set to 0 meaning it is initialized to false.
            $table->string('confirmation_code')->nullable();  //The confirmation code is for the new user to confirm they own the email address they are trying to register with.
                                                            // It is given the nullable() method so that we can set it to null after the code has been used.  This way, duplicate codes (unlikely to begin with) won't occur.
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }

}
