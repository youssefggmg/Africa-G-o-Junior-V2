<?php
session_start();
include "../classes/auth.php";
$signin = new Auth();
$Result = $signin->login();
if ($Result["status"] == 1) {
    $_SESSION["UserRole"] = $Result["role"];
    $_SESSION["UserName"] = $Result["name"];
    header("location: ../index.php");

} elseif ($Result["status"] == 0) {
    header("location: ../view/signin.php" . urldecode($Result["message"]));
}
?>