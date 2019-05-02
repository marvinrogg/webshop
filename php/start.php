<html>
<head>
</head>
<body>
	<h1>Willkommen 
	
<?php
session_start();
include 'isLoggedIn.php';

?>

	im Shop</h1>

	<form action="logout.php">
		<input type="submit" value="logout">
	</form>

</body>
</html>