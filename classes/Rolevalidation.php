<?php
class RoleValidatoin{
    private $Role;
    public function __construct() {
        $this->Role = $_SESSION["userRole"];
    }
    public function isUser () {
        if ($this->Role!=2) {
            header("location: ../view/signin".urldecode("you can not get to this page"));
        }
    }
    public function isadmine () {
        if ($this->Role!=1) {
            header("location: ../view/signin".urldecode("you can not get to this page"));
        }
    }
}
?>