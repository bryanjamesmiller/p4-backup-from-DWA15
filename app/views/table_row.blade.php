{{ Form::open(array('url' => '/list')) }}
<tr>

    <td> {{Form::text('courseNumber', '', array('id' => 'courseNumber'))}}</td>
    <td>
        <select class="dropboxlabels" name="courseDelivery" id="courseDelivery">
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
    <td> {{Form::text('crnNumber', '', array('id' => 'crnNumber'))}}</td>
    <td> {{Form::text('sectionNumber', '', array('id' => 'sectionNumber'))}}</td>
    <td> {{Form::text('tuition', '', array('id' => 'tuition'))}}</td>
    <td> {{Form::text('courseTitle', '', array('id' => 'courseTitle'))}}</td>

    @include('course_attributes_columns')

    <td>
        <select class="dropboxlabels" name="courseSemester" id="courseSemester">
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
        <select class="dropboxlabels" name="courseStatus" id="courseStatus">
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
        <select class="dropboxlabels" name="letterGrade" id="letterGrade">
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
    <td> {{Form::text('gradePoints', '', array('id' => 'gradePoints'))}}</td>
    <td> {{Form::text('transferCredits', '', array('id' => 'transferCredits'))}}</td>
    <td> {{Form::text('hesCredits', '', array('id' => 'hesCredits'))}}</td>
</tr>
{{ Form::submit('Save Table and Calculate Program Information')}}
{{ Form::close() }}