<?php

$benutzer = $_GET["benutzername"];
$password = $_GET["password"];
$name = $_GET["name"];
$vorname = $_GET["vorname"];
$plz = $_GET["plz"];
$ort = $_GET["ort"];
$straße = $_GET["straße"];
$email = $_GET["email"];

 print "Daten: $benutzer:$password";

$mysqli = new mysqli("localhost", "root", "", "Cemquarium");
if ($mysqli->connect_error){
    die("Verbindung zur DB fehlgeschlagen: " . $mysqli->connect_error);
}
$sql = "INSERT INTO `User`(`username`, `password`, `name`, `Vorname`, `PLZ`, `ort`, `strasse`, `email`) 
        VALUES (?,?,?,?,?,?,?,?);";
$statement= $mysqli->prepare($sql);
$statement->bind_param('ssssssss', $benutzer, $password, $name, $vorname, $plz, $ort, $straße, $email);
$statement->execute();
$result = $statement->get_result();


$anzahl = $result->num_rows;


if ($anzahl > 0) {
// alles okay
    session_start();
    $_SESSION['username'] = $benutzer;
    header("location: index.php");
    exit();
}else {
    // Benutzerdaten falsch
    header("location: login.php");
    exit();
}


