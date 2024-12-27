<?php
session_start();
include "../classes/auth.php";
$signup = new Auth();
$Result = $signup->signup();
if ($Result["status"]==1) {
    $_SESSION["UserRole"] = $Result["role"];
    $_SESSION["UserName"] = $Result["name"];
    header("location: ../index.php");
}
elseif ($Result["status"]==0) {
    header("location: ../view/signup". urldecode($Result["message"]));
}
?>