<?php
/* Database connection settings */
$host = 'usl-cdbr-iron-eas-05.cleardb.net';
$user = 'bcc29ebdb3e631';
$pass = '0a186730';
$db = 'heroku_460fd0693927d5a';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
