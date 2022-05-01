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
									<h3>Macks Pickett Investigative Services, Inc.</h3>
								</header>							
						   
						  <!-- Content -->
								<section>
									<span class="image main"><img src="images/policereport.jpeg" alt="Clients" /></span>
									<h3>Employees</h3>
									<hr/>
									

									<!-- if session is not valid, redirects user to the log in page -->
									<?php
										if (!isset($_SESSION["SessionStatus"]))
										{
											header("Location: login.php");
											die();
										}
										//FIRST - Open the connection to the DB server
										$dbConnection = mysqli_connect("localhost", "MIS4153", "pirates4thewin", "MPIS", "3306");
										//1a.  Check connection
										if (mysqli_connect_errno())
										{
											printf("Connection failed. %s\n", mysqli_connect_errno());
											exit();
										}
									?>


									<h5 align="right"><a href="employeeEntry.php" class="button">Add Employee</a></h5>
									<h4>Active Employees</h4>
<!--									<a href="prospects"/>-->
									<table>
										<thead>
											<tr>
												<th width="150px">Employee Id</th>
												<th width="300px">First Name</th>
												<th width="300px">Last Name</th>
												<th>Email</th>
												<th>Administator?</th>
												<th align="left"></th>
											</tr>
										</thead>
										<tbody>
											<?php
												//RUN Employee query - ative users
												$sql = "SELECT UserAccountId, FirstName, LastName, EmailAddress, isAdmin FROM UserAccount WHERE IsActive=1";
												if ($employeeArray = mysqli_query($dbConnection, $sql))												
												{
													//3. Work with the returned data
													while ($employeeInfo = mysqli_fetch_assoc($employeeArray))
													{
														echo "<tr>";
														echo "<td>" . $employeeInfo['UserAccountId'] . "</td>";
														echo "<td>" . $employeeInfo['FirstName'] . "</td>";
														echo "<td>" . $employeeInfo['LastName'] . "</td>";
														echo "<td>" . $employeeInfo['EmailAddress'] . "</td>";
														echo $employeeInfo['isAdmin'] != 1 ?  "<td>No</td>" : "<td>Yes</td>";
														echo "<td align='right'><a href='employeeEntry.php?id=" .$employeeInfo['UserAccountId'] . "' class='icon solid fa-edit' title='Edit'></td>";
														echo "</tr>";											
													}
													//4. Release the data
													mysqli_free_result($employeeArray);
												}
											?>
										</tbody>
									</table>
									<h4>Inactive Employees</h4>
									<table>
										<thead>
											<tr>
												<th width="150px">Employee Id</th>
												<th width="300px">First Name</th>
												<th width="300px">Last Name</th>
												<th>Email</th>
												<th>Administator?</th>
												<th align="left"></th>
											</tr>
										</thead>
										<tbody>
											<?php
												//RUN Employee query - ative users
												$sql = "SELECT UserAccountId, FirstName, LastName, EmailAddress, isAdmin FROM UserAccount WHERE IsActive=0";
												if ($employeeArray = mysqli_query($dbConnection, $sql))												
												{
													//3. Work with the returned data
													while ($employeeInfo = mysqli_fetch_assoc($employeeArray))
													{
														echo "<tr>";
														echo "<td>" . $employeeInfo['UserAccountId'] . "</td>";
														echo "<td>" . $employeeInfo['FirstName'] . "</td>";
														echo "<td>" . $employeeInfo['LastName'] . "</td>";
														echo "<td>" . $employeeInfo['EmailAddress'] . "</td>";
														echo $employeeInfo['isAdmin'] != 1 ?  "<td>No</td>" : "<td>Yes</td>";
														echo "<td align='right'><a href='employeeEntry.php?id=" .$employeeInfo['UserAccountId'] . "' class='icon solid fa-edit' title='Edit'></td>";
														echo "</tr>";											
													}
													//4. Release the data
													mysqli_free_result($employeeArray);
												}
											?>
										</tbody>
									</table>
									<?php
										//FINALLY....close the DB connection
										mysqli_close($dbConnection);
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
										<li><a href="employees.php">Employees</a></li>
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