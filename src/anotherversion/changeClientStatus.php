<?php
		session_start();
		//declare variables so they can be used thrroughout the page.
		$passedClientId=-1;
		$clientName="";
		$address="";
		$clientStatus="";
?>
<!DOCTYPE HTML>
<!--
	Editorial by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Macks Pickett Investigavtive Services, Inc.</title>
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
									<span class="image main"><img src="images/Debit_Card_Image.jpeg" alt="Client Information " /></span>
									<!-- if session is not valid, redirects user to the log in page -->
									<?php
										if (!isset($_SESSION["SessionStatus"]))
										{
											header("Location: login.php");
											die();
										}
									   if(isset($_GET['id']))
									   {
										   $passedClientId = $_GET['id'];
											?>
											<h3>Update Client Status</h3>
											<hr/>
									   <?php
										   //**Need to get data for client id so we can set the form defaults.
											//1. Connect to the DB server
											$dbConnection = mysqli_connect("localhost", "MIS4153", "pirates4thewin", "MPIS", "3306");
											//1a.  Check connection
											if (mysqli_connect_errno())
											{
												printf("Connection failed. %s\n", mysqli_connect_errno());
												exit();
											}
											//2. Send a query to the DB
											$sql = "SELECT Name, Address, Status FROM Client WHERE ClientId=$passedClientId";
										   	if ($clientArray = mysqli_query($dbConnection, $sql))												
												{
													//3. Work with the returned data
													while ($clientInfo = mysqli_fetch_assoc($clientArray))
													{
														$clientName = $clientInfo['Name'];
														$address = $clientInfo['Address'];
														$clientStatus = $clientInfo['Status'];
													}
													//4. Release the data
													mysqli_free_result(clientArray);
													//5. Close the DB connection
													mysqli_close($dbConnection);												
											}
									   }
									?>


									<form method="post" action="clientProcessing.php">
										Name: <?php echo $clientName ?> <br/>
										Address: <?php echo $address ?> <br/>
										Status:   <select id="clientStatus" name="clientStatus" required>
													<option value="Prospect">Prospective Client</option>
													<option value="WaitingToBeAssigned">Needs Investigator Assignment</option>
													<option value="UnderInvestigation">Currently Under Active Investigation</option>
													<option value="Billing">In Invoicing&#x2F;Billing</option>
													<option value="Closed">Closed</option>
												  </select> <br/>
										<input type="hidden" name="clientName" value="<?php echo $clientName ?>"/>
										<input type="hidden" name="address" value="<?php echo $address ?>"/>
										<input type="hidden" name="clientId" value="<?php echo $passedClientId ?>"/>
										<input type="hidden" name="actionType" value="updateClientStatus"/>
										<input type="submit" value="Submit" />
									</form>
							
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