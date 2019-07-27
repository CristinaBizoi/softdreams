<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="interview-project">
  <meta name="author" content="Cristina Bizoi">

  <title>SoftDreams</title>

  
  <!-- Bootstrap core CSS -->
  <link href="./public/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" type="text/css"> 
  <link href="./public/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-nav static-top" id="navbar">
    <div class="container">
      <a class="navbar-brand" href="./listare">Ticket System</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <!-- verific care este pagina curenta si o evidentiez -->
          <li class="nav-item <?php echo ($current_page == 'utilizator') ? 'active' : '' ; ?>  ">
            <a class="nav-link" href="./utilizator">User Page</a>
          </li>
          <li class="nav-item <?php echo ($current_page == 'listare') ? 'active' : '' ; ?>">
            <a class="nav-link" href="./listare">Ticket list</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
