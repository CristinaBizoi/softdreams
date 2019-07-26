<?php
use \Vendor\Libraries\Ticket;
$ticket = new Ticket($db);
// initializez un array de erori
$error = [];
// verific daca campurile formularului au fost completate corect
if(!$request->getPost('email') || strlen($request->getPost("email")) == 0 ){
    $error["email"] = true;
}
if(!$request->getPost("subject") || strlen($request->getPost("subject")) < 5 ){
    $error["subject"] = true;
}
if(!$request->getPost("message") || strlen($request->getPost("message")) < 25 ){
    $error["message"] = true;
}
if(count($error)){
    // salvez in sesiune valorile adaugate de user si erorile respective
    $_SESSION ["old_values"] = $_POST;
    $_SESSION ["errors"] = $error;
    header('Location:./create');
}else{
    // salvez in sesiune un mesaj de success in cazul in care formularul a fost completat ok si redirectez catre view
    $_SESSION["message"] = "Ticket created";
    $reference = $ticket->create($_POST);
    header('Location:./view?referinta='.$reference);
}

?>