<?php
namespace Vendor\Libraries;
class Reply{
    private $db = NULL;
    // dependency injection
    public function __construct($db){
        $this->db = $db;
    }
    public function create($post){
        // trimit query-ul de insert
            $stmt = $this->db->executeQuery("INSERT INTO `replies`(`content`, `id_ticket`, `created_by`) VALUES (?, ?, ?)",
            array($post["content"], $post["ticket_id"],  $post["rol"]));
            // var_dump($stmt);
    }
    public function allById($id){
        // selectez din baza de date dupa id-ul ticketului
        $query = $this->db->executeQuery("SELECT * FROM `replies` WHERE `id_ticket` = ?", array($id));
        return $rows = $query->fetchAll();
        
    }
}