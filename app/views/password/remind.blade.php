<div class="font_wrapper_sign_in_log_in">
<form action="{{ action('RemindersController@postRemind') }}" method="POST">
    <input type="email" name="email">
    <input type="submit" value="Email Link to Create New Password">
</form>
</div>