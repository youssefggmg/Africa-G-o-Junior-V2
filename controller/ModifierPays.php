<?php

require_once '../classes/Database.php';
require_once '../classes/Pays.php';

class ModifierPays
{
    private $paysModel;

    public function __construct()
    {
        $DB = new Database();
        $conx_DB = $DB->connect();
        $this->paysModel = new Pays($conx_DB);
    }

    public function modifierPays($id, $nom, $population, $continent, $language, $image)
    {
        $result = $this->paysModel->modifierPays($id, $nom, $population, $continent, $language, $image);
        return $result;
    }

}

if (isset($_POST['id_pays'])) {

    $nom = $_POST['pays_nom'];
    $pays_population = $_POST['pays_population'];
    $pays_continent = $_POST['pays_continent'];
    $pays_langues = $_POST['pays_langues'];
    $image = $_POST['image'];
    $id_pays = $_POST['id_pays'];

    $ModifierPays = new ModifierPays();
    $result = $ModifierPays->modifierPays($id_pays, $nom, $pays_population, $pays_continent, $pays_langues, $image);

    if ($result) {
        header('Location: ../view/ListPays.php');
        exit();
    } else {
        header('Location: ../view/ModifierPaysForm.php?id' . $id_pays);
        exit();
    }


}
