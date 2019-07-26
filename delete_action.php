<?php
 use \Vendor\Libraries\Ticket;
 $ticket = new Ticket($db);
//  caut ticketul in functie de referinta 
 if($request->getQuery("referinta") && !empty($request->getQuery("referinta"))){
    $ticket_r = $ticket->delete($request->getQuery("referinta"));
    // var_dump($ticket_r);
   // daca actiunea a avut loc sau nu salvez in sesiune un mesaj
    $_SESSION["message_succes"] = $ticket_r;
 }else{
      $_SESSION["message_error"] = "Ticket was not deleted";
 }
 header("Location:./listare");
?>

