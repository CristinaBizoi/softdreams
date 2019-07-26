<?php
namespace Vendor\Libraries;
use PDO;
class DB{
    private $conn;
    public function __construct($servername, $db, $username, $password){
        // fac conexiunea cu baza de date 
        $this->conn = new PDO('mysql:host='.$servername.';dbname='.$db.';charset=utf8mb4', $username, $password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }
    public function getQuery($query=NULL){
        // functia de querry cand nu am nevoie de prepare statements
        $response = NULL;
        try{
            if($query){
                $response = $this->conn->query($query);
                
            }
            return $response;
        }
        catch(PDOException $ex) {
            return NULL;
        }
    }
    public function executeQuery($query = NULL, $parameters){
         // functia de querry cand am nevoie de prepare statements
        // var_dump($parameters);
        // exit();
        $response = NULL;
        try {
            if($query){
                $response = $this->conn->prepare($query);
                $response ->execute($parameters);
            }
            return $response;
        }
        catch(PDOException $ex) {
            return NULL;
        }
    }
}

?>