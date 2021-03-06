<?php
session_start();
$errorOnLogin="";
if ($_SERVER["REQUEST_METHOD"] == "POST")
{ 
	$userName = $_POST["userName"];
	$password = $_POST["password"];
	//1. Connect to the DB server
	$dbConnection = mysqli_connect("localhost", "MIS4153", "pirates4thewin", "MPIS", "3306");
	//1a.  Check connection
	if (mysqli_connect_errno())
	{
		printf("Connection failed. %s\n", mysqli_connect_errno());
		exit();
	}
	//2. Send a query to the DB
	$sql = "SELECT FirstName, LastName, isAdmin FROM UserAccount WHERE EmailAddress='$userName' AND PasswordHash='$password'";
	if ($userAccountArray = mysqli_query($dbConnection, $sql))												
	{
		//3. Work with the returned data
		while ($userAccountInfo = mysqli_fetch_assoc($userAccountArray))
		{
			echo "<tr>";
			echo "<td>" . $userAccountInfo['FirstName'] . "</td>";
			echo "<td>" . $userAccountInfo['LastName'] . "</td>";
			echo "<td>" . $userAccountInfo['isAdmin'] . "</td>";
			echo "</tr>";	
			$_SESSION["SessionStatus"] = "valid";
			$_SESSION["isAdmin"] = $userAccountInfo['isAdmin'];
		}
		//4. Release the data
		mysqli_free_result($userAccountArray);
		if ($_SESSION["SessionStatus"] != "valid")
		{
			$errorOnLogin="The username and password combination is invalid.  Please try again.";
		}
	}
	else
	{
		unset($_SESSION["SessionStatus"]);	
	}
	//5. Close the DB connection
	mysqli_close($dbConnection);
}
?>
<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Macks Pickett Investigative Services, Inc.</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload">

		<!-- Wrapper -->
			<div id="wrapper">

				<!-- Main -->
					<div id="main">
					  <div class="inner">

							<!-- Header -->
								<header id="header">
									<h3>Macks Pickett Investigative Services, Inc.</h3>
								</header>

							<!-- Content -->
								<section class="major">
									<span class="image main"><img src="images/policereport.jpeg" alt="Log In " /></span>
									<?php
										if (isset($_SESSION["SessionStatus"]) && $_SESSION["isAdmin"] == 0)
										{
											header("Location: clients.php");
											die();
										}
										else if (isset($_SESSION["SessionStatus"]) && $_SESSION["isAdmin"] == 1)
										{
											header("Location: employees.php");
											die();
										}
										else
										{
											?>
											<h3>Please enter your log in credentials</h3>
											<form method="post" action="login.php">
												<label><i><?php echo $errorOnLogin ?></i></label>
												<label class="required">Username</label><input type="email" name="userName" required/> <br/>
												<label class="required">Password</label><input type="password" name="password" required/> <br/>
												<input type="submit" value="Submit" />
											</form>
											<?php
										}
									?>
							</section>
						</div>
					</div>



		<!-- Scripts -->
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>