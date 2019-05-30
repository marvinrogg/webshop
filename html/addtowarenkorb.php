<?php

$idartikel = $_GET["idartikel"];
//print "Daten: $idartikel";

$mysqli = new mysqli("localhost", "root", "", "Cemquarium");
if ($mysqli->connect_error){
    die("Verbindung zur DB fehlgeschlagen: " . $mysqli->connect_error);
}
$sql = "INSERT INTO `Cemquarium`.`Warenkorb_has_Produkt` (`Warenkorb_id`, `Produkt_id`) 
        VALUES (1, ?);";
$statement= $mysqli->prepare($sql);
$statement->bind_param('s', $idartikel);
$statement->execute();
$result = $statement->get_result();

header("location: index.php");