<!DOCTYPE html>
<html>
<head>
    <title>@yield('title','PET')</title>
        <meta charset="utf-8">
        <!-- <link rel="stylesheet" href="css/html5doctor-css-reset.css" type="text/css">
     This HTML resetter messes up the iPhone/mobile colors, although the rest works fine*-->
        <link rel="stylesheet" href="/css/degree-tracker.css" type="text/css">
        <link rel="stylesheet" href="/css/degree-tracker-base.css" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" href="/images/rsz_degreetracker_logo.ico">
        @yield('head')
    </head>
    <body>

    @if(Auth::check())
        <span class="link_home"><a href="/course" class="header_butttons">Home</a></span><span class="login_logout_signup"><span class="account_settings_link"><a href="/user_settings" class="header_butttons">Account settings</a></span><span><a href='/logout' class="header_butttons">Log out:  {{ Auth::user()->email; }}</a></span></span><div class="clear_floats"></div>
    @else
        <div class="login_logout_signup"><a href='/signup' class="header_butttons">Sign up</a> or <a href='/login'>Log in</a></div>
    @endif

    <div class="box_wrapper_to_keep_headers_lined_up_flush_on_the_right_side">
        {{-- <div class="shields_header"><img src="/images/rsz_lukes_banner_cropped.png" alt="shields logo"></div>--}}
        <div class="shields_header"><img src="/images/background_colored_shield.png" alt="shields logo"></div>
    <div class="student_name_and_concentration_header">
    <span class="no_wrap"><span class="student_name_spacer">Student Name:&nbsp;&nbsp;<span class="smaller_subheader">{{{Auth::user()->student_name}}}</span></span></span>
    <span class="no_wrap"><span class="student_name_and_concentration_spacer"><span class="vertical_mark">|</span>Concentration:&nbsp;&nbsp;<span class="smaller_subheader">{{{Auth::user()->user_concentration}}}</span></span></span>
<br>
    <span class="no_wrap"><span class="concentration_and_field_of_study_spacer">Field of Study:&nbsp;&nbsp;<span class="smaller_subheader">{{{Auth::user()->field_of_study}}}</span></span></span>
    <br>
    <span class="no_wrap"><span class="field_of_study_and_minor_spacer">Minor 1:&nbsp;&nbsp;<span class="smaller_subheader">{{{Auth::user()->minor_1}}}</span></span></span>
    <span class="no_wrap"><span class="minor_and_minor_spacer"><span class="vertical_mark">|</span>Minor 2:&nbsp;&nbsp;<span class="smaller_subheader">{{{Auth::user()->minor_2}}}</span></span></span>

</div>
</div>

    @if(Session::get('flash_message'))
        <div class='flash-message'>{{ Session::get('flash_message') }}</div>
    @endif

    @yield('top')

@yield('middle')

@yield('bottom')

</body>
</html>