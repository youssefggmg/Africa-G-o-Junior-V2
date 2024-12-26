<?php
session_start();
include "../classes/auth.php";
$signup = new Auth();
$Result = $signup->signup();
var_dump($Result);
if ($Result["status"]==1) {
    // location to be added later 
    $_SESSION["UserRole"] = $Result["role"];
    // header("location: ");
}
elseif ($Result["status"]==0) {
    header("location: ../view/signup". urldecode($Result["message"]));
}
?>