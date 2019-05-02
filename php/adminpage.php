<html>
<head>
</head>
<body>
<h1>Admin-Seite </h1>

    <?php
    session_start();
    include 'isLoggedIn.php';
    if(!in_array(1,$_SESSION['roles'])){
        //Benutzer hat die Rolle Admin
        header("location: keineBerechtigung.php");
        exit;
    }

    ?>



</body>
</html>