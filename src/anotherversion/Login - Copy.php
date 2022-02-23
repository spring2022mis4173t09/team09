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
									<a href="index.html" class="logo"><strong>Pamela Adams</strong></a>
									<ul class="icons">
											<li><a href="https://www.linkedin.com/in/pamadams/" target="_blank" class="icon brands fa-linkedin"><span class="label">LinkedIn</span></a></li>
									</ul>
								</header>

							<!-- Content -->
								<section>
									<header class="main">
										<h1>Log in</h1>
									</header>

									<span class="image main"><img src="images/dataentry.jpg" alt="Education" /></span>

									<hr class="major" />

									<?php
										if (isset($_SESSION["SessionStatus"]))
										{
											echo "<h3>Login successful.</h3>";
											echo "<h5>Please continue to the <a class='contact' href='courseEntry.php' class=>course entry page.</a></u></h5><h4><a href='courseEntry.php' class='button'>Enter Course</a></h4>";
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

				<!-- Sidebar -->
					<div id="sidebar">
						<div class="inner">

							<!-- Menu -->
								<nav id="menu">
									<header class="major">
										<h2>Menu</h2>
									</header>
									<ul>
										<li><a href="index.html">Home</a></li>
										<li><a href="skills.html">Skills</a></li>
										<li><a href="experience.html">Experience</a></li>
										<li><a href="education.php">Education</a></li>
										<li><a href="certifications.html">Certifications</a></li>					
									</ul>
								</nav>

							<!-- Section -->
								<section>
									<header class="major">
										<h2>Get in touch</h2>
									</header>
									<ul class="contact">
										<li class="icon solid fa-envelope"><a href="mailto:adamsp18@students.ecu.edu">adamsp18@students.ecu.edu</a></li>
										<li class="icon solid fa-phone">(919) 606-8808</li>
										<li class="icon solid fa-home">2425 Tiltonshire Lane<br />
										Apex, NC 27539</li>
									</ul>
								</section>

							<!-- Footer -->
								<footer id="footer">
									<p class="copyright">&copy; Pamela Adams. All rights reserved. Demo Images: <a href="https://unsplash.com">Unsplash</a>. Design: <a href="https://html5up.net">HTML5 UP</a>.</p>
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