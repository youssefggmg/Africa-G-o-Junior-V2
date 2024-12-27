<?php

require_once 'Database.php';


class Ville
{

    private $db;

    public function __construct($db)
    {
        $this->db = $db;

    }

    public function AfficherVilles()
    {
        $stmt = $this->db->prepare("SELECT *, ville.image as imgVille FROM ville JOIN pays ON ville.payID = pays.paysId");
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

    public function getVilleById($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM ville JOIN pays on ville.payID = pays.paysId WHERE villID = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function ModifierVille($nom, $vill_descreption, $type, $image, $paysID, $id)
    {
        $stmt = $this->db->prepare("UPDATE ville SET name = :nom, vill_descreption = :vill_descreption, type = :type, image = :image, payID = :paysID WHERE villID = :id");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':vill_descreption', $vill_descreption);
        $stmt->bindParam(':type', $type);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':paysID', $paysID);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->rowCount();
    }
}