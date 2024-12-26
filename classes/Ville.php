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

    public function AjouterVille($nom, $vill_descreption, $type, $image, $paysID)
    {
        $stmt = $this->db->prepare("INSERT INTO ville (name, vill_descreption, type, image, paysID) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssi", $nom, $vill_descreption, $type, $image, $paysID);
        $stmt->execute();
        return $stmt->affected_rows;

    }
}
