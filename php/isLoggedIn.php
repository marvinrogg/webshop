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

?> 