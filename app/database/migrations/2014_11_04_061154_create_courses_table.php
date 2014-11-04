<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
        Schema::create('courses', function($table) {

            # Increments method will make a Primary, Auto-Incrementing field.
            # Most tables start off this way
            $table->increments('id');

            # This generates two columns: `created_at` and `updated_at` to
            # keep track of changes to a row
            $table->timestamps();

            # The rest of the fields...
            $table->string('course_number');
            $table->string('course_delivery');
            $table->integer('crn_number');
            $table->string('section');
            $table->decimal('tuition');
            $table->string('course_title');
            $table->string('course_attributes_1');
            $table->string('course_attributes_2');
            $table->string('course_attributes_3');
            $table->string('course_attributes_4');
            $table->string('course_attributes_5');
            $table->string('semester');
            $table->string('days');
            $table->string('times');
            $table->string('year');
            $table->string('professors');
            $table->string('status');
            $table->string('letter_grade');
            $table->double('grade_points');
            $table->double('transfer_credits');
            $table->double('hes_credits');

            # FYI: We're skipping the 'tags' field for now; more on that later.

        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
        Schema::drop('courses');
	}

}
