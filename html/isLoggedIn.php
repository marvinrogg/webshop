<?php

if (isset($_SESSION['username'])) {
    // ist eingeloggt
    $benutzer = $_SESSION['username'];
    print $benutzer;


} else {
    // nicht eingeloggt
   // header("location: login.php");
    print "nicht eingeloggt";
}

//Timeout nach x sekunden
$time = $_SERVER['REQUEST_TIME'];
/**
* Timeout for 10min 
*/
$timeout_duration = 600;
if(isset($_SESSION['Last_ACTIVICTY']) && ($time - $_SESSION['Last_ACTIVICTY']) > $timeout_duration)
{
	session_unset();
	session_destroy();
	header("location: index.php");
}
$_SESSION['Last_ACTIVICTY'] = $time;

?> 