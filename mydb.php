<?php
  private $servername = "us-cdbr-iron-east-05.cleardb.net";
  private $db = "heroku_460fd0693927d5a";
  private $user = "bcc29ebdb3e631";
  private $pass = "0a186730";
// Create connection
$dao = new mysqli($servername, $user, $pass, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}



