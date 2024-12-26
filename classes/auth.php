<?php
include "Database.php";
class Auth extends Database
{
    private $dbcon;
    private $name;
    private $email;
    private $password;
    private $hachedPasswored;
    public function __construct()
    {
        $this->dbcon = $this->connect();
    }
    public function signup()
    {
        $this->name = $_POST['name'];
        $this->email = $_POST['email'];
        $this->password = $_POST['password'];
        $this->hachedPasswored = password_hash($this->password, PASSWORD_DEFAULT);
        $fideQ = "SELECT * from user WHERE user_email = :email";
        $stmt = $this->dbcon->prepare($fideQ);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
        $exist =  $stmt->fetch();
        if ($exist) {
            echo "Email already exist";
            return;
        }
        $query = "INSERT INTO user (user_name,user_email,password,role) values (:username ,:email,:passwored,:role)";
        $stmt = $this->dbcon->prepare($query);
        $executed = $stmt->execute([
            'username' => $this->name,
            'email' => $this->email,
            'passwored' => $this->hachedPasswored,
            'role' => 2
        ]);
        if ($executed) {
            $lastIndex = $this->dbcon->lastInsertId();
            $array = ["status" => 1, "index" => $lastIndex,"role"=>2];
            return $array;
        } else {
            $array = ["status" => 0, "message" => "somthing went wrong"];
            return $array;
        }
    }
    public function login()
    {
        $this->email = $_POST['email'];
        $this->password = $_POST['password'];
        $query = "SELECT * FROM user WHERE user_email = :email";
        $stmt = $this->dbcon->prepare($query);
        $stmt->bindParam(':email', $this->email);
        $stmt->execute();
        $exist = $stmt->fetch();
        if ($exist) {
            $isIdentical = password_verify($this->password, $exist["password"]);
            if ($isIdentical) {
                $array = ["status" => 1, "ID" => $exist["userID"],"role"=>$exist["role"]];
                return $array;
            } else {
                $array = ["status" => 0, "error" => "somthing went wrong try again"];
                return $array;
            }
        } else {
            $array = ["status" => 0, "error" => "somthing went wrong try again"];
            return $array;
        }
    }
}
