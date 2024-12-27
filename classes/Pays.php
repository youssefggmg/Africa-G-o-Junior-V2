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

    public function AjouterPays($nom, $population, $continent, $language, $image)
    {
        $stmt = $this->db->prepare("INSERT INTO pays (paysName,population_Number,language,image,continentID) VALUES (:nom, :population, :language, :image, :continent)");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':population', $population);
        $stmt->bindParam(':continent', $continent);
        $stmt->bindParam(':language', $language);
        $stmt->bindParam(':image', $image);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function supprimerPays($id)
    {
        $stmt = $this->db->prepare("DELETE FROM pays WHERE paysId = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function getSinglePays($id)
    {
        $stmt = $this->db->prepare("SELECT * FROM pays JOIN continent on pays.continentID = continent.continent_id WHERE paysId = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function modifierPays($id, $nom, $population, $continent, $language, $image)
    {
        $stmt = $this->db->prepare("UPDATE pays SET paysName = :nom, population_Number = :population, language = :language, image = :image, continentID = :continent WHERE paysId = :id");
        $stmt->bindParam(':nom', $nom);
        $stmt->bindParam(':population', $population);
        $stmt->bindParam(':language', $language);
        $stmt->bindParam(':image', $image);
        $stmt->bindParam(':continent', $continent);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->rowCount();
    }
}

