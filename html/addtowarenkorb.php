<?php

if (isset($_SESSION['username'])) {
    // ist eingeloggt
    $benutzer = $_SESSION['username'];
    // set feld mit id login auf hidden

    echo '<button type="button" class="btn btn-outline-dark">Warenkorb hinzufügen</button>';


} else {
    // nicht eingeloggt
    // header("location: login.php");
    // set Feld mit id logout auf hidden


}

?>