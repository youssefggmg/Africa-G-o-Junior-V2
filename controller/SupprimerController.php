<?php

require_once '../classes/Database.php';
require_once '../classes/Ville.php';

class SupprimerController
{
    private $villeModel;
    public function __construct()
    {
        $DB = new Database();
        $conx_DB = $DB->connect();
        $this->villeModel = new Ville($conx_DB);
    }

    public function supprimerVille($id)
    {
        $result = $this->villeModel->supprimerVille($id);
        return $result;
    }
}

// Logic pour supprimer une ville : instance de la class SupprimerController et appel de la methode



if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $controller = new SupprimerController();
    $result = $controller->supprimerVille($id);
    if ($result) {
        header('Location: ../index.php');
        exit();
    } else {
        header('Location: ../index.php');
    }
}