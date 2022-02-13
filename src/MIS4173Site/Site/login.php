<?php
session_start();
$username="username";
$password="password";

if($_SERVER["REQUEST METHOD"]=="POST"){
	if($username==$_POST["username"]&&$password==$_POST["password"]){
		$_SESSION["status"]="valid";
	} else {
		unset($_SESSION["status"]);
	}
}

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
	<?php
	if(isset($_SESSION["status"])){
		echo "<h1>Login successful</h1>";
		echo "Please proceed to the <a href='dashboard.php'>entry page</a>.";
	} else {
		?>
	
		
	<h1>Login</h1>
	<p>Please enter your log in information </p>
	<form method="POST" action="login.php">
		Username: <input type="text" name="username"><br>
		Password: <input type="password" name="password"><br>
		<input type="submit" value="Submit" name="submit">
	</form>
	<?php
	}
	?>
</body>
</html>