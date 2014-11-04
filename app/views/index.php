<!DOCTYPE html>
<html>
<head>
    <title>Student PET - degree tracker</title>
    <meta charset="utf-8">
    <!-- <link rel="stylesheet" href="css/html5doctor-css-reset.css" type="text/css">
 This HTML resetter messes up the iPhone/mobile colors, although the rest works fine*-->
    <link rel="stylesheet" href="css/degree-tracker.css" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
    <?php include(app_path().'/views/php/layout-rows-generator.php'); ?>
</head>
<body>
<div id="heading">
    <h1 id="wheatImage">
        <img src="images/wheat logo.PNG" alt="wheat logo">
    </h1>
    <caption>
        <h1 id="studentName">
            <label for="name" id="name">Student Name: </label>
            <input type="text" class="textboxes" name="name" id="name">
        </h1>
    </caption>
</div>
<table id="myTable" class="tablesorter">
    <thead>
    <tr id="tableHeaders">
        <th>Course Number</th>
        <th>Course Delivery</th>
        <th>CRN#</th>
        <th>Section</th>
        <th>Tuition</th>
        <th>Course Title</th>
        <th colspan="5">Course Attributes</th>
        <th>Semester</th>
        <th>Day(s)</th>
        <th>Time(s)</th>
        <th>Year</th>
        <th>Professor(s)</th>
        <th>Status</th>
        <th>Grade</th>
        <th>Grade Points</th>
        <th>Transfer Credits</th>
        <th>HES Credits</th>
    </tr>
    </thead>

    <?php print_rows($rows); ?>
</table>