{{ Form::open(array('url' => '/list')) }}
<tr>

    <td> {{Form::text('courseNumber', '', array('id' => 'courseNumber'))}}</td>
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
    <td> {{Form::text('crnNumber', '', array('id' => 'crn_number'))}}</td>
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
    <td> {{Form::text('professor', '', array('id' => 'professor'))}}</td>
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
{{ Form::submit('Add Course')}}
{{ Form::close() }}