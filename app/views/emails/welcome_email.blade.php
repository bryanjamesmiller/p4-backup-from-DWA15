<div class="email_header">Welcome to Degree Tracker, {{$student_name}}!</div><br>

<div class="email_font">Please take a moment to confirm your Degree Tracker registration by clicking the link below:<br><br>

    {{ URL::to('register/verify/' . $confirmation_code) }}<br><br>

If you did not register for Degree Tracker, feel free to ignore this email.&nbsp;&nbsp;
    Alternatively, feel free to email Degree Tracker at <a href="mailto:mydegreetracker@gmail.com">mydegreetracker@gmail.com</a> to report
    an unauthorized attempt to signup with your email address.<br><br>

Thanks for registering at Degree Tracker.&nbsp;&nbsp;We hope this tool makes your student life easier to manage!<br><br>

    Best wishes to your continued academic success,<br></div><br>

<div class="email_header">The Degree Tracker Team</div>
