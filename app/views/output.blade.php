<?php
echo '<div class="font_wrapper"><div class="indent_both_sides_for_table_shrinking">
    <table>
';

$gpa = 0.00;
$total_credits = 0;
$total_credits_that_count_towards_graduation = 0;
$total_concentration_credits = 0;
$total_hes_credits = 0;
$total_hes_credits_that_count_towards_graduation = 0;
$total_transfer_credits = 0;
$total_transfer_credits_that_count_towards_graduation = 0;
$gradePoints_times_credits_all_added_together = 0;
$alm_or_alb = Auth::user()->degree_program;

$concentration_credits = array(
        "HES" => 0,
        "not_HES" => 0,
);
$sciences_credits = 0;
$social_sciences_credits = 0;
$humanities_credits = 0;
$outside_concentration_credits = 0;
$expo_writing_credits = 0;
$writing_intens_credits = 0;
$lower_foreign_lang_credits = 0;
$upper_foreign_lang_credits = 0;
$quant_reasoning_credits = 0;
$moral_reasoning_credits = 0;
$minor_credits = 0;
$harv_instr_credits = 0;
$upper_level_credits = 0;
$residency_credits = 0;

$field_of_study_credits_with_high_enough_gpa = 0;
$total_field_of_study_grade_points_times_credits_all_added_together = 0;
$total_field_of_study_credits = 0;
$field_of_study_gpa = 0.0;
$field_of_study_test = false;

//Keeps track of credits that count towards both a field of study and a minor
$dual_credit_tracker_minor_one = 0;
$dual_credit_tracker_minor_two = 0;
$dual_credit_eligibility_one = true;
$dual_credit_eligibility_two = true;

$minor_one_credits = 0;
$minor_two_credits = 0;
$minor_one_credits_with_high_enough_gpa = 0;
$minor_two_credits_with_high_enough_gpa = 0;
$minor_one_test = false;
$minor_two_test = false;

$alb_graduation_eligibility_tests = array();
$alb_eligible_to_graduate = true;
$alm_eligible_to_graduate = true;

// Below are CONSTANTS, which are in ALL CAPS
$NUMBER_OF_GRADUATION_REQUIREMENT_TESTS = 20;
$MINIMUM_REQUIRED_HES_CREDITS = 64;
$MAXIMUM_ALLOWED_TRANSFER_CREDITS = 64;
$CREDITS_REQUIRED_TO_GRADUATE_ALB = 128;
$credits_required_to_graduate_alm = 50;  //This number varies depending on degree
$NUMBER_OF_CREDITS_REQUIRED_FOR_A_MINOR = 16;
$NUMBER_OF_CREDITS_REQUIRED_FOR_A_FIELD_OF_STUDY = 32;
$MIN_OVERALL_GPA_NEEDED_IN_FIELD_OF_STUDY_COURSES = 3.00;
$MIN_GRADE_POINT_NEEDED_IN_FIELD_OF_STUDY_COURSES = 2.67;
$MIN_GRADE_POINT_NEEDED_IN_MINOR_COURSES = 2.67;
$MAX_CREDITS_THAT_COUNT_TO_BOTH_A_FIELD_OF_STUDY_AND_A_MINOR = 8;

for($i = 0; $i < $NUMBER_OF_GRADUATION_REQUIREMENT_TESTS; $i++)
{
    $alb_graduation_eligibility_tests[$i] = false;
}

