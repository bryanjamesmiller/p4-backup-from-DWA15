<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('accounts', function($table) {
            $table->increments('id');

            $table->timestamps();

            $table->string('student_name');
            $table->string('email');
            $table->string('school_name');
            $table->string('degree_program');
            $table->string('concentration');
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('accounts');
	}

}
