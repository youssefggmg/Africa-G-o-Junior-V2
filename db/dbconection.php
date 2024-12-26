<?php
class connection {
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $db = 'Africa_Géo_Junior_V2';
    public $conn;

    public function connect(){
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->db",$this->user,$this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "you have an error ". $e->getMessage();
        }
        return $this->conn;
    }

}
?>