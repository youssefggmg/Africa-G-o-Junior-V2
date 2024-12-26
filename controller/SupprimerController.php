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
}