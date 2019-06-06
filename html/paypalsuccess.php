<?php
session_start();


$mysqli = new mysqli("localhost", "root", "", "Cemquarium");
if ($mysqli->connect_error) {
    die("Verbindung zur DB fehlgeschlagen: " . $mysqli->connect_error);
}

//Get payment information from PayPal
$item_number = $_GET['item_number'];
$txn_id = $_GET['tx'];
$payment_gross = $_GET['amt'];
$currency_code = $_GET['cc'];
$payment_status = $_GET['st'];

$payment_date = date("D M d, Y G:i");

$payment_user = $_SESSION['username'];
//Get product price from database
/*
 * $productResult = $mysqli->query("SELECT price FROM products WHERE id = ".$item_number);
$productRow = $productResult->fetch_assoc();
$productPrice = $productRow['price'];
*/
if (!empty($txn_id) && $payment_gross /*== $productPrice*/) {
    //Check if payment data exists with the same TXN ID.
    $prevPaymentResult = $mysqli->query("SELECT payment_id FROM payments WHERE txn_id = '" . $txn_id . "'");



    if ($prevPaymentResult->num_rows > 0) {
        $paymentRow = $prevPaymentResult->fetch_assoc();
        $last_insert_id = $paymentRow['payment_id'];
    } else {
        //Insert tansaction data into the database
        $insert = $mysqli->query("INSERT INTO payments(item_number,txn_id,payment_gross,currency_code,payment_status, payment_date) VALUES('" . $item_number . "','" . $txn_id . "','" . $payment_gross . "','" . $currency_code . "','" . $payment_status . "','" . $payment_date . "')");
        $last_insert_id = $mysqli->insert_id;

        $sql = "INSERT INTO `Warenkorb`(`User_username`) VALUES (?);";
        $statement= $mysqli->prepare($sql);
        $statement->bind_param('s', $_SESSION['username']);
        $statement->execute();
        $new_id = $statement->insert_id;
        $_SESSION['warenkorbid'] = $new_id;
    }
    ?>


    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Paypal - Cemquarium</title>

        <!-- Bootstrap core CSS -->
        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/shop-homepage.css" rel="stylesheet">

    </head>

    <body>
<?php
include 'isLoggedIn.php';
?>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">Cemquarium</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="index.php">Startseite
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="kontakt.php">Über uns</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="kontakt.php">Kontakt</a>
          </li>
          <li class="nav-item">
              <?php
              include 'loginlogoutbutton.php';
              ?>
          </li>

          <li class="nav-item">
              <?php
              include 'showwarenkorb.php';
              ?>
          </li>

        </ul>
      </div>
        <form action="search.php" class="form-inline" method="get">
            <input class="form-control" type="text" name="search" placeholder="Suchen" aria-label="Search">
        </form>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <div class="col-lg-3">

        <h1 class="my-4">Bezahlung - PayPal</h1>

          <!-- Example split danger button -->
          <div class="btn-group">
              <a  href="aquarium.php"><button type="button" class="btn btn-secondary">Aquarien</button></a>
              <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="sr-only">Toggle Dropdown</span>
              </button>
              <div class="dropdown-menu">
                  <a class="dropdown-item" href="suesswasser.php">Süßwasser</a>
                  <a class="dropdown-item" href="meerwasser.php">Meerwasser</a>

              </div>
          </div>

          <br>
          <br>
          <br>
          <br>


          <div class="btn-group">
              <a  href="aquariumtechnik.php"><button type="button" class="btn btn-secondary">Aqaurientechnik</button></a>
              <button type="button" class="btn btn-secondary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="sr-only">Toggle Dropdown</span>
              </button>
              <div class="dropdown-menu">
                  <a class="dropdown-item" href="pumpen.php">Pumpen</a>
                  <a class="dropdown-item" href="heizung.php">Heizung</a>

              </div>
          </div>

      </div>
    <div class="col-lg-9">

        <h1>Die Bezahlung war erfolgreich.</h1>
        <h1>Ihre Bezahlnummer lautet - <?php echo $last_insert_id; ?>.</h1>


    </div>



        <!-- Bootstrap core JavaScript -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    </body>

    </html>

<?php } else{ ?>

    <h1>Die Bezahlung wurde nicht korrekt durchgeführt.</h1>
<?php } ?>