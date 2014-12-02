<!DOCTYPE html>
<html>
<head>
    <title>@yield('title','PET')</title>
        <meta charset="utf-8">
        <!-- <link rel="stylesheet" href="css/html5doctor-css-reset.css" type="text/css">
     This HTML resetter messes up the iPhone/mobile colors, although the rest works fine*-->
        <link rel="stylesheet" href="/css/degree-tracker.css" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

        @yield('head')
    </head>
    <body>
    @if(Session::get('flash_message'))
    	<div class='flash-message'>{{ Session::get('flash_message') }}</div>
    @endif

    @if(Auth::check())
        <div class="login_logout_signup_welcome"><a href='/logout'>Log out {{ Auth::user()->email; }}</a></div>
    @else
        <div class="login_logout_signup_welcome"><a href='/signup'>Sign up</a> or <a href='/login'>Log in</a></div>
    @endif
<div class="font_wrapper_sign_in_log_in">
    <h1 class="welcome_header">Welcome to Degree Tracker<br>
    <div class="welcome_header_subtitle">A simple and fun tool for you and your school to organize your planned and completed courses</div> </h1>
</div>

    @yield('top')

    @yield('middle')

    @yield('bottom')

</body>
</html>