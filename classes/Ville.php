<?php

include_once __DIR__ . './Database.php';

class Ville
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;

    }

    public function AfficherVilles()
    {
        $stmt = $this->db->prepare("SELECT * FROM ville JOIN pays ON ville.payID = pays.paysId");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
