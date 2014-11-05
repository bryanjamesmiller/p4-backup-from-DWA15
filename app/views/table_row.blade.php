{{ Form::open(array('url' => 'our/target/route')) }}
@for ($i = 0; $i < 30; $i++)
<tr>

    <td><input type="text" class="textboxes" name="courseNumber" id="courseNumber"></td>
    <td>
        <select class="dropboxlabels" name="courseDelivery" id="'courseDelivery' . $i . ">
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
    <td><input type="text" class="textboxes" name="crnNumber" id="crnNumber"></td>
    <td><input type="text" class="textboxes" name="sectionNumber" id="sectionNumber"> </td>
    <td><input type="text" class="textboxes" name="tuition" id="tuition"></td>
    <td><input type="text" class="textboxes" name="courseTitle" id="courseTitle"> </td>
    <td>
        <select class="dropboxlabels" name="courseAttributes" id="courseAttributesA'.$i.'">
            <optgroup class="dropdowns">
                <option>Select Here</option>
                <option>...</option>
                <option>A</option>
                <option>B</option>
                <option>C</option>
                <option>X</option>
                <option>WI</option>
                <option>QR</option>
                <option>MR</option>
                <option>L</option>
                <option>HI</option>
                <option>*</option>
                <option>R</option>
                <option>FS</option>
                <option>M</option>
                <option>T</option>
                <option>P</option>
                <option>CS</option>
            </optgroup>
        </select>
    </td>
    <td>
        <select class="dropboxlabels" name="courseAttributes" id="courseAttributesB'.$i.'">
            <optgroup class="dropdowns">
                <option>Select Here</option>
                <option>...</option>
                <option>A</option>
                <option>B</option>
                <option>C</option>
                <option>X</option>
                <option>WI</option>
                <option>QR</option>
                <option>MR</option>
                <option>L</option>
                <option>HI</option>
                <option>*</option>
                <option>R</option>
                <option>FS</option>
                <option>M</option>
                <option>T</option>
                <option>P</option>
                <option>CS</option>
            </optgroup>
        </select>
    </td>
    <td>
        <select class="dropboxlabels" name="courseAttributes" id="courseAttributesC'.$i.'">
            <optgroup class="dropdowns">
                <option>Select Here</option>
                <option>...</option>
                <option>A</option>
                <option>B</option>
                <option>C</option>
                <option>X</option>
                <option>WI</option>
                <option>QR</option>
                <option>MR</option>
                <option>L</option>
                <option>HI</option>
                <option>*</option>
                <option>R</option>
                <option>FS</option>
                <option>M</option>
                <option>T</option>
                <option>P</option>
                <option>CS</option>
            </optgroup>
        </select>
    </td>
    <td>
        <select class="dropboxlabels" name="courseAttributes" id="courseAttributesD'.$i.'">
            <optgroup class="dropdowns">
                <option>Select Here</option>
                <option>...</option>
                <option>A</option>
                <option>B</option>
                <option>C</option>
                <option>X</option>
                <option>WI</option>
                <option>QR</option>
                <option>MR</option>
                <option>L</option>
                <option>HI</option>
                <option>*</option>
                <option>R</option>
                <option>FS</option>
                <option>M</option>
                <option>T</option>
                <option>P</option>
                <option>CS</option>
            </optgroup>
        </select>
    </td>
    <td>
        <select class="dropboxlabels" name="courseAttributes" id="courseAttributesE'.$i.'">
            <optgroup class="dropdowns">
                <option>Select Here</option>
                <option>...</option>
                <option>A</option>
                <option>B</option>
                <option>C</option>
                <option>X</option>
                <option>WI</option>
                <option>QR</option>
                <option>MR</option>
                <option>L</option>
                <option>HI</option>
                <option>*</option>
                <option>R</option>
                <option>FS</option>
                <option>M</option>
                <option>T</option>
                <option>P</option>
                <option>CS</option>
            </optgroup>
        </select>
    </td>
    <td>
        <select class="dropboxlabels" name="courseSemester" id="courseSemesterA'.$i.'">
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
    <td> <input type="text" class="textboxes" name="days" id="days"> </td>
    <td> <input type="text" class="textboxes" name="times" id="times"></td>
    <td> <input type="text" class="textboxes" name="year" id="year"></td>
    <td> <input type="text" class="textboxes" name="professor" id="professor"></td>
    <td>
        <select class="dropboxlabels" name="courseSemester" id="courseSemesterB'.$i.'">
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
        <select class="dropboxlabels" name="courseSemester" id="courseSemesterC'.$i.'">
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
    <td id="gradePoints"> <input type="text" class="textboxes" name="gradePoints" id="gradePoints"> </td>
    <td><input type="text" class="textboxes" name="transferCredits" id="transferCredits"></td>
    <td><input type="text" class="textboxes" name="hesCredits" id="hesCredits"></td>
</tr>
{{ Form::close() }}
@endfor