<html>
    <head>
        <link rel="stylesheet" href="mystyle.css">
        <link rel="shortcut icon" href="/Pictures/favicon.ico" type="image/x-icon"/>
        <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet'>
    </head>
    
    <body>
        <div class = "wrapper">
        <nav class='black'>
            <div class = "logo"><a href = "home.html"><img src="Pictures/untitled4.png" align="left"></a></div>
            <ul>
                <li><a<?php if($thisPage = 'diskHistory'){echo" class=selected "}?> href="diskHistory.php">Disk History</a></li>
                <li><a<?php if($thisPage = 'courses'){echo" class=selected "}?> href="courses.php">Boise Courses</a></li>
                <li><a<?php if($thisPage = 'starting'){echo" class=selected "}?> href="starting.php">Get Started</a></li>
                <li><a<?php if($thisPage = 'lostDiscs'){echo" class=selected "}?> href="lostDiscs.php">Lost Discs</a></li>
            </ul>
        </nav>
        
    