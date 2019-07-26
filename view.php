<?php
    require('./header.php');
    use \Vendor\Libraries\Ticket;
    use \Vendor\Libraries\Reply;
    $ticket = new Ticket($db);
    // caut ticketul in baza de date dupa referinta
    if($request->getQuery("referinta") && !empty($request->getQuery("referinta"))){
        // var_dump($ticket->findByReference($_GET["referinta"]));
        $ticket_r = $ticket->findByReference($request->getQuery("referinta"));
    }else{
      header('Location:./listare');
    }
    // selectez toate comentariile pentru ticketul curent
    $id = $ticket_r["id"];
    $reply = new Reply($db);
    $replies = $reply->allById($id);
    // atribui rolul in functie de ultima pagina vizitata pentru a modifica ulterior culorile comentariilor in functie de aceasta
    if($_SESSION["last_page"] == "create"){
      $rol = 0;
    }else{
      $rol=1;
    }


?>
 <!-- Page Content -->
 <div class="container py-4">
   <!-- alerta succes pentru formularul de create ticket -->
      <div class="mt-3 col-12 col-md-6">
        <?php if(isset($_SESSION["message"])){ ?>
          <div class="alert alert-success" role="alert">
              <?php echo $_SESSION["message"]; ?>
          </div>
        <?php 
        unset($_SESSION["message"]);
        } ?>
        <h1 class="mb-4"> View Ticket </h1>
        <form method="POST" action="./create_action">
          <div class="form-group">
            <label for="department">Department</label>
            <select class="form-control" id="department" disabled name="department">
              <option value="" >Select</option>
              <option value="0" <?php if($ticket_r["department"]=== '0'){echo "selected"; } ?> >Technical</option>
              <option value="1" <?php if($ticket_r["department"]=== '1'){echo "selected"; }?> >Sales</option>
            </select>
          </div>
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" readonly value="<?php echo $ticket_r["email"]; ?>">
          </div>
          <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" class="form-control" id="subject" name="subject" readonly value="<?php echo  $ticket_r["subject"]; ?>">
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" name="message" rows="3" readonly><?php echo $ticket_r["message"]; ?></textarea>
          </div>
        </form>
      </div>
      <!-- <div class='row mt-5'><div class='col-12 '><hr></div></div> -->
      <div class="comments-section col-12 col-md-8 mt-5">
        <h3 class="my-5 pl-3"> Comments </h3>
        <h6 class="mb-3">Add reply:</h6>
        <div class="comments-form col-12 col-md-8">
          <form action="./create_comment_action" method="POST">
            <div class="form-group">
              <textarea name="content" id="content" class="form-control" rows="4"></textarea>
            </div>
            <?php if(isset($_SESSION["comment_error"])){ ?>
              <div class="alert alert-danger" role="alert">
                Enter a message.
              </div>
            <?php } ?>
              <input type="hidden" name="ticket_id" id="ticket_id" value="<?php echo $ticket_r["id"];  ?>">
              <input type="hidden" name="rol" id="rol" value="<?php echo $rol  ?>">
            <div class="form-group">
              <button type="submit" class="btn btn-outline-dark">Send</button>
            </div>
          </form>
        </div>
        <div class="comments-list clearfix">
          <?php 
            foreach($replies as $reply){
          ?>
          <!-- in functie de rolul din baza de date atribui o clasa special-class pentru "administrator" -->
              <div class=" custom-class mt-3 py-2 px-3" id="<?php echo ($reply["created_by"] == 1) ? "special-class" : "" ?>">
                <div class="comment">
                  <?php echo $reply["content"]; ?>
                </div>
                <small><?php echo $reply["created_at"]; ?></small>
              </div>
          <?php
            }
          ?>
        </div>


      </div>
      
 </div>


<?php
  unset($_SESSION["comment_error"]);
  require('./footer.php');
  
?>