<?php
session_start();
$userName = "testUser";
$password = "testPassword";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{ 
	if ($userName == $_POST["userName"] && $password == $_POST["password"])
	{
		$_SESSION["SessionStatus"] = "valid";
	}
	else
	{
		unset($_SESSION["SessionStatus"]);
	}
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
									<a href="index.html" class="logo"><strong>Macks Pickett Investigative Services, Inc.</strong></a>
								</header>

							<!-- Content -->
								<section class="major">
									<span class="image main"><img src="images/dataentry.jpg" alt="Log In " /></span>
									<?php
										if (isset($_SESSION["SessionStatus"]))
										{
											header("Location: cases.php");
											die();
										} 
										else
										{
											?>
											<h5>Please enter your log in credentials:</h5>
											<form method="post" action="login.php">
												Username: <input type="text" name="userName"/> <br/>
												Password: <input type="password" name="password"/> <br/>
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