<?php
session_start();
unset($_SESSION["SessionStatus"]);
?>
<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Pamela Adams</title>
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
								<section>
									<span class="image main"><img src="images/dataentry.jpg" alt="Log Out" /></span>
									<header class="main">
										<h3>Log out</h3>
									</header>


									<hr class="major" />

									<p>
										<h5>You have now been logged off.</h5>
										<h5><a href="Login.php">Go to log in page.</a></h5>
										<h5><a href='Login.php' class='button'>Log In</a></h5>
									</p>
								</section>
						</div>
					</div>

					<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

							<!-- Menu -->
								<nav id="menu">
									<header class="major">
										<h2>Menu</h2>
									</header>
									<ul>
										<li><a href="clients.php">Clients</a></li>
										<li><a href="logout.php">Log out</a></li>
									</ul>
								</nav>
							<!-- Footer -->
								<footer id="footer">
									<p class="copyright">&copy; Macks Pickett Investigative Services, Inc. All rights reserved. Demo Images: <a href="https://unsplash.com">Unsplash</a>. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
								</footer>

						</div>
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