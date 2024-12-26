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
        $stmt = $this->db->prepare("INSERT INTO ville (name, vill_descreption, type, image, payID) VALUES (:nom, :vill_descreption, :type, :image, :paysID)");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':vill_descreption', $vill_descreption);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':paysID', $paysID);
        $stmt->execute();
        return $stmt->rowCount();

    }

    public function supprimerVille($id)
    {
        $stmt = $this->db->prepare("DELETE FROM ville WHERE villID = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
