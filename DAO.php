<?php
session_start();
$servername = "us-cdbr-iron-east-05.cleardb.net";
$dbname = "heroku_460fd0693927d5a";
$username = "bcc29ebdb3e631";
$password = "0a186730";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
    $_SESSION['conn'] = $conn; 
    echo $conn;
    }
catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }
?>