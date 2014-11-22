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
        <a href='/logout'>Log out {{ Auth::user()->email; }}</a>
    @else
        <a href='/signup'>Sign up</a> or <a href='/login'>Log in</a>
    @endif

    @yield('top')

    @yield('middle')

    @yield('bottom')

</body>
</html>