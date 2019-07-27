<?php
use \Vendor\Libraries\Reply;
$reply = new Reply($db);
$error = false;
// verific daca mesajul este valid si il redirectez catre ultima pagina accesata
if(!$request->getPost("content") || strlen($request->getPost("content")) == 0){
    $error = true;
}
if($error == false){
    $reply->create($_POST);
    $_SESSION["comment_success"] = true;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}elseif($error == true){
    $_SESSION["comment_error"] = true;
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>