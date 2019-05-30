<?php
$warenkorbid = 1;

$mysqli = new mysqli("localhost", "root", "", "Cemquarium");
if ($mysqli->connect_error){
    die("Verbindung zur DB fehlgeschlagen: " . $mysqli->connect_error);
}
$sql = "SELECT P.name, P.id, P.beschreibung, P.preis, P.bild
        FROM Produkt p, Warenkorb w, Warenkorb_has_Produkt wp
        WHERE wp.Warenkorb_id = ? AND p.id = wp.Produkt_id;
		
$statement = $mysqli->prepare($sql);
$statement->bind_param('s', $warenkorbid);
$statement->execute();
$result = $statement->get_result();

while ($row = $result->fetch_object()) {
    $name = $row->name;
    $beschreibung = $row->beschreibung;
    $preis = $row->preis;
    $bild = $row->bild;
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
				<button type="button" class="btn btn-outline-dark">Aus Warenkorb entfernen</button>
				<button type="button" class="btn btn-outline-dark">Zahlen</button>
    echo '             
              </div>
            </div>
          </div>';
}
//$numberofarticel = $result->num_rows;
// for ($i=0; $i < $numberofarticel; $i++){}