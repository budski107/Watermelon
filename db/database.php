<?php
class database{
        private $dsn;
        private $username;
        private $password;
        private $conn = "";
        
    public function __construct() {
        $this->dsn = 'mysql:host=localhost;dbname=johnland_watermelon';
        $this->password = 'bl4c<p3rl';
        $this->username = 'johnland_gary';
        
    }// constructor ends
    //function to get connection
    public function getConnection()
    {
        try {
            $this->conn = new PDO($this->dsn, $this->username, $this->password);
        } catch (PDOException $e) {
            $error_message = $e->getMessage();
            //include('database_error.php');
            exit();
        }
        return $this->conn;
    }//function getConnection ends
  }// class ends
?>