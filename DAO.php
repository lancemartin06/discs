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
        $stmt = $conn->prepare("SELECT * FROM user WHERE email = :email");
        $stmt->bindParam(':email', $email);


        /*if($stmt->execute()){
            $result = $stmt->fetchAll();
        }
        else{
            $result = 0;
        }*/

        $result = $stmt->execute();

        $stmt->closeCursor();
        $conn = null;

        if($result->rowCount() > 0) {
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
        try {
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            if ($testUser == 1)
            {
                $_SESSION['message'] = "Email is already in use!";
            }
            //Hash Password
            $password = hash("sha256", trim(htmlentities($pass) . "fKd93Vmz!k*dAv5029Vkf9$3Aa"));
            // prepare sql and bind parameters
            $stmt = $conn->prepare("INSERT INTO user (email, password, name, phone) VALUES (:email, :password, :name, :phone)");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);
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

        $conn =$this->getConnection();
        try {
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $testUser = $this->confirmUser($email);
            if ($testUser == 0)
            {
                $_SESSION['message'] = "Email is invalid :( You should sign up!";
                header('Location: lostDiscs.php');
            }
            $password = hash("sha256", trim(htmlentities($pass) . "fKd93Vmz!k*dAv5029Vkf9$3Aa"));
            // prepare sql and bind parameters
            $stmt = $conn->prepare("SELECT * FROM user WHERE email = :email AND password = :password");
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $password);

            if($stmt->execute())
            {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);
                $_SESSION['user_id'] = $user['user_id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['password'] = $user['password'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['phone'] = $user['phone'];
                $_SESSION['message'] = "Login Successful!";
                $_SESSION['logged_in'] = true;

                $stmt->closeCursor();
            }
            else{
                $_SESSION['logged_in'] = false;
                $_SESSION['message'] = "Login Failed";
                $stmt->closeCursor();
            }
            $conn = null;
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }

    //This function is used to retrieve the user's discs from the database using either their name, email
    //or phone number. Many of the discs in the database didn't have full names or phone numbers.
    function getDiscs(){

        $conn =$this->getConnection();
        try {
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // prepare sql and bind parameters
            $stmt = $conn->prepare("SELECT * FROM disc_inventory WHERE user_id = :user_id");
            $stmt->bindParam(':user_id', $_SESSION['user_id']);
            if($stmt->execute())
            {
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                $_SESSION['foundDiscs'] = true;
                return $result;
            }
            else{
                $_SESSION['foundDiscs'] = false;
                return "No Discs Found!";
            }

        }
        catch(PDOException $e)
        {
            $conn = null;
            echo "Error: " . $e->getMessage();
        }

    }

    function bindDiscs($name, $phone, $user_id){

        $conn =$this->getConnection();
        try {
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("UPDATE disc_inventory SET user_id = :user_id WHERE contact_name = :nme OR phone_num = :phone");
            $stmt->bindParam(':user_id', $user_id);
            $stmt->bindParam(':nme', $name);
            $stmt->bindParam(':phone', $phone);

            if($stmt->execute()){
                $_SESSION['message'] = "Bound Discs";
            } else {
                $_SESSION['message'] = "No Discs";
            }

            $stmt->closeCursor();
            $conn = null;
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }
}

?>