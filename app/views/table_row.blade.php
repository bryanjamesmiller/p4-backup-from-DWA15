<div id="heading">
        <h1 id="wheatImage">
            <img src="images/wheat logo.PNG" alt="wheat logo">
{{ Form::open(array('url' => '/list')) }}
        </h1>
        <caption>
            <h1>
        {{ Form::label('student_name','Student Name') }}
		{{ Form::text('student_name'); }}

{{-- the password value is not in the database as it currently is pending either Susan's login code she's going to give us, or maybe I can include it in database #2 and have it talk to database #1, or I could just add another migration file with updating the original database with 1 new value just like in Susan's class notes in migrations in lecture 8 I think. --}}
        {{ Form::label('student_password','Password') }}
		{{ Form::text('student_password'); }}

            </h1>
        </caption>
</div>
   <table>
        <thead>
        <tr>
            <th class="course_number_header">Course Number</th>
            <th class="course_delivery_header">Course Delivery</th>
            <th class="crn_number_header">CRN#</th>
            <th  class="section_header">Section</th>
            <th class="tuition_header">Tuition</th>
            <th class="course_title_header">Course Title</th>
            <th class="course_attributes_header" colspan="5">Course Attributes</th>
            <th class="semester_header">Semester</th>
            <th class="days_header">Day(s)</th>
            <th class="times_header">Time(s)</th>
            <th class="year_header">Year</th>
            <th class="professors_header">Professor(s)</th>
            <th class="status_header">Status</th>
            <th class="letter_grade_header">Grade</th>
            <th class="grade_points_header">Grade Points</th>
            <th class="transfer_credits_header">Transfer Credits</th>
            <th class="hes_credits_header">HES Credits</th>
        </tr>
        </thead>

    <tr>
    <td class="course_number_box"> {{Form::text('course_number', '', array('class' => 'course_number'))}}</td>
    <td class="course_delivery_box">
        <select name="course_delivery">
            <optgroup>
                <option>Select Here</option>
                <option>...</option>
                <option>On Campus</option>
                <option>Online</option>
                <option>Web Conference</option>
                <option>Simulation</option>
                <option>Hybrid</option>
                <option>Internship</option>
            </optgroup>
        </select>
    </td>
    <td class="crn_number_box"> {{Form::text('crn_number', '', array('class' => 'crn_number'))}}</td>
    <td class="section_box"> {{Form::text('section', '', array('class' => 'section'))}}</td>
    <td class="tuition_box"> {{Form::text('tuition', '', array('class' => 'tuition'))}}</td>
    <td class="course_title_box"> {{Form::text('course_title', '', array('class' => 'course_title'))}}</td>

    @include('course_attributes_columns')

    <td class="semester_box">
        <select name="semester">
            <optgroup>
                <option>Select Here</option>
                <option>...</option>
                <option>Fall</option>
                <option>January</option>
                <option>Spring</option>
                <option>June</option>
                <option>Summer</option>
                <option>Other</option>
            </optgroup>
        </select>
    </td>
    <td class="days_box"> {{Form::text('days', '', array('class' => 'days'))}}</td>
    <td class="times_box"> {{Form::text('times', '', array('class' => 'times'))}}</td>
    <td class="year_box"> {{Form::text('year', '', array('class' => 'year'))}}</td>
    <td class="professors_box"> {{Form::text('professors', '', array('class' => 'professors'))}}</td>
    <td class="status_box">
        <select name="status" class="status">
            <optgroup>
                <option>Select Here</option>
                <option>...</option>
                <option>Incomplete</option>
                <option>Scheduled</option>
                <option>In Progress</option>
                <option>Complete</option>
                <option>Transfer</option>
                <option>Other</option>
            </optgroup>
        </select>
    </td>
    <td class="letter_grade_box">
        <select name="letter_grade" class="letter_grade">
            <optgroup>
                <option>Select Here</option>
                <option>...</option>
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
            </optgroup>
        </select>
    </td>
    <td class="grade_points_box"> {{Form::text('grade_points', '', array('class' => 'grade_points'))}}</td>
    <td class="transfer_credits_box"> {{Form::text('transfer_credits', '', array('class' => 'transfer_credits'))}}</td>
    <td class="hes_credits_box"> {{Form::text('hes_credits', '', array('class' => 'hes_credits'))}}</td>
</tr>
</table>
{{ Form::submit('Add Course')}}
{{ Form::close() }}