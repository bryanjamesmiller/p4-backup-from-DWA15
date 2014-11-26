<div class="font_wrapper_sign_in_log_in">
Would you like to reset your password?<br>
Please enter your email address:
<form action="{{ action('RemindersController@postRemind') }}" method="POST">
    <input type="email" name="email"><br>
    <input type="submit" value="Email Link to Create New Password">
</form>
</div>