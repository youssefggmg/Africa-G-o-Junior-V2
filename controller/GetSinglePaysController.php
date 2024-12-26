<?php

require_once '../classes/Database.php';
require_once '../classes/Pays.php';

class GetSinglePaysController
{
    private $paysModel;
    public function __construct()
    {
        $DB = new Database();
        $conx_DB = $DB->connect();
        $this->paysModel = new Pays($conx_DB);
    }

    public function getSinglePays($id)
    {
        return $this->paysModel->getSinglePays($id);
    }
}
