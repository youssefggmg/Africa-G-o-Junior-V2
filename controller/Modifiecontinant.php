<?php
include "../classes/continant.php";
$continant = new constraint;
$result=$continant->editContinent();
var_dump( $result["status"]);

if ($result["status"]==1) {
    echo "gghsdhjfsdjhfisdfdytvbsa";
    header("location: ../view/listcontinants.php");
}else{
    echo $result["message"];
    echo $result["error"];
}
?>