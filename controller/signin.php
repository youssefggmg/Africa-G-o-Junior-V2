<?php
session_start();
include "../classes/auth.php";
$signin = new Auth();
$Result = $signin->login();
if ($Result["status"]==1) {
    // location to be added later 
    $_SESSION["UserRole"] = $Result["role"];
    echo "rweiutgobvbtuoncabys dfacufbyeq";
    // header("location: ");
}
elseif ($Result["status"]==0) {
    header("location: ../view/signin". urldecode($Result["message"]));
}
?>