if($allCourses->isEmpty() != 1)
{

    foreach($allCourses as $oneCourse)
    {
        /* Don't put anything above the below line in relation to a particular user's courses, or else you will get
         data from courses belonging to other users as well */
        if($oneCourse->user == Auth::user())
        {
            ?> @include('includes.table_for_output') <?php

            if($oneCourse->field_of_study != '')
            {
                // A cumulative GPA in your Field of Study is required to be calculated, including the courses in which lower than a B- was received.
                $total_field_of_study_grade_points_times_credits_all_added_together += ($oneCourse->hes_credits + $oneCourse->transfer_credits) * $oneCourse->grade_points;
                $total_field_of_study_credits += $oneCourse->hes_credits + $oneCourse->transfer_credits;
                $field_of_study_gpa = number_format(($total_field_of_study_grade_points_times_credits_all_added_together / $total_field_of_study_credits), 2);

                // 32 credits in a Field of Study with a grade of B- or higher is required.
                if($oneCourse->grade_points >= $MIN_GRADE_POINT_NEEDED_IN_FIELD_OF_STUDY_COURSES)
                {
                    $field_of_study_credits_with_high_enough_gpa += $oneCourse->hes_credits + $oneCourse->transfer_credits;

                    if($field_of_study_credits_with_high_enough_gpa >= $NUMBER_OF_CREDITS_REQUIRED_FOR_A_FIELD_OF_STUDY && $field_of_study_gpa >= $MIN_OVERALL_GPA_NEEDED_IN_FIELD_OF_STUDY_COURSES)
                        $field_of_study_test = true;
                }
            }

            if($oneCourse->minor != '')
            {
                if(Auth::user()->minor_1 === $oneCourse->minor)
                {
                    // 16 credits in a Minor with a grade of B- or higher is required.
                    if($oneCourse->grade_points >= $MIN_GRADE_POINT_NEEDED_IN_MINOR_COURSES)
                    {
                        if($oneCourse->field_of_study != '' && $dual_credit_eligibility_one)
                        {
                            $temp = 0;
                            $temp = $dual_credit_tracker_minor_one;
                            //This code is only reached before a max of 8 credits has been reached
                            $dual_credit_tracker_minor_one += $oneCourse->hes_credits + $oneCourse->transfer_credits;

                            if($dual_credit_tracker_minor_one >= $MAX_CREDITS_THAT_COUNT_TO_BOTH_A_FIELD_OF_STUDY_AND_A_MINOR)
                            {
                                $dual_credit_eligibility_one = false;
                                $minor_one_credits_with_high_enough_gpa += $MAX_CREDITS_THAT_COUNT_TO_BOTH_A_FIELD_OF_STUDY_AND_A_MINOR - $temp;
                            }

                            if($dual_credit_tracker_minor_one < $MAX_CREDITS_THAT_COUNT_TO_BOTH_A_FIELD_OF_STUDY_AND_A_MINOR)
                            {
                                $minor_one_credits_with_high_enough_gpa += $oneCourse->hes_credits + $oneCourse->transfer_credits;
                            }
                        }
                        else if($oneCourse->field_of_study == '')
                        {
                            $minor_one_credits_with_high_enough_gpa += $oneCourse->hes_credits + $oneCourse->transfer_credits;
                        }

                        if($minor_one_credits_with_high_enough_gpa >= $NUMBER_OF_CREDITS_REQUIRED_FOR_A_MINOR)
                            $minor_one_test = true;
                    }
                }
                else if(Auth::user()->minor_2 === $oneCourse->minor)
                {
                    // 16 credits in a Minor with a grade of B- or higher is required.
                    if($oneCourse->grade_points >= $MIN_GRADE_POINT_NEEDED_IN_MINOR_COURSES)
                    {
                        if($oneCourse->field_of_study != '' && $dual_credit_eligibility_two)
                        {
                            $temp = 0;
                            $temp = $dual_credit_tracker_minor_two;
                            //This code is only reached before a max of 8 credits has been reached
                            $dual_credit_tracker_minor_two += $oneCourse->hes_credits + $oneCourse->transfer_credits;

                            if($dual_credit_tracker_minor_two >= $MAX_CREDITS_THAT_COUNT_TO_BOTH_A_FIELD_OF_STUDY_AND_A_MINOR)
                            {
                                $dual_credit_eligibility_two = false;
                                $minor_two_credits_with_high_enough_gpa += $MAX_CREDITS_THAT_COUNT_TO_BOTH_A_FIELD_OF_STUDY_AND_A_MINOR - $temp;
                            }

                            if($dual_credit_tracker_minor_two < $MAX_CREDITS_THAT_COUNT_TO_BOTH_A_FIELD_OF_STUDY_AND_A_MINOR)
                            {
                                $minor_two_credits_with_high_enough_gpa += $oneCourse->hes_credits + $oneCourse->transfer_credits;
                            }
                        }
                        else if($oneCourse->field_of_study == '')
                        {
                            $minor_one_credits_with_high_enough_gpa += $oneCourse->hes_credits + $oneCourse->transfer_credits;
                        }

                        if($minor_two_credits_with_high_enough_gpa >= $NUMBER_OF_CREDITS_REQUIRED_FOR_A_MINOR)
                            $minor_two_test = true;
                    }
                }
            }


            // The built-in PHP function strcasecmp ignores case. If it == 0, this means it is actually EQUAL.
            //The below adds to the total HES credits and to the total transfer credits from each course marked as "Complete."
            //However, if the student doesn't get at least a C-, the credit is removed after the GPA is calculated.
            if(strcasecmp($oneCourse->status, 'Complete') == 0)
            {
                $total_hes_credits += $oneCourse->hes_credits;
                $total_transfer_credits += $oneCourse->transfer_credits;

                //Overall GPA calculation, including courses in which lower than a C- is received.
                $total_credits = $total_hes_credits + $total_transfer_credits;

                //There shouldn't be both credit from HES and transferred in; however, adding them together allows for whichever one
                // is not 0 to get calculated correctly.  If there is both credit from HES and transferred in, just accept the HES credit.
                // Another course could be added if there were some unlikely reason that both credit sources were non-zero.
                if($oneCourse->hes_credits != 0 && $oneCourse->transfer_credits != 0)
                {
                    $oneCourse->transfer_credits = 0;
                    $oneCourse->save();
                }
                $gradePoints_times_credits_all_added_together += $oneCourse->grade_points * ($oneCourse->hes_credits + $oneCourse->transfer_credits);
                if($total_hes_credits != 0 || $total_transfer_credits != 0)
                {
                    $gpa = number_format(($gradePoints_times_credits_all_added_together / $total_credits), 2);
                }
                else
                {
                    $gpa = 0.00;
                }
            }

            if($gpa >= 2.0)
                $alb_graduation_eligibility_tests[0] = true;

            //At least a C- is needed for a course to count for anything.  However, a grade of less than C- will count towards the GPA.
            if($oneCourse->grade_points >= 1.67)
            {
                //Reduce the total number of credits that count towards graduation if the minimum grade was not met.
                $total_credits_that_count_towards_graduation += $oneCourse->hes_credits + $oneCourse->transfer_credits;
                $total_hes_credits_that_count_towards_graduation += $oneCourse->hes_credits;
                $total_transfer_credits_that_count_towards_graduation += $oneCourse->transfer_credits;

                //Minimum HES credits and maximum transfer credits requirements tests
                if($total_hes_credits_that_count_towards_graduation >= $MINIMUM_REQUIRED_HES_CREDITS)
                {
                    $alb_graduation_eligibility_tests[2] = true;
                }
                if($total_transfer_credits_that_count_towards_graduation < $MAXIMUM_ALLOWED_TRANSFER_CREDITS)
                {
                    if($total_transfer_credits_that_count_towards_graduation > $MAXIMUM_ALLOWED_TRANSFER_CREDITS)
                        $total_transfer_credits_that_count_towards_graduation = $MAXIMUM_ALLOWED_TRANSFER_CREDITS;
                }


                if($total_credits_that_count_towards_graduation >= $CREDITS_REQUIRED_TO_GRADUATE_ALB)
                    $alb_graduation_eligibility_tests[1] = true;


                //Distribution requirements:  Need 8 in each of the 3 concentrations, as well as 8 outside of any of the 3 concentrations
                if(strcasecmp($oneCourse->course_concentration, 'Sciences') == 0)
                {
                    $sciences_credits += $oneCourse->hes_credits + $oneCourse->transfer_credits;
                    if($sciences_credits >= 8)
                        $alb_graduation_eligibility_tests[4] = true;
                }
                if(strcasecmp($oneCourse->course_concentration, 'Social Sciences') == 0)
                {
                    $social_sciences_credits += $oneCourse->hes_credits + $oneCourse->transfer_credits;
                    if($social_sciences_credits >= 8)
                        $alb_graduation_eligibility_tests[5] = true;
                }
                if(strcasecmp($oneCourse->course_concentration, 'Humanities') == 0)
                {
                    $humanities_credits += $oneCourse->hes_credits + $oneCourse->transfer_credits;
                    if($humanities_credits >= 8)
                        $alb_graduation_eligibility_tests[6] = true;
                }
                if(strcasecmp($oneCourse->course_concentration, 'Outside') == 0)
                {
                    $outside_concentration_credits += $oneCourse->hes_credits + $oneCourse->transfer_credits;
                    if($outside_concentration_credits >= 8)
                        $alb_graduation_eligibility_tests[7] = true;
                }

                if(strcasecmp($oneCourse->course_attributes_1, 'Expository Writing') == 0 || strcasecmp($oneCourse->course_attributes_2, 'Expository Writing') == 0 || strcasecmp($oneCourse->course_attributes_3, 'Expository Writing') == 0 || strcasecmp($oneCourse->course_attributes_4, 'Expository Writing') == 0 || strcasecmp($oneCourse->course_attributes_5, 'Expository Writing') == 0)
                {
                    $expo_writing_credits += $oneCourse->hes_credits + $oneCourse->transfer_credits;
                    if($expo_writing_credits >= 8)
                        $alb_graduation_eligibility_tests[8] = true;
                }

                if(strcasecmp($oneCourse->course_attributes_1, 'Writing Intensive') == 0 || strcasecmp($oneCourse->course_attributes_2, 'Writing Intensive') == 0 || strcasecmp($oneCourse->course_attributes_3, 'Writing Intensive') == 0 || strcasecmp($oneCourse->course_attributes_4, 'Writing Intensive') == 0 || strcasecmp($oneCourse->course_attributes_5, 'Writing Intensive') == 0)
                {
                    $writing_intens_credits += $oneCourse->hes_credits + $oneCourse->transfer_credits;
                    if($writing_intens_credits >= 12)
                        $alb_graduation_eligibility_tests[9] = true;
                }

                if(strcasecmp($oneCourse->course_attributes_1, 'Foreign Language (lower)') == 0 || strcasecmp($oneCourse->course_attributes_2, 'Foreign Language (lower)') == 0 || strcasecmp($oneCourse->course_attributes_3, 'Foreign Language (lower)') == 0 || strcasecmp($oneCourse->course_attributes_4, 'Foreign Language (lower)') == 0 || strcasecmp($oneCourse->course_attributes_5, 'Foreign Language (lower)') == 0)
                {
                    $lower_foreign_lang_credits += $oneCourse->hes_credits + $oneCourse->transfer_credits;
                    if($lower_foreign_lang_credits >= 8)
                        $alb_graduation_eligibility_tests[10] = true;  //There are two foreign language tests, both at index 10, because either can be true for graduation eligibility.
                }

                if(strcasecmp($oneCourse->course_attributes_1, 'Foreign Language (upper)') == 0 || strcasecmp($oneCourse->course_attributes_2, 'Foreign Language (upper)') == 0 || strcasecmp($oneCourse->course_attributes_3, 'Foreign Language (upper)') == 0 || strcasecmp($oneCourse->course_attributes_4, 'Foreign Language (upper)') == 0 || strcasecmp($oneCourse->course_attributes_5, 'Foreign Language (upper)') == 0)
                {
                    $upper_foreign_lang_credits += $oneCourse->hes_credits + $oneCourse->transfer_credits;
                    if($upper_foreign_lang_credits >= 4)
                        $alb_graduation_eligibility_tests[10] = true;  //There are two foreign language tests, both at index 10, because either can be true for graduation eligibility.
                }

                if(strcasecmp($oneCourse->course_attributes_1, 'Quantitative Reasoning') == 0 || strcasecmp($oneCourse->course_attributes_2, 'Quantitative Reasoning') == 0 || strcasecmp($oneCourse->course_attributes_3, 'Quantitative Reasoning') == 0 || strcasecmp($oneCourse->course_attributes_4, 'Quantitative Reasoning') == 0 || strcasecmp($oneCourse->course_attributes_5, 'Quantitative Reasoning') == 0)
                {
                    $quant_reasoning_credits += $oneCourse->hes_credits + $oneCourse->transfer_credits;
                    if($quant_reasoning_credits >= 4)
                        $alb_graduation_eligibility_tests[11] = true;
                }

                if(strcasecmp($oneCourse->course_attributes_1, 'Moral Reasoning') == 0 || strcasecmp($oneCourse->course_attributes_2, 'Moral Reasoning') == 0 || strcasecmp($oneCourse->course_attributes_3, 'Moral Reasoning') == 0 || strcasecmp($oneCourse->course_attributes_4, 'Moral Reasoning') == 0 || strcasecmp($oneCourse->course_attributes_5, 'Moral Reasoning') == 0)
                {
                    $moral_reasoning_credits += $oneCourse->hes_credits + $oneCourse->transfer_credits;
                    if($moral_reasoning_credits >= 4)
                        $alb_graduation_eligibility_tests[12] = true;
                }

                if(strcasecmp($oneCourse->course_attributes_1, 'Harvard Instructor') == 0 || strcasecmp($oneCourse->course_attributes_2, 'Harvard Instructor') == 0 || strcasecmp($oneCourse->course_attributes_3, 'Harvard Instructor') == 0 || strcasecmp($oneCourse->course_attributes_4, 'Harvard Instructor') == 0 || strcasecmp($oneCourse->course_attributes_5, 'Harvard Instructor') == 0)
                {
                    $harv_instr_credits += $oneCourse->hes_credits + $oneCourse->transfer_credits;
                    if($harv_instr_credits >= 52)
                        $alb_graduation_eligibility_tests[13] = true;
                }

                if(strcasecmp($oneCourse->course_attributes_1, 'Residency') == 0 || strcasecmp($oneCourse->course_attributes_2, 'Residency') == 0 || strcasecmp($oneCourse->course_attributes_3, 'Residency') == 0 || strcasecmp($oneCourse->course_attributes_4, 'Residency') == 0 || strcasecmp($oneCourse->course_attributes_5, 'Residency') == 0)
                {
                    $residency_credits += $oneCourse->hes_credits + $oneCourse->transfer_credits;
                    if($residency_credits >= 16)
                        $alb_graduation_eligibility_tests[14] = true;
                }

                if(strcasecmp($oneCourse->course_attributes_1, 'Upper Level Course') == 0 || strcasecmp($oneCourse->course_attributes_2, 'Upper Level Course') == 0 || strcasecmp($oneCourse->course_attributes_3, 'Upper Level Course') == 0 || strcasecmp($oneCourse->course_attributes_4, 'Upper Level Course') == 0 || strcasecmp($oneCourse->course_attributes_5, 'Upper Level Course') == 0)
                {
                    $upper_level_credits += $oneCourse->hes_credits + $oneCourse->transfer_credits;
                    if($upper_level_credits >= 60)
                        $alb_graduation_eligibility_tests[15] = true;
                }

                //The three possible concentrations you must choose from are sciences, social sciences, or humanities.
                if(Auth::user()->user_concentration === $oneCourse->course_concentration)
                {
                    if($oneCourse->hes_credits > 0)
                        $concentration_credits["HES"] += $oneCourse->hes_credits;
                    else if($oneCourse->transfer_credits > 0)
                    {
                        //You can only transfer in at most 8 non-HES concentration credits
                        if($concentration_credits["not_HES"] < 8)
                        {
                            if($oneCourse->transfer_credits >= 8)
                                $concentration_credits["not_HES"] = 8;
                            else
                                $concentration_credits["not_HES"] += $oneCourse->transfer_credits;
                        }
                    }
                }


                // Be careful trying to access any database fields directly below or it might cause errors across user accounts.
                // The if statement (if($oneCourse->user == Auth::user())){} within the foreach loop is currently limiting the
                // database extractions to be from the current user's account.

                // The concentration credits are already checked for a maximum of 8 transfer concentration credits,
                // (as well as if they are in the student's concentration) above.
                $total_concentration_credits = $concentration_credits["not_HES"] + $concentration_credits["HES"];
                if($total_concentration_credits >= 40)
                {
                    $alb_graduation_eligibility_tests[3] = true;
                    $total_concentration_credits = 40;
                }
            }
        }
    }
    ?> @include('includes.table_for_outputs_bottom_separator_row') <?php
}

