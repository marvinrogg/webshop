<?php

$mysqli = new mysqli("localhost", "root", "", "Cemquarium");
if ($mysqli->connect_error) {
    die("Verbindung zur DB fehlgeschlagen: " . $mysqli->connect_error);
}
$sql = "SELECT p.name, p.id, p.beschreibung, p.preis, p.bild 
        FROM Produkt p, Warenkorb w, Warenkorb_has_Produkt wp, User u 
        Where p.id = wp.Produkt_id 
        AND wp.Warenkorb_id = w.id 
        AND w.User_username = u.username 
        AND u.username= ?;";

$statement = $mysqli->prepare($sql);
$statement->bind_param('s', $_SESSION['username']);
$statement->execute();
$result = $statement->get_result();

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
                  <a href="#">' . $name . '</a>
                </h4>
                <h5>' . $preis . '€</h5>
                <p class="card-text">' . $beschreibung . '</p>';

    if (isset($_SESSION['username'])) {
        // ist eingeloggt
        $benutzer = $_SESSION['username'];
        // set feld mit id login auf hidden

        echo '<form action="deletefromwarenkorb.php" method="get">
        
        <button class="btn btn-outline-dark" name="idartikel" type="submit" value=' . $idartikel . '>Warenkorb entfernen</button>
        
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

//$numberofarticel = $result->num_rows;
// for ($i=0; $i < $numberofarticel; $i++){}+){}