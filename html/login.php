<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Shop Login - Cemquarium</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/shop-homepage.css" rel="stylesheet">

</head>

<body>
<?php
session_start();
include 'isLoggedIn.php';
?>

<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Cemquarium</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Startseite
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kontakt.php">Über uns</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kontakt.php">Kontakt</a>
                </li>
                <li class="nav-item">
                    <?php
                    include 'loginlogoutbutton.php';
                    ?>
                </li>

                <li class="nav-item">
                    <?php
                    include 'showwarenkorb.php';
                    ?>
                </li>

            </ul>
        </div>
        <form action="search.php" class="form-inline" method="get">
            <input class="form-control" type="text" name="search" placeholder="Suchen" aria-label="Search">
        </form>
    </div>
</nav>
  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">


        <h1 class="my-4">Login</h1>






      </div>
      <!--xxx Div mit Karte -->
      <form action="logincheck.php" method="get">
        Benutzername: <input type="text" name="name">
        <br>
        Password:
        <input type="password" name="password">
        <br>
        <br>
        <input  class="btn btn-outline-dark" type="submit" value="Anmelden">
        <input class="btn btn-outline-dark" type="reset">
      </form>

    </div>
      <div class="row">
          <div class="col-lg-3">

              <h1 class="my-4">Registrieren</h1>

          </div>


          <form action="loginregister.php" method="get">
              Benutzername: <input type="text" name="benutzername">
              <br>
              Password:
              <input type="password" name="password">
              <br>
              Name:
              <input type="text" name="name">
              <br>
              Vorname:
              <input type="text" name="vorname">
              <br>
              Postleitzahl:
              <input type="text" name="plz">
              <br>
              Ort:
              <input type="text" name="ort">
              <br>
              Straße:
              <input type="text" name="straße">
              <br>
              E-Mail:
              <input type="text" name="email">
              <br>
              <br>
              <input  class="btn btn-outline-dark" type="submit" value="Registrieren">
              <input class="btn btn-outline-dark" type="reset">


          </form>
      </div>


  </div>
  <!-- /.container -->

  <!-- Footer -->
<footer class="py-5 bg-dark">
    <div class="container">
        <p class="m-0 text-center text-white">Copyright &copy; Cemquarium 2019</p>
    </div>
    <!-- /.container -->
</footer>

<!-- Bootstrap core JavaScript -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>