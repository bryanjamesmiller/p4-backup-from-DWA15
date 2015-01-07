<div class="font_wrapper">
    {{ Form::open(array('action' => 'CourseController@store')) }}

    <div class="indent_over_from_left_margin">
        <?php

        if(Auth::user()->degree_program === "Bachelor's of Liberal Arts (ALB)")
        {
            ?>
                @include('includes.forms_for_alb_course_attributes')
            <?php
        }
        else
        {
            ?>
                @include('includes.forms_for_alm_course_attributes')
            <?php
        }
            ?>
            <br><div class="custom_h3"><div class="create_course_color">Enter course information below:</div></div>
            <div class="indent_from_right_margin">
                <table class="table_input_text_fills_each_cell">
                    <thead>
                        <tr>
                            <th class="add_course_title_header" colspan="2">Course Title</th>
                            <th class="add_days_and_times_header" colspan="2">Day(s) and Time(s)</th>
                            <th class="add_professors_header">Professor(s)</th>
                            <th class="add_semester_header" colspan="2">Semester</th>
                            <th class="add_course_delivery_header">Course Delivery</th>
                        </tr>
                    </thead>

                <tr>
                    <td class="course_title_box" colspan="2"> {{Form::text('course_title', '', array('class' => 'course_title'))}}</td>
                    <td class="days_and_times_box" colspan="2"> {{Form::text('days_and_times', '', array('class' => 'days_and_times'))}}</td>
                    <td class="professors_box"> {{Form::text('professors', '', array('class' => 'professors'))}}</td>
                    <td class="semester_box" colspan="2">
                        <select name="semester_term" class="semester_term">
                            <optgroup>
                                <option>Fall</option>
                                <option>January</option>
                                <option>Spring</option>
                                <option>June</option>
                                <option>Summer</option>
                                <option>Other</option>
                            </optgroup>
                        </select>
                        <?php
                            $current_year_plus_five = date("Y") + 5;
                            echo yearDropdownMenu();
                        ?>
                    </td>
                    <td class="course_delivery_box">
                        <select name="course_delivery" class="course_delivery">
                            <optgroup>
                                <option>Online</option>
                                <option>On Campus</option>
                                <option>Web Conference</option>
                                <option>Simulation</option>
                                <option>Hybrid</option>
                                <option>Internship</option>
                            </optgroup></select></td>
                </tr>

                <tr>
                    <th class="add_crn_number_header">CRN#</th>
                    <th class="add_course_number_header">Course Number</th>
                    <th  class="add_section_header">Section</th>
                    <th class="add_tuition_header">Tuition</th>
                    <!-- <th class="add_course_attributes_header" colspan="5">Course Attributes</th> -->
                    <th class="add_status_header">Status*</th>
                    <th class="add_letter_grade_header">Letter Grade*</th>
                    <!--<th class="add_grade_points_header">Grade Points</th> -->
                    <th class="add_transfer_credits_header">Transfer Credits*</th>
                    <th class="add_hes_credits_header">HES Credits*</th>
                </tr>

                <tr>
                    <td class="crn_number_box"> {{Form::text('crn_number', '', array('class' => 'crn_number'))}}</td>
                    <td class="course_number_box"> {{Form::text('course_number', '', array('class' => 'course_number'))}}</td>
                    <td class="section_box"> {{Form::text('section', '', array('class' => 'section'))}}</td>
                    <td class="tuition_box"> {{Form::text('tuition', '', array('class' => 'tuition'))}}</td>
                    <td class="status_box">
                        <select name="status" class="status">
                            <optgroup>
                                <option>Complete</option>
                                <option>In Progress</option>
                                <option>Scheduled</option>
                                <option>Incomplete</option>
                                <option>Other</option>
                            </optgroup></select></td>
                    <td class="letter_grade_box">
                        <select name="letter_grade" class="letter_grade">
                            <optgroup>
                                <option></option>
                                <option>A</option>
                                <option>A-</option>
                                <option>B+</option>
                                <option>B</option>
                                <option>B-</option>
                                <option>C+</option>
                                <option>C</option>
                                <option>C-</option>
                                <option>D+</option>
                                <option>D</option>
                                <option>D-</option>
                                <option>E</option>
                                <option>WD</option>
                                <option>WA</option>
                            </optgroup></select></td>
                    <!--<td class="grade_points_box"> {{--{{Form::text('grade_points', '', array('class' => 'grade_points'))}}--}}</td>-->
                    <td class="transfer_credits_box">
                        <select name="transfer_credits" class="transfer_credits">
                            <optgroup>
                                <option>0</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                                <option>13</option>
                                <option>14</option>
                                <option>15</option>
                                <option>16</option>
                            </optgroup>
                        </select>
                    </td>
                    <td class="hes_credits_box">
                        <select name="hes_credits" class="hes_credits">
                            <optgroup>
                                <option>0</option>
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option selected>4</option>
                                <option>5</option>
                                <option>6</option>
                                <option>7</option>
                                <option>8</option>
                                <option>9</option>
                                <option>10</option>
                                <option>11</option>
                                <option>12</option>
                                <option>13</option>
                                <option>14</option>
                                <option>15</option>
                                <option>16</option>
                            </optgroup>
                        </select>
                    </td>
                </tr>
            </table>
            </div>
            <div class="fine_print">*These fields must be filled out to impact GPA calculation.&nbsp;&nbsp;"Status" must be set to complete.</div>

        <div class="buttons">{{ Form::submit('Add Course')}}</div>
        {{ Form::close() }}

    </div></div></div><br><br>