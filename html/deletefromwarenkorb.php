<?php

$idartikel = $_GET["idartikel"];
//print "Daten: $idartikel";

$mysqli = new mysqli("localhost", "root", "", "Cemquarium");
if ($mysqli->connect_error){
    die("Verbindung zur DB fehlgeschlagen: " . $mysqli->connect_error);
}
$sql = "DELETE FROM `Warenkorb_has_Produkt` WHERE `Warenkorb_id` = 1 AND`Produkt_id` = ? LIMIT 1;";
$statement= $mysqli->prepare($sql);
$statement->bind_param('s', $idartikel);
$statement->execute();
$result = $statement->get_result();

header("location: warenkorb.php");