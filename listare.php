<?php
// initializez variabila  $current_page pentru a vedea in nav care e pagina activa 
  $current_page = "listare";
  require('./header.php');
  use \Vendor\Libraries\Ticket;
    $ticket = new Ticket($db);
// verific daca face cautarea dupa status, iar daca nu afisez toate ticketele
    if( $request->getQuery("status") !== false && strlen($request->getQuery("status")) > 0){
        
        $all_tickets = $ticket->findByStatus($request->getQuery("status"));
    }else{
        $all_tickets = $ticket->all();

    }
    // salvez in sesiune pagina ca fiind ultima accesata cu scopul de a determina rolul utilizatorului
    $_SESSION["last_page"] = "listare";
?>
<div class="container py-4">
    <!-- afisare mesaje de eroare & succes pentru actiunea de change status / delete -->
        <?php if(isset($_SESSION["message_succes"])){ ?>
          <div class="alert alert-success col-12 col-md-4" role="alert">
              <?php echo $_SESSION["message_succes"]; ?>
          </div>
        <?php 
        unset($_SESSION["message_succes"]);
        } ?>
         <?php if(isset($_SESSION["message_error"])){ ?>
          <div class="alert alert-danger col-12 col-md-4" role="alert">
              <?php echo $_SESSION["message_error"]; ?>
          </div>
        <?php 
        unset($_SESSION["message_error"]);
        } ?>
        <!-- afisare mesaj eroare daca nu a gasit referinta  -->
        <?php if(isset($_SESSION["error_reference"]) && $_SESSION["error_reference"] == true){ ?>
            <div class="alert alert-danger" role="alert">
                Reference isn't valid.
            </div>
        <?php 
            unset($_SESSION["error_reference"]); }     
         ?>
    <div class="row">
        <div class="search-status col-12 col-md-4 pb-3">
            <form method="GET" id="search-status" action="./listare">
                <div class="form-group row">
                    <label for="status" class="col-sm-5 col-form-label"> Select by status: </label>
                    <div class="col-sm-5">
                        <select class="form-control " id="status" name="status">
                            <option value=""> Select </option>
                            <option value="0" <?php  echo ($request->getQuery("status") !== false && $request->getQuery("status") == 0) ? "selected": ""; ?>>Deschis</option>
                            <option value="1" <?php echo ($request->getQuery("status") !== false && $request->getQuery("status") == 1) ? "selected": ""; ?>>Inchis</option>
                        </select>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="table-tickets">
        <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>email </th>
                        <th> subiect </th>
                        <th>departament </th>
                        <th>created_at</th>
                        <th>status</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach($all_tickets as $ticket_smth){
                ?>
                        <tr>
                            <td><?php echo $ticket_smth["email"]; ?></td>
                            <td><?php echo $ticket_smth["subject"]; ?></td>
                            <td>
                            <?php
                                if($ticket_smth["department"] === '0'){
                                    echo "Technical";
                                }elseif($ticket_smth["department"] === '1'){
                                    echo "Sales";
                                }else{
                                    echo "Unspecified";
                                }
                                
                            ?>
                            </td>
                            <td><?php echo $ticket_smth["created_at"]; ?></td>
                            <td>
                            <?php
                                if($ticket_smth["status"] == 0){
                                    echo "Deschis";
                                }elseif($ticket_smth["status"] == 1){
                                    echo "Inchis";
                                }
                            ?>
                            <td>
                            <a href="./view?referinta=<?php echo $ticket_smth["reference"]; ?>"><i class="fas fa-eye"></i></a>
                            <a class="delete" data-toggle="modal" data-type="delete" data-target="#exampleModal" href="#" data-href="./delete_action?referinta=<?php echo $ticket_smth["reference"]; ?>" ><i class="fas fa-trash-alt"></i></a>
                            <a data-toggle="modal" data-target="#exampleModal" data-type="change" href="#" data-href="./change_status?referinta=<?php echo $ticket_smth["reference"]; ?>"><i class="fas fa-toggle-on"></i></a>
                            </td>
                        </tr>
                <?php
                    }
                ?>
                </tbody>
        </table>
    </div>
</div>
    <!-- !-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        ...
                    </div>
                    <div class="modal-footer">
                        <a  class="btn btn-secondary" data-dismiss="modal">No</a>
                        <a  class="btn btn-primary yes" >Yes</a>
                    </div>
                </div>
            </div>
        </div>


<?php
  require('./footer.php');

?>