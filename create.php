<?php
  $current_page = "create";
  require('./header.php');
  // salvez in sesiune pagina ca fiind ultima accesata cu scopul de a determina rolul utilizatorului
 $_SESSION["last_page"] = "create";
?>
  <!-- Page Content -->
  <div class="container py-4">
    <div class="row">
      <div class="mt-3 col-12 col-md-6">
        <h1 class="mb-4"> Create Ticket </h1>
        <form method="POST" action="./create_action">
          <div class="form-group">
            <label for="department">Select departament</label>
            <select class="form-control" id="department" name="department">
              <option value="">Select</option>
              <option value="0">Technical</option>
              <option value="1">Sales</option>
            </select>
          </div>
          <div class="form-group">
            <label for="email">Email address</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" value="<?php echo (isset($_SESSION["old_values"]["email"])) ? $_SESSION["old_values"]["email"] : "" ; ?>">
            <?php if(isset($_SESSION["errors"]["email"])){ ?>
              <div class="alert alert-danger" role="alert">
                Enter a valid email.
              </div>
            <?php } ?>
          </div>
          <div class="form-group">
            <label for="subject">Subject</label>
            <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter subject" value="<?php echo (isset($_SESSION["old_values"]["subject"])) ? $_SESSION["old_values"]["subject"] : "" ; ?>">
            <?php if(isset($_SESSION["errors"]["subject"])){ ?>
              <div class="alert alert-danger" role="alert">
                A subject should have more than 5 characters.
              </div>
            <?php } ?>
          </div>
          <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" name="message" rows="3" placeholder="Enter your message" ><?php echo (isset($_SESSION["old_values"]["message"])) ? $_SESSION["old_values"]["message"] : "" ; ?></textarea>
            <?php if(isset($_SESSION["errors"]["message"])){ ?>
              <div class="alert alert-danger" role="alert">
                A message should have more than 25 characters.
              </div>
            <?php } ?>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-outline-dark">Send</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php
  unset($_SESSION["errors"]);
  unset($_SESSION["old_values"]);
  require('./footer.php');
  ?>