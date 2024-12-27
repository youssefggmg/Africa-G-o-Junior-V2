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
    // Limiter la description à 50 caractères
    $description = strlen($item['vill_descreption']) > 50
        ? substr($item['vill_descreption'], 0, 50) . '...'
        : $item['vill_descreption'];

    echo "
        <div id=\"" . $item['name'] . "\" class=\"col-lg-4 col-md-6 wow fadeInUp " . $item['type'] . "\" data-wow-delay=\"0.1s\">
            <div class=\"room-item shadow rounded overflow-hidden\">
                <div class=\"position-relative\">
                    <img class=\"img-fluid\" style=\"width: 100%; height: 200px; object-fit: cover;\" src=\"" . $item['imgVille'] . "\" alt=\"" . $item['name'] . "\">
                    " .
        (
            $item['type'] === 'othere' ?
            "<small class=\"position-absolute start-0 top-100 translate-middle-y bg-success text-white rounded py-1 px-3 ms-4\">Ville</small>"
            :
            "<small class=\"position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4\">" . $item['type'] . "</small>"
        ) .
        "
                </div>
                <div class=\"p-4 mt-2\">
                    <div class=\"d-flex justify-content-between mb-3\">
                        <h5 class=\"mb-0 text-truncate\">" . $item['name'] . "</h5>
                    </div>
                    <p class=\"text-body mb-3\">" . $item['paysName'] . "</p>
                    <p class=\"text-body mb-3\">" . $description . "</p>
                    " .
        (
            (isset($_SESSION["UserRole"]) && $_SESSION["UserRole"] == 1) ?
            "<div class=\"d-flex justify-content-between\">
                        <a class=\"btn btn-sm btn-primary rounded py-2 px-4\" href=\"../view/ModifierVilleForm.php?id=" . $item['villID'] . "\">Modifier</a>
                        <a class=\"btn btn-sm btn-dark rounded py-2 px-4\" href=\"../controller/SupprimerController.php?id=" . $item['villID'] . "\">Supprimer</a>
                    </div>" : "<div></div>"
        ) . "
                </div>
            </div>
        </div>
    ";
}
