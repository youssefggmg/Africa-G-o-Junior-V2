<?php

require_once '../classes/Database.php';
require_once '../classes/Ville.php';

class AjouterVilleController
{
    private $villeModel;
    public function __construct()
    {
        $DB = new Database();
        $conx_DB = $DB->connect();
        $this->villeModel = new Ville($conx_DB);
    }

    public function AjouterVille($nom, $vill_descreption, $type, $image, $paysID)
    {
        $result = $this->villeModel->AjouterVille($nom, $vill_descreption, $type, $image, $paysID);
        return $result;
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nom = $_POST['nom'];
    $desc = $_POST['vill_descreption'];
    $type = $_POST['type'];
    $image = $_POST['image'];
    $paysID = $_POST['paysID'];

    $AjouterVilleController = new AjouterVilleController();
    $result = $AjouterVilleController->AjouterVille($nom, $desc, $type, $image, $paysID);

    if ($result) {
        header('Location: ../index.php');
        exit();
    } else {
        header('Location: ../view/AjouterVilleForm.php');
    }

}