<?php
include "../db/dbconection.php";
class Auth extends connection{
    private $dbcon ;
    private $name;
    private $email;
    private $password;
    private $hachedPasswored;
    public function __construct(){
        $this->dbcon = $this->connect();
    }
    public function signup(){
        $this->name = $_POST['name'];
        $this->email = $_POST['email'];
        $this->password = $_POST['password'];
        $this->hachedPasswored = password_hash($this->password,PASSWORD_DEFAULT);
        $fideQ = "SELECT from users WHERE email = :email";
        $stmt = $this->dbcon->prepare($fideQ);
        $stmt->bindParam(':email',$this->email);
        $stmt->execut();
        $exist =  $stmt->fetch();
        if($exist){
            echo "Email already exist";
            return;
        }
        $query = "INSERT INTO user (user_name,user_email,password,role) values (:username ,:email,:passwored,:role)";
        $stmt = $this->dbcon->prepare($query);
        $executed=$stmt->execute([
            'username' => $this->name,
            'email' => $this->email,
            'passwored' => $this->hachedPasswored,
            'role' => 2
        ]);
        if ($executed) {
            echo "User created successfully";
            $lastIndex = $this->dbcon->lastInsertId();
            return $lastIndex;
        }else{
            echo "Error creating user";
        }


    }
    
}
?>