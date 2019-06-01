<?php
$mysqli = new mysqli("localhost", "root", "", "Cemquarium");
if ($mysqli->connect_error){
    die("Verbindung zur DB fehlgeschlagen: " . $mysqli->connect_error);
}


$sql = "INSERT INTO `Warenkorb`(`User_username`) VALUES (?);";
$statement= $mysqli->prepare($sql);
$statement->bind_param('s', $benutzer);
$statement->execute();


