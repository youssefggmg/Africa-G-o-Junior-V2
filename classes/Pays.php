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
}

