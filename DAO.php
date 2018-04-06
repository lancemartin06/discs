<?php
session_start();

class dao
{
    private $servername = "us-cdbr-iron-east-05.cleardb.net";
    private $dbname = "heroku_460fd0693927d5a";
    private $username = "bcc29ebdb3e631";
    private $password = "0a186730";

    public function getConnection() {
        try {
            $dbh = new PDO("mysql:host={$this->servername};dbname={$this->dbname}", $this->username, $this->password);

            return $dbh;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }
    public function confirmUser($email)
    {

        $conn =$this->getConnection();
        $stmt = $conn->prepare("SELECT * FROM user WHERE user.email=':email'", array(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true));
        $stmt->bindParam(':email', $email);
        $testUser = $conn->exec($stmt);
        $stmt->closeCursor();
        $conn = null;
        if($testUser > 0) {
            return 1;
        }
        else {
            return 0;
        }

    }
    public function addUser($email, $pass, $name, $phone)
    {
        $testUser = $this->confirmUser($email);
        $conn =$this->getConnection();
        echo (" testUser = " . $testUser);
        try {
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if ($testUser != 0)
            {
                $_SESSION['message'] = "Email is already in use!";
            }
            // prepare sql and bind parameters
            $stmt = $conn->prepare("INSERT INTO user (email, password, name, phone) VALUES (:email, :password, :name, :phone)");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $pass);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':phone', $phone);

            if($stmt->execute())
            {
                echo("New record created successfully");
            }
            else{
                echo(" Failure to create account");
            }
            $conn = null;
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }

    function getUser($email, $pass) {
        $testUser = $this->confirmUser($email);
        echo(" tested user");
        $conn =$this->getConnection();
        echo(" Got second connection");
        echo (" testUser = " . $testUser);
        try {
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if ($testUser = 0)
            {
                return $_SESSION['message'] = "Email is invalid :( You should sign up!";
            }
            // prepare sql and bind parameters
            $stmt = $conn->prepare("SELECT * FROM user WHERE user.email=':email' AND user.password=':password'", array(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true));
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $pass);

            if($stmt->execute())
            {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                $stmt->closeCursor();
                $_SESSION['email'] = $user['email'];
                $_SESSION['password'] = $user['password'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['phone'] = $user['phone'];
                $_SESSION['message'] = "Login Successful!";
                $_SESSION['logged_in'] = true;
            }
            else{
                $_SESSION['message'] = "Login Failed";
            }
            $conn = null;
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }
}

?>