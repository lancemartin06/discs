<?php
class DAO {

private $servername = "us-cdbr-iron-east-05.cleardb.net";
private $dbname = "heroku_460fd0693927d5a";
private $username = "bcc29ebdb3e631";
private $password = "0a186730";

    public function getConnection() {
    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }

    return $conn;
}
   
    public function addUser($email, $pass, $name, $phone) {
        $conn = getConnection();
        
        $result = $conn->query("SELECT * FROM user WHERE email='$email'");

        // If the result is greater than 0 than the user already exists. 
        if ($result > 0) {
        echo('User with this email already exists!');
        } else {
            $sql = "INSERT INTO user (email, password, name, phone) VALUES ('$email','$password','$name','$phone')";
            if ($conn->query($sql)){
                echo "You're All Signed Up!"
            } else {
                echo "Oh no. Something Went Wrong."
            }
        }
    }
    
    public function getUser($email, $pass){

    }
}
?>