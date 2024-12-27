<?php
include "../classes/continant.php";
$newcontinant = new constraint();
$result= $newcontinant->addContinant();
if ($result["status"]=0) {
    header("header:../view/AjouteContinantForm.php?message".urlencode($result["message"]));
}
elseif($result["status"]=1){
    header("header:../view/AjouteContinantForm.php?message".urlencode($result["message"]));
}
?>