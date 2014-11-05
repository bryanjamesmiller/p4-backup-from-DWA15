<!DOCTYPE html>
<html>
<head>
    <title>@yield('title','PET')</title>
        <meta charset="utf-8">
        <!-- <link rel="stylesheet" href="css/html5doctor-css-reset.css" type="text/css">
     This HTML resetter messes up the iPhone/mobile colors, although the rest works fine*-->
        <link rel="stylesheet" href="css/degree-tracker.css" type="text/css">
        <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

        @yield('head')
    </head>
    <body>

    @yield('top')

    @yield('middle')

    @yield('bottom')

</body>
</html>