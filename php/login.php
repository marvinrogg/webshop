<html>
<body>

Welcome <?php echo $_GET["name"]; ?><br>
Your password is: <?php echo $_GET["password"]; ?>
<br>
Rolle: 
<?php

$benutzer = $_GET["name"];
$password = $_GET["password"];

// print "Daten: $benutzer:$email:$password";

$mysqli = new mysqli("localhost", "root", "", "shop");
if ($mysqli->connect_error){
    die("Verbindung zur DB fehlgeschlagen: " . $mysqli->connect_error);
}

$sql = "SELECT * FROM user
        WHERE username =?
        AND password=?;";
$statement= $mysqli->prepare($sql);
$statement->bind_param('ss', $benutzer, $password);
$statement->execute();
$result = $statement->get_result();


$anzahl = $result->num_rows;


if ($anzahl > 0) {
    // alles okay
    session_start();
    $_SESSION['username']=$benutzer;
    $sql= "SELECT role
            FROM user_role
            WHERE user = ?;";
    $statement = $mysqli->prepare($sql);
    $statement->bind_param('s', $benutzer);
    $statement->execute();
    $result = $statement->get_result();

    $roles = array();

    while ($row = $result->fetch_object()) {
       // print $row->role;
        array_push($roles, $row->role);

    }
    $_SESSION['roles']=$roles;
    if(in_array(1,$_SESSION['roles'])){
        //Benutzer hat die Rolle Admin
    }


    header("location: start.php");
    exit;
} else {
    // Benutzerdaten falsch
    header("location: index.html");
    exit();
}



?>

</body>
</html>