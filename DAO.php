<?php
// Dao.php
// class for getting products in MySQL
class Dao {

  private $host = "us-cdbr-iron-east-05.cleardb.net";
  private $db = "heroku_460fd0693927d5a";
  private $user = "bcc29ebdb3e631";
  private $pass = "0a186730";



      $dao = new PDO("mysql:host={$this->host};dbname={$this->db}", $this->user, $this->pass);
} 