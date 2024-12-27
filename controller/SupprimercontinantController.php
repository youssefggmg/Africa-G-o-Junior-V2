<?php
include "../classes/continant.php";
$deletecontinant = new constraint();
$deletecontinant->deletecountinant();
header("location: ../view/ListPays.php");

?>