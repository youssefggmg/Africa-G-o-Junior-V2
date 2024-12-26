<?php

include_once __DIR__ . './Database.php';

class Pays
{

    private $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function AfficherPays()
    {
        $stmt = $this->db->prepare("SELECT * FROM pays");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}