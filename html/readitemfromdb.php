<?php
$mysqli = new mysqli("localhost", "root", "", "Cemquarium");
if ($mysqli->connect_error) {
    die("Verbindung zur DB fehlgeschlagen: " . $mysqli->connect_error);
}
$id = "1";
$sql = "SELECT * FROM Produkt
        WHERE ?;";

$statement = $mysqli->prepare($sql);
$statement->bind_param('s', $id);
$statement->execute();
$result = $statement->get_result();

while ($row = $result->fetch_object()) {
    $name = $row->name;
    $beschreibung = $row->beschreibung;
    $preis = $row->preis;

    echo '<div class="col-lg-4 col-md-6 mb-4">
            <div class="card mt-4">
              <a href="#"><img class="card-img-top" src="/webshop/pictures/lobster.jpg" alt=""></a>
              <div class="card-body">
                <h4 class="card-title">
                  <a href="#">' . $name . '</a>
                </h4>
                <h5>' . $preis . '€</h5>
                <p class="card-text">' . $beschreibung . '</p>';

    if (isset($_SESSION['username'])) {
        // ist eingeloggt
        $benutzer = $_SESSION['username'];
        // set feld mit id login auf hidden

        echo '<button type="button" class="btn btn-outline-dark">Warenkorb hinzufügen</button>';


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

//$numberofarticel = $result->num_rows;
// for ($i=0; $i < $numberofarticel; $i++){}