echo '<div class="indent_over_from_left_margin">
<div class="custom_h3"><div class="graduation_eligibility">Graduation Eligibility:&nbsp;<br>';

for($l = 0; $l < 16; $l++)
{
//  echo "<br>Test where L is " . $l . " results in: " . $alb_graduation_eligibility_tests[$l] . "<br>";
    if($alb_graduation_eligibility_tests[$l] == false)
    {
        $alb_eligible_to_graduate = false;
    }
}

if($alb_eligible_to_graduate === true)
{
    echo 'Congratulations!&nbsp;&nbsp;You have fulfilled all of the ALB requirements.';
}
/*            else if ($alm_eligible_to_graduate === true)
            {
                echo "Congratulations!&nbsp;&nbsp;You have fulfilled all of your ALM requirements.";
            }*/
else
    echo "Keep studying!&nbsp;&nbsp;You still have to fulfill the below requirements for your degree.";

if($field_of_study_test)
{
    echo "<br>Congratulations!&nbsp;&nbsp;You have fulfilled the requirements for the " . Auth::user()->field_of_study . " Field of Study.";
}

if($minor_one_test)
{
    echo "<br>Congratulations!&nbsp;&nbsp;You have fulfilled the requirements for the " . Auth::user()->minor_1 . " minor";
}

