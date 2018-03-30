<?php
  private $servername = 'us-cdbr-iron-east-05.cleardb.net';
  private $db = 'heroku_460fd0693927d5a';
  private $user = 'bcc29ebdb3e631';
  private $pass = '0a186730';
// Create connection
//$conn = new mysqli($servername, $user, $pass);
$mysqli = new mysqli($servername, $user, $pass, $db);

// Check connection
if ($mysqli->connect_error) {
    echo("<html> Error with connecting to DB." . "\n" . $mysqli->connect_error . "\n" . $mysqli->connect_errno . "\n </html>");
    die("Connection failed: " . $conn->connect_error);
} 

?>


