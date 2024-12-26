<?php

require_once '../classes/Database.php';
require_once '../classes/Ville.php';

class ModifierVille
{
    private $villeModel;
    public function __construct()
    {
        $DB = new Database();
        $conx_DB = $DB->connect();
        $this->villeModel = new Ville($conx_DB);
    }

    public function modifierVille($nom, $desc, $type, $image, $paysID, $id)
    {
        return $this->villeModel->ModifierVille($nom, $desc, $type, $image, $paysID, $id);
    }


}

// logic pour ajouter une ville : instance de la class AjouterVilleController et appel de la methode


if (isset($_POST['id'])) {

    $nom = $_POST['nom'];
    $desc = $_POST['vill_descreption'];
    $type = $_POST['type'];
    $image = $_POST['image'];
    $paysID = $_POST['paysID'];
    $id = $_POST['id'];

    $updatedVille = new ModifierVille();
    $result = $updatedVille->modifierVille($nom, $desc, $type, $image, $paysID, $id);

    if ($result) {
        header("Location: ../index.php");
        exit();
    } else {
        header("Location: ../index.php");
    }

}