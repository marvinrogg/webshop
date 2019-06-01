<?php

$benutzer = $_GET["name"];
$password = $_GET["password"];

 print "Daten: $benutzer:$password";

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


$anzahl = $result->num_rows;


if ($anzahl > 0) {
// alles okay
    $mysqli = new mysqli("localhost", "root", "", "Cemquarium");
    if ($mysqli->connect_error){
        die("Verbindung zur DB fehlgeschlagen: " . $mysqli->connect_error);
    }
    $sql = "SELECT id from Warenkorb WHERE User_username = ?;";
    $statement= $mysqli->prepare($sql);
    $statement->bind_param('s', $benutzer);
    $statement->execute();
    $result = $statement->get_result();

    while($row = $result->fetch_object()) {
        $warenkorbid = $row->id;
    }



    session_start();
    $_SESSION['username'] = $benutzer;
    $_SESSION['warenkorbid'] = $warenkorbid;
    header("location: index.php");
    exit();
}else {
    // Benutzerdaten falsch
    header("location: login.php");
    exit();
}


