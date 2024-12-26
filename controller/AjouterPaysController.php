<?php

require_once '../classes/Database.php';
require_once '../classes/Pays.php';

class AjouterPaysController
{
    private $paysModel;

    public function __construct()
    {
        $DB = new Database();
        $conx_DB = $DB->connect();
        $this->paysModel = new Pays($conx_DB);
    }

    public function AjouterPays($nom, $population, $continent, $language, $image)
    {
        $result = $this->paysModel->AjouterPays($nom, $population, $continent, $language, $image);
        return $result;
    }

}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nom = $_POST['pays_nom'];
    $pays_population = $_POST['pays_population'];
    $pays_continent = $_POST['pays_continent'];
    $pays_langues = $_POST['pays_langues'];
    $image = $_POST['image'];

    $AjouterPays = new AjouterPaysController();
    $result = $AjouterPays->AjouterPays($nom, $pays_population, $pays_continent, $pays_langues, $image);

    if ($result) {
        header('Location: ../view/ListPays.php');
        exit();
    } else {
        header('Location: ../view/AjoutePaysForm.php');
    }
}
