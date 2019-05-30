<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Shop Homepage - Cemquarium</title>

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
            <a class="nav-link" href="ueberuns.php">Über uns</a>
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
        <form class="form-inline">
            <input class="form-control" type="text" placeholder="Suchen" aria-label="Search">
        </form>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">Willkommen im Shop</h1>
        <div class="btn-group">
                <a  href="aquarium.php"><button type="button" class="btn btn-secondary">Aquarien</button></a>
                <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="suesswasser.php">Süßwasser</a>
                    <a class="dropdown-item" href="meerwasser.php">Meerwasser</a>

                </div>
            </div>

            <br>
            <br>
            <br>
            <br>


            <div class="btn-group">
                <a  href="aquariumtechnik.php"><button type="button" class="btn btn-secondary">Aqaurientechnik</button></a>
                <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="sr-only">Toggle Dropdown</span>
                </button>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="pumpen.php">Pumpen</a>
                    <a class="dropdown-item" href="heizung.php">Heizung</a>

                </div>
            </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div class="row">

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card mt-4">
              <div class="card-body">
                <h4 class="card-title">
                  <h1>Standort Offenburg</h1>
                </h4>
                <h5>Cemquarium</h5>
				<h5>Badstraße 24</h5>
				<h5>77652 Offenburg</h5>
                <p></p>
				<p></p>
				<p class="card-text">E-Mail: <br/>Cemquarium@fisch.mrk</p>
				<p>Telefon: <br/>(0781) 3512162011792012</p>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card mt-4">
              <div class="card-body">
                <h4 class="card-title">
                  <h1>Standort Freiburg</h1>
                </h4>
                <h5>Cemquarium</h5>
				<h5>Am Bahnhof 16</h5>
				<h5>79098 Freiburg</h5>
                <p></p>
				<p></p>
				<p class="card-text">E-Mail: <br/>Cemquarium@fisch.mrk</p>
				<p>Telefon: <br/>(0761) 3512162011792012</p>
              </div>
            </div>
          </div>


        </div>
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

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
