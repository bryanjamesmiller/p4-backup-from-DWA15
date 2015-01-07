<!DOCTYPE html>
<html lang="en-US">
	<head>
		<meta charset="utf-8">
	</head>
	<body>

		<div class="email_header">Hi,</div><br>

		<div class="email_font">
			This email has been sent in response to a request to reset your Degree Tracker password.&nbsp;&nbsp;
			To reset your password, complete this form:</p> {{ URL::to('password/reset', array($token)) }}<br><br>
			This link will expire in {{ Config::get('auth.reminder.expire', 60) }} minutes.&nbsp;&nbsp;If you did not make this request to
			reset your password, feel free to ignore this email.&nbsp;&nbsp;Alternatively, feel free to email Degree
				Tracker at <a href="mailto:mydegreetracker@gmail.com">mydegreetracker@gmail.com</a> to report an unauthorized attempt to signup with your email address.<br><br>
		</div>

		Best wishes to your continued academic success,<br><br></div>

		<div class="email_header">The Degree Tracker Team</div>

	</body>
</html>
