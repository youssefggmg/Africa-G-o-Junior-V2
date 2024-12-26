<?php

require_once '../classes/Database.php';
require_once '../classes/Pays.php';

class SupprimerPaysController
{
    private $paysModel;
    public function __construct()
    {
        $DB = new Database();
        $conx_DB = $DB->connect();
        $this->paysModel = new Pays($conx_DB);
    }

    public function SupprimerPays($id)
    {
        $result = $this->paysModel->supprimerPays($id);
        return $result;
    }
}

if (isset($_GET['id'])) {

    $id = $_GET['id'];
    $controller = new SupprimerPaysController();
    $result = $controller->SupprimerPays($id);
    if ($result) {
        header('Location: ../view/ListPays.php');
        exit();
    } else {
        header('Location: ../index.php');
    }
}