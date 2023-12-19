<?php 
require_once("server.php");

// if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
//     header("Access-Control-Allow-Origin: http://localhost:5173");
//     header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
//     header("Access-Control-Allow-Headers: Content-Type");
//     header("Access-Control-Max-Age: 86400");
//     exit();
// }

// header("Access-Control-Allow-Origin: http://localhost:5173");
// header("Access-Control-Allow-Methods: POST, GET");
// header("Access-Control-Allow-Headers: Content-Type");
// header('Content-Type: application/json');

class Database {
    private $Dbconfig;
    private $test;

    public function __construct() {
        try {
            $this->Dbconfig = new PDO("mysql:host=".serverName."; dbname=".dbName, userName, passWord);
            $this->Dbconfig->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->Dbconfig->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            $this->test = true; 
        } catch(PDOException $exception) {
            $this->test = false; 
            die("Error dbconfig connection: " . $exception->getMessage());
        }
    }

    public function GetDbconfig() {
        return $this->Dbconfig;
    }

    public function GetTestResult() {
        return $this->test;
    }
}
?>
