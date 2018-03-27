<?php
// Dao.php
// class for getting products in MySQL
class Dao {

  private $host = "us-cdbr-iron-east-05.cleardb.net";
  private $db = "heroku_460fd0693927d5a";
  private $user = "bcc29ebdb3e631";
  private $pass = "0a186730";


  private function getConnection () {
    try {
      $conn =
        new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user,
            $this->pass);
      $this->logger->logDebug("Established a database connection.");
      return $conn;
    } catch (Exception $e) {
      echo "connection failed: " . $e->getMessage();
      $this->logger->logFatal("The database connection failed.");
    }
  }
  public function getDiscs () {
     $conn = $this->getConnection();
     $query = $conn->prepare("select * from disc_inventory");
     $query->setFetchMode(PDO::FETCH_ASSOC);
     $query->execute();
     $results = $query->fetchAll();
     $this->logger->logDebug(__FUNCTION__ . " " . print_r($results,1));
     return $results;
  }

} 