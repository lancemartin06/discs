<?php
class dao
{
    private $servername = "us-cdbr-iron-east-05.cleardb.net";
    private $dbname = "heroku_460fd0693927d5a";
    private $username = "bcc29ebdb3e631";
    private $password = "0a186730";

    public function getConnection() {
        echo("Trying connection!");
        try {
            $dbh = new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);

            return $dbh;
        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function addUser($email, $pass, $name, $phone)
    {

        $conn =$this->getConnection();

        try {
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $testUser = $conn->exec("SELECT * FROM user WHERE email='$email'");
            if ($testUser > 0)
            {
                throw new Exception("Email is already in use");
            }
            // prepare sql and bind parameters
            $stmt = $conn->prepare("INSERT INTO user (email, password, name, phone) VALUES (:email, :password, :name, :phone)");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':phone', $phone);

            $stmt->execute();

            echo "New record created successfully";
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }

    function getUser() {
        echo("hey! I'm in the get user!");
    }
}
