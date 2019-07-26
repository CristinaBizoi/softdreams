<?php
 use \Vendor\Libraries\Ticket;
 $ticket = new Ticket($db);
 //  caut ticketul in functie de referinta 
 if($request->getQuery("referinta") && !empty($request->getQuery("referinta"))){
    $ticket_r = $ticket->findByReference($request->getQuery("referinta"));
    $change =  $ticket ->changeStatus($ticket_r);
    $_SESSION["message_succes"] = $change;
 }else{
    $_SESSION["message_error"] = "Status wasn't changed";
 }
 header("Location:./listare");
?>