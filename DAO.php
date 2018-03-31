<?php
class Dao {
    private $servername = "us-cdbr-iron-east-05.cleardb.net";
    private $dbname = "heroku_460fd0693927d5a";
    private $username = "bcc29ebdb3e631";
    private $password = "0a186730";

public function getConnection() {
    echo "getting connection!";
    return new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
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
                echo "You're All Signed Up!";
            } else {
                echo "Oh no. Something Went Wrong.";
            }
        }
    }
    
    public function getUser($email, $pass) {

    }
}
