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

									<span class="image main"><img src="images/education2.jpg" alt="Education" /></span>

									<hr class="major" />

									<p>
									<h2>Degrees</h2>
									<b>BS in Business Administration, Management Information Systems</b><br/>
									East Carolina University, 05/2022</p>
									<p><b>Associates Degree in Computer Programming</b><br/> Wake Technical Community College, 05/1993
									</p>
									
									<hr class="major" />
									<h2>Courses Taken at East Carolina University</h2>
									<a href="courses"/>
									<h5 align="right"><a href="courseEntry.php" class="button">Add Courses</a></h5>
									<table>
										<thead>
											<tr>
												<th width="150px">Course Number</th>
												<th width="300px">Course Title</th>
												<th>Course Grade</th>
											</tr>
										</thead>
										<tbody>
											<?php
												//1. Connect to the DB server
												$dbConnection = mysqli_connect("localhost", "MIS4153", "pirates4thewin", "mis4153");
												//1a.  Check connection
												if (mysqli_connect_errno())
												{
													printf("Connection failed. %s\n", mysqli_connect_errno());
													exit();
												}
												//2. Send a query to the DB
												$sql = "SELECT Number, Name, Grade FROM courses_taken Where PirateID='adamsp18'";
												if ($coursesArray = mysqli_query($dbConnection, $sql))												{
													//3. Work with the returned data
													while ($courseInfo = mysqli_fetch_assoc($coursesArray))
													{
														echo "<tr>";
														echo "<td>" . $courseInfo['Number'] . "</td>";
														echo "<td>" . $courseInfo['Name'] . "</td>";
														echo "<td>" . $courseInfo['Grade'] . "</td>";
														echo "</tr>";											
													}
													//4. Release the data
													mysqli_free_result($coursesArray);
												}
												//5. Close the DB connection
												mysqli_close($dbConnection);
											?>
										</tbody>
									</table>
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