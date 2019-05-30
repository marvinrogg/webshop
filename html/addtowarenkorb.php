<?php

$idartikel = $_GET["idartikel"];
//print "Daten: $idartikel";

$mysqli = new mysqli("localhost", "root", "", "Cemquarium");
if ($mysqli->connect_error){
    die("Verbindung zur DB fehlgeschlagen: " . $mysqli->connect_error);
}
$sql = "SELECT * FROM User
        WHERE username =?
        AND password=?;";
$statement= $mysqli->prepare($sql);
$statement->bind_param('ss', $benutzer, $password);
$statement->execute();
$result = $statement->get_result();
