<?php
namespace Vendor\Libraries;
class Ticket{
    private $db = NULL;
    public function __construct($db){
        $this->db = $db;
    }
    public function all(){
        // selectez tot din tabela `tickets`
        $query = "SELECT * FROM `tickets` WHERE 1";
        return  $this->db->getQuery($query);
    }
    public function findByStatus($status){
        // caut dupa status
        $query = $this->db->executeQuery(" SELECT * FROM `tickets` WHERE `status`= ?", array($status));
        $rows = $query->fetchAll();
        return $rows;
    }
    public function findByReference($reference){
        // caut dupa referinta
        $query = $this->db->executeQuery(" SELECT * FROM `tickets` WHERE `reference`= ?", array($reference));
        $row = $query->fetch();
        return $row;

    }
    public function create($post){
        // verific daca s-a adaugat in baza de date si daca nu s-a adaugat iar referinta nu este unica se mai executa o data query-ul
        $flag = false;
        while($flag == false){
            $reference = $this->generateRandomString();
            $stmt = $this->db->executeQuery("INSERT INTO `tickets`(`department`, `email`, `subject`, `message`, `reference` ) VALUES (?, ?, ?, ?, ?)",
            array($post["department"], $post["email"], $post["subject"], $post["message"], $reference ));
            // var_dump($stmt);
            if($stmt){
                $flag = true;
            }
        }
        return $reference;
        }
    public function delete($get){
        // execut query-ul si verific daca s-au realizat modificari in baza de date
        $stmt = $this->db->executeQuery("DELETE FROM `tickets` WHERE `reference` = ? ", array($get));
        $deleted = $stmt->rowCount();
        if($deleted){
            return $message = "Ticket was deleted";
        }
    }
    public function changeStatus($ticket){
        // modific valoarea statusului
        if($ticket["status"] == 0){
            $ticket["status"] = 1;
        }else{
            $ticket["status"] = 0;
        }
        // execut query-ul si verific daca s-au realizat modificari in baza de date
        $stmt = $this->db->executeQuery("UPDATE `tickets` SET `status` = ? WHERE `reference` = ?", array($ticket["status"], $ticket["reference"] ));
        $updated = $stmt->rowCount();
        if( $updated ){
            return $message = "Status was changed";
        }
    }
    // functie de generare a unui string random
    function generateRandomString($length = 7) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            // cand ajunge la pozitia a3a din string adaug "-"
            if($i == 2){
                $randomString = $randomString."-";
            }
            else{
                $randomString = $randomString.$characters[rand(0, $charactersLength - 1)];
            }
        }
        return $randomString;
    }
}
?>