if($minor_two_test)
{
    echo "<br>Congratulations!&nbsp;&nbsp;You have fulfilled your requirements for the " . Auth::user()->minor_2 . " minor";
}

if($allCourses->isEmpty() == 1)
    echo '<div>';
echo '</div></div><br>
        <div class="fine_print_headers">Grade requirements:</div>
        <div class="fine_print">You must complete EXPO E-/S-25 with a B or higher for admission.<br>
        You must complete two other courses with a B or higher for admission.<br>
        You must achieve a C- or higher in all other courses.<br>
        You need an overall GPA of at least ';

if($alm_or_alb === "Bachelor's of Liberal Arts (ALB)")
{
    echo "2.0 GPA.&nbsp&nbsp";
}
else if ($alm_or_alb === "Master's of Liberal Arts (ALM)")
{
    echo "3.0 GPA.  ";
}
echo "You have a " . $gpa . " GPA.<br>";
echo "If you have a field of study, check further GPA and grade requirements below.<br>";
echo "If you have a minor, check further grade requirements below.</div>";
echo '<div class="fine_print_headers"><br>Credit requirements:</div><div class="fine_print">You have ';

if($alm_or_alb === "Bachelor's of Liberal Arts (ALB)")
{
    $credits_left = $CREDITS_REQUIRED_TO_GRADUATE_ALB - $total_credits_that_count_towards_graduation;
    if($credits_left >= 0)
        echo $credits_left;
    else
        echo 0;
}
else
{
    $credits_left = $credits_required_to_graduate_alm - $total_credits_that_count_towards_graduation;
    if($credits_left >= 0)
        echo $credits_left;
    else
        echo 0;
}

