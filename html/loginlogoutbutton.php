<?php

if (isset($_SESSION['username'])) {
    // ist eingeloggt
    $benutzer = $_SESSION['username'];
    // set feld mit id login auf hidden

    echo '<a class="nav-link" href="logout.php">Logout</a>';


} else {
    // nicht eingeloggt
    // header("location: login.php");
    // set Feld mit id logout auf hidden
    echo '<a class="nav-link" href="login.php">Login</a>';

}

?>