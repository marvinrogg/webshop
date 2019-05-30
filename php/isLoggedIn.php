<?php

if (isset($_SESSION['username'])) {
    // ist eingeloggt
    $benutzer = $_SESSION['username'];
    print $benutzer;
} else {
    // nicht eingeloggt
    header("location: login.php");
    exit();
}

//Timeout nach x sekunden
$time = $_SERVER['Reqeust_TIME'];
/**
* Timeout for 20sec // muss noch erhöcht werden auf 600
*/
$timeout_duration = 20;
if(isset($_SESSION['Last_ACTIVICTY']) && ($time - $_SESSION['Last_ACTIVICTY']) > $timeout_duration)
{
	session_unset();
	session_destroy();
	header("location: index.php");
}
$_SESSION['Last_ACTIVICTY'] = $time;
?> 