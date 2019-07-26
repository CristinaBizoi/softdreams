<?php
namespace Vendor\Libraries;
class Request{
    // initializez variabilele private 
    private $post, $get;
    public function __construct(){
        // le atribui variabilele globale
        $this->post = $_POST;
        $this->get = $_GET;
    }
    public function getQuery($key){
        // le returnez valorile doar daca sunt setate cheile
        if(isset($this->get[$key])){
            return $this->get[$key];

        }else{
            return false;
        }
    }
    public function getPost($key){
        // le returnez valorile doar daca sunt setate cheile
        if(isset($this->post[$key])){
            return $this->post[$key];
        }else{
            return false;
        }
    }
}


?>