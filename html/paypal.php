<?php
$paypalURL = 'https://www.sandbox.paypal.com/cgi-bin/webscr'; //Test PayPal API URL
$paypalID = 'Rogg.Marvin-facilitator@t-online.de'; //Business Email

$mysqli = new mysqli("localhost", "root", "", "Cemquarium");
if ($mysqli->connect_error) {
    die("Verbindung zur DB fehlgeschlagen: " . $mysqli->connect_error);
}
$sql = "SELECT p.name, p.id, p.beschreibung, p.preis, p.bild 
        FROM Produkt p, Warenkorb w, Warenkorb_has_Produkt wp, User u 
        Where p.id = wp.Produkt_id 
        AND wp.Warenkorb_id = w.id 
        AND w.User_username = u.username 
        AND u.username= ?;";

$statement = $mysqli->prepare($sql);
$statement->bind_param('s', $_SESSION['username']);
$statement->execute();
$result = $statement->get_result();

$preis = 0;
$name = "Test";
$idartikel = "";
while ($row = $result->fetch_object()) {
    $name = "Warenkorb";
    $preis = $preis + $row->preis;
    $bild = $row->bild;
    $idartikel .=  $row->id . 0;
}

echo'
<form action="' . $paypalURL . '" method="post">
        <!-- Identify your business so that you can collect the payments. -->
        <input type="hidden" name="business" value="' . $paypalID . '">
        
        <!-- Specify a Buy Now button. -->
        <input type="hidden" name="cmd" value="_xclick">
        
        <!-- Specify details about the item that buyers will purchase. -->
        <input type="hidden" name="item_name" value="' . $name . '">
        <input type="hidden" name="item_number" value="' . $idartikel . '">
        <input type="hidden" name="amount" value="' . $preis . '">
        <input type="hidden" name="currency_code" value="USD">
        
        <!-- Specify URLs -->
        <input type=\'hidden\' name=\'cancel_return\' value=\'http://localhost:8080/webshop/html/paypalcancel.php\'>
        <input type=\'hidden\' name=\'return\' value=\'http://localhost:8080/webshop/html/paypalsuccess.php\'>
        
        <!-- Display the payment button. -->
        <input type="image" name="submit" border="0"
        src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif" alt="PayPal - The safer, easier way to pay online">
        <img alt="" border="0" width="1" height="1" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" >
    </form>

';