<?php
class Database
{
    //DB Params
    private $host = 'localhost';
    private $db_name = 'test';
    private $username = 'root';
    private $password = '';
    private $conn;

    //DB Connect
  
        protected function connect()
        {
            try {
                $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
                return $this->conn;
            } catch (\Throwable $th) {
                die("Connection failed: " . $this->conn->connect_error);
            }
        }
}
