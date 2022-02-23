<?php
session_start();
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
										<h1>Education</h1>
									</header>

									<span class="image main"><img src="images/dataentry.jpg" alt="Education" /></span>

									<hr class="major" />

									<?php
										if (isset($_SESSION["SessionStatus"]))
										{
											?>
											<h1>Course Processed</h1>
											<?php
											//variables set from courseEntry.php form post
											$courseNumber = $_POST["courseNumber"];
											$courseName = $_POST["courseName"];
											$courseGrade = $_POST["courseGrade"];
											$pirateId = $_POST["pirateId"];
											//1. Connect to the DB server
											$dbConnection = mysqli_connect("localhost", "MIS4153", "pirates4thewin", "mis4153");
											//1a.  Check connection
											if (mysqli_connect_errno())
											{
												printf("Connection failed. %s\n", mysqli_connect_errno());
												exit();
											}
											//2. Send a query to the DB
											$sql = "INSERT INTO courses_taken (Number, Name, Grade, PirateID) Values ('$courseNumber','$courseName','$courseGrade','$pirateId')";
											
											mysqli_query($dbConnection, $sql);

											//5. Close the DB connection
											mysqli_close($dbConnection);

											//ouput of form
											echo "<h5>Thank you.  Your data was added successfully.</h5><p>Here is the information you submitted.<br/>";
											echo "Course Number: $courseNumber<br/>";
											echo "Course Name: $courseName<br/>";
											echo "Course Grade: $courseGrade<br/>";
											echo "<h5>You can view the submitted information on the <a href='education.php#courses'>education page</a>.</h5><h5><a href='education.php' class='button'>Education</a></h5>";
										}
										else
										{
											echo "<h3>Please log in before proceeding.</h3>";
											echo "<h4>Please continue to the <a href='login.php'>login page.</a><h4><h3><a href='Login.php' class='button'>Log In</a></h3>";
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