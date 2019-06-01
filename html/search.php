<?php

$search = "%{$_GET['search']}%";
$search2 = $search;

//print "Daten: $search";

$mysqli = new mysqli("localhost", "root", "", "Cemquarium");
if ($mysqli->connect_error){
    die("Verbindung zur DB fehlgeschlagen: " . $mysqli->connect_error);
}
$sql = "SELECT * 
        FROM Produkt 
        WHERE name LIKE ? 
        OR beschreibung LIKE ? 
        GROUP BY id";

$statement= $mysqli->prepare($sql);
$statement->bind_param('ss', $search, $search2);
$statement->execute();
$result = $statement->get_result();

echo'<!DOCTYPE html>
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

<body>';

session_start();
include 'isLoggedIn.php';
echo'

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
              ';
              include 'loginlogoutbutton.php';
              echo'
          </li>

          <li class="nav-item">
              ';
              include 'showwarenkorb.php';
              echo'
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

        <h1 class="my-4">Willkommen im Shop</h1>

          <!-- Example split danger button -->
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

        <div class="row">';

while ($row = $result->fetch_object()) {
    $name = $row->name;
    $beschreibung = $row->beschreibung;
    $preis = $row->preis;
    $bild = $row->bild;
    $idartikel = $row->id;
    // print $bild;

    echo '<div class="col-lg-4 col-md-6 mb-4">
            <div class="card mt-4">
              <a href="#"><img class="card-img-top" src="' . $bild . '" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="artikel.php?idartikel=' . $idartikel . '">' . $name . '</a>
                </h4>
                <h5>' . $preis . '€</h5>
                <p class="card-text">' . $beschreibung . '</p>';

    if (isset($_SESSION['username'])) {
        // ist eingeloggt
        $benutzer = $_SESSION['username'];
        // set feld mit id login auf hidden

        echo '<form action="addtowarenkorb.php" method="get">
        
        <button class="btn btn-outline-dark" name="idartikel" type="submit" value=' . $idartikel . '>Warenkorb hinzufügen</button>
        
      </form>';

    } else {
        // nicht eingeloggt
        // header("location: login.php");
        // set Feld mit id logout auf hidden


    }
    echo '             
              </div>
            </div>
          </div>';
}
echo'</div>
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
';
