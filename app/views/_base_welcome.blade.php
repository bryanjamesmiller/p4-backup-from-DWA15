<!DOCTYPE html>
<html>
<head>
    <title>@yield('title','PET')</title>
        <meta charset="utf-8">
        {{-- <link rel="stylesheet" href="css/html5doctor-css-reset.css" type="text/css">
     This HTML resetter messes up the iPhone/mobile colors, although the rest works fine*--}}
        <link rel="stylesheet" href="/css/degree-tracker.css" type="text/css">
        <link rel="stylesheet" href="/css/degree-tracker-base-welcome.css" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" href="/images/rsz_degreetracker_logo.ico">
        @yield('head')
    </head>
    <body>

<div class="box_wrapper_to_keep_headers_lined_up_flush_on_the_right_side">
   {{-- <div class="welcome_header">Welcome to Degree Tracker<br></div> --}}
    <div class="shields_header"><img src="/images/background_colored_shield.png" alt="shields logo"></div>
    <div class="blurb_header">A simple and fun tool to organize your planned, current, and completed courses</div>
</div>

@if(Session::get('flash_message'))
    <div class='flash-message'>{{ Session::get('flash_message') }}</div>
@endif

    @yield('top')

    @yield('middle')

    @yield('bottom')
</body>
</html>