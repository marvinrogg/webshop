<?php

$mysqli = new mysqli("localhost", "root", "", "Cemquarium");
if ($mysqli->connect_error) {
    die("Verbindung zur DB fehlgeschlagen: " . $mysqli->connect_error);
}
$id = $_GET["idartikel"];
$sql = "SELECT * FROM Produkt
        WHERE id = ?;";

$statement = $mysqli->prepare($sql);
$statement->bind_param('s', $id);
$statement->execute();
$result = $statement->get_result();

while ($row = $result->fetch_object()) {
    $name = $row->name;
    $beschreibung = $row->beschreibung;
    $preis = $row->preis;
    $bild = $row->bild;
    $idartikel = $row->id;

    echo '<div class="col-lg-6">
            <div class="card mt-4">
              <img class="card-img-top img-fluid" src="' . $bild . '" alt="">
          <div class="card-body">
                <h3 class="card-title">' . $name . '</h3>
                 <h4>' . $preis . '€</h4>
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