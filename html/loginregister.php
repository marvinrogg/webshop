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
if($statement->execute()){

    session_start();
    $_SESSION['username'] = $benutzer;

    $mysqli = new mysqli("localhost", "root", "", "Cemquarium");
    if ($mysqli->connect_error){
        die("Verbindung zur DB fehlgeschlagen: " . $mysqli->connect_error);
    }


    $sql = "INSERT INTO `Warenkorb`(`User_username`) VALUES (?);";
    $statement= $mysqli->prepare($sql);
    $statement->bind_param('s', $benutzer);
    $statement->execute();
    header("location: index.php");
    exit();

}else{

    header("location: login.php");
    exit();
}



