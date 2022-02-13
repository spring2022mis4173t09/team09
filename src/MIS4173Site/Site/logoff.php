<?php
session_start();
unset($_SESSION["status"]);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<h1>You are now signed off.</h1>
	<a href="login.php">Go to login page.</a>
</body>
</html>