if($credits_left <0 )
    $credits_left = 0;
echo '&nbsp;credits left.</div>';

if($alm_or_alb === "Bachelor's of Liberal Arts (ALB)")
{
    echo '<div class="fine_print">You have ' . $total_hes_credits_that_count_towards_graduation . ' out of 64 minimum HES credits.</div>';
    echo '<div class="fine_print">You have ' . $total_transfer_credits_that_count_towards_graduation . ' out of 64 maximum transfer credits.</div>';

    echo '<div class="fine_print_headers"><br>Concentration requirements:</div><div class="fine_print">You have ' . $total_concentration_credits . '/40 total concentration credits.<br>32 of these credits must be from HES.&nbsp;&nbsp;You have have ' . $concentration_credits["HES"] . '/32.</div><br>';

    echo '<div class="fine_print_headers">Distribution requirements:</div>';
    echo '<div class="fine_print">You have ' . $sciences_credits . '/8 sciences credits.</div>';
    echo '<div class="fine_print">You have ' . $social_sciences_credits . '/8 social sciences credits.  </div>';
    echo '<div class="fine_print">You have ' . $humanities_credits . '/8 humanities credits.  </div>';
    echo '<div class="fine_print">You have ' . $outside_concentration_credits . '/8 credits outside the areas of concentration.  </div>';

    echo '<div class="fine_print_headers"><br>Writing requirements:</div>';
    echo '<div class="fine_print">You have ' . $expo_writing_credits . '/8 expository writing credits.  </div>';
    echo '<div class="fine_print">You have ' . $writing_intens_credits . '/12 writing intensive credits.  </div>';

    echo '<div class="fine_print_headers"><br>Foreign language requirements:</div>';
    echo '<div class="fine_print">You have ' . $lower_foreign_lang_credits . '/8 lower-level (or ' . $upper_foreign_lang_credits . '/4 upper-level) foreign language credits.</div>';

    echo '<div class="fine_print_headers"><br>Reasoning requirements:</div>';
    echo '<div class="fine_print">You have ' . $quant_reasoning_credits . '/4 quantitative reasoning credits.  </div>';
    echo '<div class="fine_print">You have ' . $moral_reasoning_credits . '/4 moral reasoning credits.  </div>';

    echo '<div class="fine_print_headers"><br>General requirements:</div>';
    echo '<div class="fine_print">You have ' . $harv_instr_credits . '/52 credits taught by Harvard instructors.  </div>';
    echo '<div class="fine_print">You have ' . $residency_credits . '/16 credits for the residency requirement.  </div>';
    echo '<div class="fine_print">You have ' . $upper_level_credits . '/60 upper-level credits. </div>';

    echo '<div class="fine_print_headers"><br>Requirements for an optional field of study:</div>';
    echo '<div class="fine_print">All courses for your field of study must be Harvard courses.</div>';
    echo '<div class="fine_print">Two courses may count toward both a field of study and a minor.</div>';
    echo '<div class="fine_print">Achieve at least a 3.00 GPA in your field of study courses.  You have a ' . $field_of_study_gpa . ' GPA.</div>';
    echo '<div class="fine_print">You have ' . $field_of_study_credits_with_high_enough_gpa . '/32 field of study credits with a B- or higher.</div>';

    echo '<div class="fine_print_headers"><br>Requirements for an optional first or second minor:</div>';
    echo '<div class="fine_print">All courses for your minor must be Harvard courses.</div>';
    echo '<div class="fine_print">Two courses may count toward both a field of study and a minor.</div>';
    echo '<div class="fine_print">You have ' . $minor_one_credits_with_high_enough_gpa . '/16 credits for a first minor with a B- or higher. </div>';
    echo '<div class="fine_print">You have ' . $minor_two_credits_with_high_enough_gpa . '/16 credits for a second minor with a B- or higher. </div>';
}
echo '</div>';

