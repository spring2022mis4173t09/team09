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
									<a href="index.html" class="logo"><strong>Macks Pickett Investigavtive Services, Inc.</strong></a>
								</header>

								<!-- if session is not valid, redirects user to the log in page -->
								<?php
									if (!isset($_SESSION["SessionStatus"]))
									{
										header("Location: login.php");
										die();
									}
								?>							
								<!-- Content -->
								<section>
									<span class="image main"><img src="images/Debit_Card_Image.jpeg" alt="Enter Client Information " /></span>
									<h3>Client Information Processed</h3>
									<hr/>

									<?php
										if (isset($_SESSION["SessionStatus"]))
										{ 
											$clientName = $_POST["clientName"];
											$address = $_POST["address"];
											$phone = $_POST["phone"];
											$attorney = $_POST["attorney"];
											$business = $_POST["business"];
											$maritalStatus = $_POST["maritalStatus"];
											$yearsMarried = $_POST["yearsMarried"];
											$numChildren = $_POST["numChildren"];
											$clientStatus = $_POST["clientStatus"];
											$clientrequest = $_POST["requestType"];
											$note = $_POST["notes"];
											$invoiceNumber = $_POST["invoiceNumber"]; 
											$date = date('Y-m-d H:i:s');
											$clientId = $_POST["clientId"];
											$actionType = $_POST["actionType"];
											//1. Connect to the DB server
											$dbConnection = mysqli_connect("localhost", "MIS4153", "pirates4thewin", "MPIS", "3306");
											//1a.  Check connection
											if (mysqli_connect_errno())
											{
												printf("Connection failed. %s\n", mysqli_connect_errno());
												exit();
											}
											//2. Send a query to the DB
											//if client id is less than 0 then I know it is a new client and we need to do an insert
											if ($clientId < 0 && $actionType == "")
											{
												$sql = "INSERT INTO client (Name, Address, Phone, Attorney, Business, MaritalStatus, YearsMarried, NumberChildren, Status, Request, Notes, InvoiceNumber, CreatedOn) Values ('$clientName','$address','$phone','$attorney','$business','$maritalStatus','$yearsMarried','$numChildren','$clientStatus','$clientrequest','$note','$invoiceNumber', '$date')";												
											}
											elseif ($clientId > 0 && $actionType == "")
											{
												//we know the client id is passed and need to perform an update.
												$sql = "UPDATE client SET Name='$clientName', Address='$address', Phone='$phone', Attorney='$attorney', Business='$business', MaritalStatus='$maritalStatus', YearsMarried='$yearsMarried', NumberChildren='$numChildren', Status='$clientStatus', Request='$clientrequest', Notes='$note', InvoiceNumber='$invoiceNumber' WHERE ClientId=$clientId";						
											}
											elseif ($clientId > 0 && $actionType == "updateClientStatus")
											{
												//we know the client id is passed and actionType - that we only need to update the client status
												$sql = "UPDATE client SET Status='$clientStatus' WHERE ClientId=$clientId";	
											}
											mysqli_query($dbConnection, $sql);

											//5. Close the DB connection
											mysqli_close($dbConnection);

											//ouput of form
											if (clientid < 0 && $actionType == '')
											{
												echo "<h5>Thank you.  Your data was added successfully.</h5><p>Here is the information you submitted.<br/>";
											}
											else
											{
												echo "<h5>Thank you.  Your data was successfully updated.</h5><p>Here is the information you submitted.<br/>";
											}
											if ($actionType == '')
											{
												echo "Name: $clientName<br/>";
												echo "Address: $address<br/>";
												echo "Phone: $phone<br/>";
												echo "Attorney: $attorney<br/>";
												echo "Business: $business<br/>";
												echo "Marital Status: $maritalStatus<br/>";
												echo "Years Married: $yearsMarried<br/>";
												echo "Number of Children: $numChildren<br/>";
												echo "Status: $clientStatus<br/>";
												echo "Request: $clientrequest<br/>";
												echo "Notes: $note<br/>";
												echo "Invoice Number: $invoiceNumber<br/>";
											}
											elseif ($actionType == 'updateClientStatus')
											{
												echo "Name: $clientName<br/>";
												echo "Address: $address<br/>";
												echo "Status: $clientStatus<br/>";
											}
											echo "<h5>You can view the submitted information on the <a href='clients.php'>Clients page</a>.</h5><h5><a href='clients.php' class='button'>Clients</a></h5>";
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