<div class="indent_over_from_left_margin">
    <div class="font_wrapper_sign_in_log_in">
        <div class="custom_h2"><span>Sign up</span><span class="lined_up_for_log_in">Already have an account?</span></div>

        {{Form::open(array('url' => '/signup'))}}<span class="lined_up_for_log_in"><a href="/login">Click here to log in.</a></span>

        Student's Name*<br>
        {{Form::text('student_name', '', array('class' => 'settings_student_name'))}}<br><br>

        <span>School*</span>

        <span class="lined_up">Field of Study (optional)</span><br>

    <span>
        <select name="school_name" class="settings_school_name">
            <optgroup>
                <option>Harvard Business School (HBS)</option>
                <option>Harvard College (HC)</option>
                <option>Harvard Divinity School (HDS)</option>
                <option selected="selected">Harvard Extension School (HES)</option>
                <option>Harvard Graduate School of Design (GSD)</option>
                <option>Harvard Graduate School of Education (HGSE)</option>
                <option>Harvard Kennedy School (HKS)</option>
                <option>Harvard Law School (HLS)</option>
                <option>Harvard Medical School (HMS)</option>
                <option>Harvard School of Dental Medicine (HSDM)</option>
                <option>Harvard School of Engineering and Applied Science (SEAS)</option>
                <option>Harvard School of Public Health (HSPH)</option>
            </optgroup>
        </select>
    </span>

    <span class="lined_up">
        <select name="field_of_study" class="settings_field_of_study">
            <optgroup>
                <option></option>
                <option>Creative Writing (Humanities)</option>
                <option>Dramatic Arts (Humanities)</option>
                <option>English (Humanities)</option>
                <option>Journalism (Humanities)</option>
                <option>Literature (Humanities)</option>
                <option>Philosophy and Ethics (Humanities)</option>
                <option>Religion (Humanities)</option>
                <option>Visual Arts (Humanities)</option>
                <option>Biology (Sciences)</option>
                <option>Biotechnology (Sciences)</option>
                <option>Computer Science (Sciences)</option>
                <option>Environmental Studies (Sciences)</option>
                <option>Mathematics (Sciences)</option>
                <option>Anthropology (Social Sciences)</option>
                <option>Business Administration and Management (Social Sciences)</option>
                <option>Economics (Social Sciences)</option>
                <option>Environmental Studies (Social Sciences)</option>
                <option>Government (Social Sciences)</option>
                <option>History (Social Sciences)</option>
                <option>International Relations (Social Sciences)</option>
                <option>Legal Studies (Social Sciences)</option>
                <option>Psychology (Social Sciences)</option>
            </optgroup>
        </select>
    </span>

        <br><br>

        <span>Degree Program*</span>
        <span class="lined_up">Minor 1 (optional)</span><br>

    <span>
        <select name="degree_program" class="settings_degree_program">
            <optgroup>
                <option>Bachelor's of Liberal Arts (ALB)</option>
                <option>Master's of Liberal Arts (ALM)</option>
            </optgroup>
        </select>
    </span>

    <span class="lined_up">
                <select name="minor_1" class="settings_minor">
                    <optgroup>
                        <option></option>
                        <option>Anthropology (Academic)</option>
                        <option>Biology (Academic)</option>
                        <option>Creative Writing (Academic)</option>
                        <option>Dramatic Arts (Academic)</option>
                        <option>Economics (Academic)</option>
                        <option>English (Academic)</option>
                        <option>Government (Academic)</option>
                        <option>History (Academic)</option>
                        <option>Mathematics (Academic)</option>
                        <option>Psychology (Academic)</option>
                        <option>Religion (Academic)</option>
                        <option>Quanitative Analysis (Academic)</option>
                        <option>Accounting (Professional)</option>
                        <option>Biotechnology (Professional)</option>
                        <option>Computer Science (Professional)</option>
                        <option>Business Communications (Professional)</option>
                        <option>Digital Media (Professional)</option>
                        <option>Engineering Science (Professional)</option>
                        <option>Environmental Studies (Professional)</option>
                        <option>Finance (Professional)</option>
                        <option>Journalism (Professional)</option>
                        <option>Leadership (Professional)</option>
                        <option>Legal Studies (Professional)</option>
                        <option>Marketing (Professional)</option>
                        <option>Museum Studies (Professional)</option>
                        <option>Organizational Behavior (Professional)</option>
                        <option>Public Speaking (Professional)</option>
                    </optgroup>
                </select>
    </span>

        <br><br>

        <span>Area of Concentration*</span><span class="lined_up">Minor 2 (optional)</span><br>

    <span>
        <select name="concentration" class="settings_concentration">
            <optgroup>
                <option>Sciences</option>
                <option>Social Sciences</option>
                <option>Humanities</option>
            </optgroup>
        </select>
    </span>

    <span class="lined_up">
                    <select name="minor_2" class="settings_minor">
                        <optgroup>
                            <option></option>
                            <option>Anthropology (Academic)</option>
                            <option>Biology (Academic)</option>
                            <option>Creative Writing (Academic)</option>
                            <option>Dramatic Arts (Academic)</option>
                            <option>Economics (Academic)</option>
                            <option>English (Academic)</option>
                            <option>Government (Academic)</option>
                            <option>History (Academic)</option>
                            <option>Mathematics (Academic)</option>
                            <option>Psychology (Academic)</option>
                            <option>Religion (Academic)</option>
                            <option>Quanitative Analysis (Academic)</option>
                            <option>Accounting (Professional)</option>
                            <option>Biotechnology (Professional)</option>
                            <option>Computer Science (Professional)</option>
                            <option>Business Communications (Professional)</option>
                            <option>Digital Media (Professional)</option>
                            <option>Engineering Science (Professional)</option>
                            <option>Environmental Studies (Professional)</option>
                            <option>Finance (Professional)</option>
                            <option>Journalism (Professional)</option>
                            <option>Leadership (Professional)</option>
                            <option>Legal Studies (Professional)</option>
                            <option>Marketing (Professional)</option>
                            <option>Museum Studies (Professional)</option>
                            <option>Organizational Behavior (Professional)</option>
                            <option>Public Speaking (Professional)</option>
                        </optgroup>
                    </select>
    </span>

        <br><br>

        <span>Email*</span><span class="lined_up">Confirm Email*</span><br>
        <span>{{Form::text('email', '', array('class' => 'settings_email_or_password'))}}</span><span class="lined_up">{{Form::text('email_confirmation', '', array('class' => 'settings_email_or_password'))}}</span><br><br>

        <span>Password (at least 8 characters)*</span><span class="lined_up">Confirm Password*</span><br>
        <span>{{Form::password('password', array('class' => 'settings_email_or_password'))}}</span><span class="lined_up">{{Form::password('password_confirmation',array('class' => 'settings_email_or_password'))}}</span><br><br>
        <div class="fine_print">*Fields labeled with asterisks are required for registration.</div>
        {{ Form::submit('Submit') }}

        {{ Form::close() }}
    </div>
</div>