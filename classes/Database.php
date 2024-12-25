<?php

class Database
{
    private $host = 'localhost';
    private $dbName = 'africa_géo_junior_v2';
    private $userName = 'root';
    private $password = '';

    public $conx;

    public function connect()
    {
        $this->conx = null;

        try {
            $this->conx = new PDO("mysql:host={$this->host};dbname={$this->dbName}", $this->userName, $this->password);
            $this->conx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Erreur de connexion : {$e->getMessage()}";
        }

        return $this->conx;
    }

}

$conx_DB = new Database();
if ($conx_DB->connect()) {
    echo "Connexion réussie à la base de données.";
} else {
    echo "La connexion à la base de données a échoué.";
}