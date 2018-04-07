

<html>
    <head>
        <link rel="stylesheet" href="CSS/mystyle.css">
        <link rel="shortcut icon" href="/Pictures/favicon.ico" type="image/x-icon"/>
        <link href='https://fonts.googleapis.com/css?family=Quicksand' rel='stylesheet'>
    </head>
    
    <body>
        <div class = "wrapper">
        <nav class='black'>
            <div class = "logo"><a href = "home.html"><img src="Pictures/untitled4.png" align="left"></a></div>
            <ul>
                <li><a <?php if(PAGENAME == "discHistory"){ echo " class =\"active\" ";} ?> href="diskHistory.php">Disk History</a></li>
                <li><a <?php if(PAGENAME == "courses"){ echo " class =\"active\" ";} ?> href="courses.php">Boise Courses</a></li>
                <li><a <?php if(PAGENAME == "starting"){ echo " class =\"active\" ";} ?> href="starting.php">Get Started</a></li>
                <li><a <?php if(PAGENAME == "lostDiscs"){ echo " class =\"active\" ";} ?> href="lostDiscs.php">Lost Discs</a></li>
                <li><a <?php if(PAGENAME == "logout"){ echo " class =\"active\" ";} ?> href="logout.php">Logout</a></li>
            </ul>
        </nav>

<?php
require_once('DAO.php');
?>