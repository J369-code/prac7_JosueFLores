<?php
class Connection{
    protected $connection=null;
    private $host = "localhost";
    private $user = "root";
    private $password = "root";
    private $db = "proyecto";
    private $port = 3306;

    protected function connect(){
        try{
            $this->connection = mysqli_connect($this->host, $this->user, $this->password, $this->db, $this->port);
        } catch (Exception $e){
            echo "Error: " . $e->getMessage();
            die(" Connection failed");
        }
    }
}