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
								<section>
									<header class="main">
										<h1>Clients</h1>
									</header>

									<!-- if session is not valid, redirects user to the log in page -->
									<?php
										if (!isset($_SESSION["SessionStatus"]))
										{
											header("Location: login.php");
											die();
										}
									?>
									<span class="image main"><img src="images/education2.jpg" alt="Cases" /></span>

									<hr class="major" />
									<h5 align="right"><a href="clientEntry.php" class="button">Add Client</a></h5>
									<h3>Prospective Clients</h3>
									<a href="prospects"/>
									<table>
										<thead>
											<tr>
												<th width="150px">Client Id</th>
												<th width="300px">Client Name</th>
												<th>Suspect Name</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<?php
												//1. Connect to the DB server
												$dbConnection = mysqli_connect("localhost", "MIS4153", "pirates4thewin", "MPIS", "3306");
												//1a.  Check connection
												if (mysqli_connect_errno())
												{
													printf("Connection failed. %s\n", mysqli_connect_errno());
													exit();
												}
												//2. Send a query to the DB
												$sql = "SELECT c.ClientId, c.Name, s.Name as Suspect FROM Client c INNER JOIN Person s ON c.SuspectPersonId=s.personId WHERE c.Status='Prospect'";
												if ($clientArray = mysqli_query($dbConnection, $sql))												
												{
													//3. Work with the returned data
													while ($clientInfo = mysqli_fetch_assoc($clientArray))
													{
														echo "<tr>";
														echo "<td>" . $clientInfo['ClientId'] . "</td>";
														echo "<td>" . $clientInfo['Name'] . "</td>";
														echo "<td>" . $clientInfo['Suspect'] . "</td>";
														echo "</tr>";											
													}
													//4. Release the data
													mysqli_free_result(clientArray);
												}
												//5. Close the DB connection
												mysqli_close($dbConnection);
											?>
										</tbody>
									</table>
									<h3>Clients Ready for Investigator Assignment</h3>
									<a href="readyforassignment"/>
									<table>
										<thead>
											<tr>
												<th width="150px">Client Id</th>
												<th width="300px">Client Name</th>
												<th>Suspect Name</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<?php
												//1. Connect to the DB server
												$dbConnection = mysqli_connect("localhost", "MIS4153", "pirates4thewin", "MPIS", "3306");
												//1a.  Check connection
												if (mysqli_connect_errno())
												{
													printf("Connection failed. %s\n", mysqli_connect_errno());
													exit();
												}
												//2. Send a query to the DB
												$sql = "SELECT c.ClientId, c.Name, s.Name as Suspect FROM Client c INNER JOIN Person s ON c.SuspectPersonId=s.personId WHERE c.Status='WaitingToBeAssigned'";
												if ($clientArray = mysqli_query($dbConnection, $sql))												
												{
													//3. Work with the returned data
													while ($clientInfo = mysqli_fetch_assoc($clientArray))
													{
														echo "<tr>";
														echo "<td>" . $clientInfo['ClientId'] . "</td>";
														echo "<td>" . $clientInfo['Name'] . "</td>";
														echo "<td>" . $clientInfo['Suspect'] . "</td>";
														echo "</tr>";											
													}
													//4. Release the data
													mysqli_free_result(clientArray);
												}
												//5. Close the DB connection
												mysqli_close($dbConnection);
											?>
										</tbody>
									</table>
									<h3>Currently Under Investigation</h3>
									<a href="underinvestigation"/>
									<table>
										<thead>
											<tr>
												<th width="150px">Client Id</th>
												<th width="300px">Client Name</th>
												<th>Suspect Name</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<?php
												//1. Connect to the DB server
												$dbConnection = mysqli_connect("localhost", "MIS4153", "pirates4thewin", "MPIS", "3306");
												//1a.  Check connection
												if (mysqli_connect_errno())
												{
													printf("Connection failed. %s\n", mysqli_connect_errno());
													exit();
												}
												//2. Send a query to the DB
												$sql = "SELECT c.ClientId, c.Name, s.Name as Suspect FROM Client c INNER JOIN Person s ON c.SuspectPersonId=s.personId WHERE c.Status='UnderInvestigation'";
												if ($clientArray = mysqli_query($dbConnection, $sql))												
												{
													//3. Work with the returned data
													while ($clientInfo = mysqli_fetch_assoc($clientArray))
													{
														echo "<tr>";
														echo "<td>" . $clientInfo['ClientId'] . "</td>";
														echo "<td>" . $clientInfo['Name'] . "</td>";
														echo "<td>" . $clientInfo['Suspect'] . "</td>";
														echo "</tr>";											
													}
													//4. Release the data
													mysqli_free_result(clientArray);
												}
												//5. Close the DB connection
												mysqli_close($dbConnection);
											?>
										</tbody>
									</table>
									<h3>In Invoicing/Billing</h3>
									<a href="invoicing"/>
									<table>
										<thead>
											<tr>
												<th width="150px">Client Id</th>
												<th width="300px">Client Name</th>
												<th>Suspect Name</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<?php
												//1. Connect to the DB server
												$dbConnection = mysqli_connect("localhost", "MIS4153", "pirates4thewin", "MPIS", "3306");
												//1a.  Check connection
												if (mysqli_connect_errno())
												{
													printf("Connection failed. %s\n", mysqli_connect_errno());
													exit();
												}
												//2. Send a query to the DB
												$sql = "SELECT c.ClientId, c.Name, s.Name as Suspect FROM Client c INNER JOIN Person s ON c.SuspectPersonId=s.personId WHERE c.Status='Billing'";
												if ($clientArray = mysqli_query($dbConnection, $sql))												
												{
													//3. Work with the returned data
													while ($clientInfo = mysqli_fetch_assoc($clientArray))
													{
														echo "<tr>";
														echo "<td>" . $clientInfo['ClientId'] . "</td>";
														echo "<td>" . $clientInfo['Name'] . "</td>";
														echo "<td>" . $clientInfo['Suspect'] . "</td>";
														echo "</tr>";											
													}
													//4. Release the data
													mysqli_free_result(clientArray);
												}
												//5. Close the DB connection
												mysqli_close($dbConnection);
											?>
										</tbody>
									</table>
									<h3>Closed</h3>
									<a href="closedclients"/>
									<table>
										<thead>
											<tr>
												<th width="150px">Client Id</th>
												<th width="300px">Client Name</th>
												<th>Suspect Name</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<?php
												//1. Connect to the DB server
												$dbConnection = mysqli_connect("localhost", "MIS4153", "pirates4thewin", "MPIS", "3306");
												//1a.  Check connection
												if (mysqli_connect_errno())
												{
													printf("Connection failed. %s\n", mysqli_connect_errno());
													exit();
												}
												//2. Send a query to the DB
												$sql = "SELECT c.ClientId, c.Name, s.Name as Suspect FROM Client c INNER JOIN Person s ON c.SuspectPersonId=s.personId WHERE c.Status='Closed'";
												if ($clientArray = mysqli_query($dbConnection, $sql))												
												{
													//3. Work with the returned data
													while ($clientInfo = mysqli_fetch_assoc($clientArray))
													{
														echo "<tr>";
														echo "<td>" . $clientInfo['ClientId'] . "</td>";
														echo "<td>" . $clientInfo['Name'] . "</td>";
														echo "<td>" . $clientInfo['Suspect'] . "</td>";
														echo "</tr>";											
													}
													//4. Release the data
													mysqli_free_result(clientArray);
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