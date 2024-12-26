<?php
include "Database.php";
class Auth extends Database
{
    private $dbcon;
    private $constraintName;
    private $Nmb_payes;
    private $continentImage;
    private $continentID;
    public function __construct()
    {
        $this->dbcon = $this->connect();
    }
    public function addContinant()
    {
        $this->constraintName = $_POST["CONname"];
        $this->Nmb_payes = $_POST["NB_pays"];
        $this->continentImage = $_POST["CONimage"];
        $Cquery = "SELECT * from continent where constraintName = :conname";
        $stmt = $this->dbcon->prepare($Cquery);
        $stmt->execute([":conname" => $this->constraintName]);
        $exist = $stmt->fetch();
        if ($exist) {
            $array = ["status" => 0, "message" => "this countinant all redy exits in this database "];
            return $array;
        } else {
            $insertQuery = "INSERT into continent (constraintName,Nmb_payes,continentImage) values (:name,:number,:image)";
            $stmt = $this->dbcon->prepare($insertQuery);
            $execut = $stmt->execute([
                "name" => $this->constraintName,
                "number" => $this->Nmb_payes,
                "image" => $this->continentImage,
            ]);
            if ($execut) {
                $array = ["status" => 1, "message" => "done"];
                return $array;
            } else {
                $array = ["status" => 0, "message" => "there is some cinde of error"];
                return $array;
            }
        }
    }
    public function editContinent()
    {
        $this->constraintName = trim($_POST["CONname"] ?? '');
        $this->Nmb_payes = trim($_POST["NB_pays"] ?? '');
        $this->continentImage = trim($_POST["CONimage"] ?? '');
        $this->continentID = trim($_POST["CID"] ?? '');
        if (empty($this->continentID)) {
            return ["status" => 0, "error" => "Continent ID is required."];
        }
        $query = "UPDATE continent SET ";
        $params = [];

        if (!empty($this->constraintName)) {
            $query .= "constraintName = :name, ";
            $params['name'] = $this->constraintName;
        }

        if (!empty($this->Nmb_payes)) {
            $query .= "Nmb_payes = :number, ";
            $params['number'] = $this->Nmb_payes;
        }

        if (!empty($this->continentImage)) {
            $query .= "continentImage = :image, ";
            $params['image'] = $this->continentImage;
        }

        // Remove the trailing comma and add WHERE clause
        $query = rtrim($query, ', ') . " WHERE continent_id = :id";
        $params['id'] = $this->continentID;

        try {
            $stmt = $this->dbcon->prepare($query);
            $stmt->execute($params);

            if ($stmt->rowCount() > 0) {
                return ["status" => 1, "message" => "Continent updated successfully."];
            } else {
                return ["status" => 0, "error" => "No changes made or invalid ID."];
            }
        } catch (PDOException $e) {
            return ["status" => 0, "error" => $e->getMessage()];
        }
    }
    public function deletecountinant(){
        $this->continentID = $_POST["CID"];
        $query = "DELETE FROM continent WHERE continent_id = :id";
        try {
            $stmt = $this->dbcon->prepare($query);
            $stmt->execute([
                "id"=>$this->continentID
            ]);
        } catch (PDOException $e) {
            return ["status" => 0, "error" => $e->getMessage()];
        }
    }
}
