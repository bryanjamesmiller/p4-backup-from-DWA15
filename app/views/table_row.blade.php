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
<table id="myTable" class="tablesorter">
        <thead>
        <tr id="tableHeaders">
            <th>Course Number</th>
            <th>Course Delivery</th>
            <th>CRN#</th>
            <th>Section</th>
            <th>Tuition</th>
            <th>Course Title</th>
            <th colspan="5">Course Attributes</th>
            <th>Semester</th>
            <th>Day(s)</th>
            <th>Time(s)</th>
            <th>Year</th>
            <th>Professor(s)</th>
            <th>Status</th>
            <th>Grade</th>
            <th>Grade Points</th>
            <th>Transfer Credits</th>
            <th>HES Credits</th>
        </tr>
        </thead>
<tr>

    <td> {{Form::text('course_number', '', array('id' => 'course_number'))}}</td>
    <td>
        <select class="dropboxlabels" name="course_delivery" id="course_delivery">
            <optgroup class="dropdowns">
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
    <td> {{Form::text('crn_number', '', array('id' => 'crn_number'))}}</td>
    <td> {{Form::text('section', '', array('id' => 'section'))}}</td>
    <td> {{Form::text('tuition', '', array('id' => 'tuition'))}}</td>
    <td> {{Form::text('course_title', '', array('id' => 'course_title'))}}</td>

    @include('course_attributes_columns')

    <td>
        <select class="dropboxlabels" name="semester" id="semester">
            <optgroup class="dropdowns">
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
    <td> {{Form::text('days', '', array('id' => 'days'))}}</td>
    <td> {{Form::text('times', '', array('id' => 'times'))}}</td>
    <td> {{Form::text('year', '', array('id' => 'year'))}}</td>
    <td> {{Form::text('professors', '', array('id' => 'professors'))}}</td>
    <td>
        <select class="dropboxlabels" name="status" id="status">
            <optgroup class="dropdowns">
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
    <td>
        <select class="dropboxlabels" name="letter_grade" id="letter_grade">
            <optgroup class="dropdowns">
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
    <td> {{Form::text('grade_points', '', array('id' => 'grade_points'))}}</td>
    <td> {{Form::text('transfer_credits', '', array('id' => 'transfer_credits'))}}</td>
    <td> {{Form::text('hes_credits', '', array('id' => 'hes_credits'))}}</td>
</tr>
</table>
{{ Form::submit('Add Course')}}
{{ Form::close() }}