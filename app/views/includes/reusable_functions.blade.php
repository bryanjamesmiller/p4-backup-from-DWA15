<?php
/*
 * This function returns the HTML code necessary to be echoed out to produce
 * a drop-down box input form for a range of 15 years with the current year selected.
 */
function yearDropdownMenu() {

    // The start of the range is 7 years ahead
    $start_year = date("Y") + 7;

    // The end year is 7 years behind
    $end_year = date("Y") - 7;

    // The current year is the already selected default pre-populated year
    $selected = date('Y');

    // range of years
    $r = range($start_year, $end_year);

    //create the HTML select
    $select = '<select name="semester_year" class="semester_year">';
    foreach( $r as $year )
    {
        $select .= "<option value=\"$year\"";
        $select .= ($year==$selected) ? ' selected="selected"' : '';
        $select .= ">$year</option>\n";
    }
    $select .= '</select>';
    return $select;
}

function output_table($oneCourse)
{
}