<?php

require_once 'classes/Database.php';
require_once 'classes/Ville.php';

class VilleController
{

    private $villeModel;

    public function __construct()
    {
        $DB = new Database();
        $conx_DB = $DB->connect();
        $this->villeModel = new Ville($conx_DB);
    }

    public function afficherVilles()
    {
        return $this->villeModel->AfficherVilles();
    }
}

function dispayData($item)
{
    echo "
        <div id=\"" . $item['name'] . "\"  class=\"col-lg-4 col-md-6 wow fadeInUp " . $item['type'] . " \" data-wow-delay=\"0.1s\">
            <div class=\"room-item shadow rounded overflow-hidden\">
                <div class=\"position-relative\">
                    <img class=\"img-fluid\" src=\"img/room-1.jpg\" alt=\"\">
                    " .
        (
            $item['type'] === 'othere' ?
            "<small class=\"position-absolute start-0 top-100 translate-middle-y bg-success text-white rounded py-1 px-3 ms-4\">" . $item['type'] . "</small>"
            :
            "<small class=\"position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4\">" . $item['type'] . "</small>"
        ) .
        "
            </div>
            <div class=\"p-4 mt-2\">
                <div class=\"d-flex justify-content-between mb-3\">
                    <h5 class=\"mb-0\">" . $item['name'] . "</h5>
                </div>
                <p class=\"text-body mb-3\">" . $item['paysName'] . "</p>
                <div class=\"d-flex justify-content-between\">
                    <a class=\"btn btn-sm btn-primary rounded py-2 px-4\" href=\"../pages/updateVille.php?id=" . $item['villID'] . "\">Modifier</a>
                    <a class=\"btn btn-sm btn-dark rounded py-2 px-4\" href=\"../pages/deleteVille.php?id=" . $item['villID'] . "\">Supprimer</a>
                </div>
            </div>
        </div>
    </div>
";
}