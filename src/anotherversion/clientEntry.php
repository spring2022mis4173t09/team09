<?php
		session_start();
		//declare variables so they can be used thrroughout the page.
		$passedClientId=-1;
		$clientName="";
		$address="";
		$phone="";
		$attorney="";
		$business="";
		$maritalStatus="";
		$yearsMarried="";
		$numChildren="";
		$clientStatus="";
		$clientRequest="";
		$notes="";
		$invoiceNumber="";
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
											<h3>Update Client Information</h3>
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
											$sql = "SELECT Name, Address, Phone, Attorney, Business, MaritalStatus, YearsMarried, NumberChildren, Status, Request, Notes, InvoiceNumber, CreatedOn FROM Client WHERE ClientId=$passedClientId";
										   	if ($clientArray = mysqli_query($dbConnection, $sql))												
												{
													//3. Work with the returned data
													while ($clientInfo = mysqli_fetch_assoc($clientArray))
													{
														$clientName = $clientInfo['Name'];
														$address = $clientInfo['Address'];
														$phone = $clientInfo['Phone'];
														$attorney = $clientInfo['Attorney'];
														$business = $clientInfo['Business'];
														$maritalStatus = $clientInfo['MaritalStatus'];
														$yearsMarried = $clientInfo['YearsMarried'];
														$numChildren = $clientInfo['NumberChildren'];
														$clientStatus = $clientInfo['Status'];
														$clientRequest = $clientInfo['Request'];
														$notes = $clientInfo['Notes'];
														$invoiceNumber = $clientInfo['InvoiceNumber'];
													}
													//4. Release the data
													mysqli_free_result($clientArray);
													//5. Close the DB connection
													mysqli_close($dbConnection);												
											}
									   }
									  else
										{
										?>
											<h3>Add Client Information</h3>
											<hr/>
										<?php
										}
									?>


									<form method="post" action="clientProcessing.php">
										<label class="required">Name</label><input type="text" name="clientName" required value="<?php echo $clientName ?>"/> <br/>
										<label class="required">Address</label><input type="text" name="address" required value="<?php echo $address ?>"/> <br/>
										<label class="required">Phone</label><input type="text" name="phone" required value="<?php echo $phone ?>"/> <br/>
										<label>Attorney</label><input type="text" name="attorney" value="<?php echo $attorney ?>"/> <br/>
										<label>Business</label><input type="text" name="business" value="<?php echo $business ?>"/> <br/>
										<label>Marital Status</label><select id="maritalStatus" name="maritalStatus">
														//setting the selected value for the options
														<?php 
															if($maritalStatus=="Single") echo "<option value='Single' selected='true'>Single</option>";
															else echo "<option value='Single'>Single</option>"; 

															if($maritalStatus=="Married") echo "<option value='Married' selected='true'>Married</option>";
															else echo "<option value='Married'>Married</option>"; 

															if($maritalStatus=="Divorced") echo "<option value='Divorced' selected='true'>Divorced</option>";
															else echo "<option value='Divorced'>Divorced</option>";
										
														?>
														  </select> <br/>
										<label>Years Married</label><input type="text" name="yearsMarried" value="<?php echo $yearsMarried ?>"/> <br/>
										<label>Number of Children</label><input type="text" name="numChildren" value="<?php echo $numChildren ?>"/> <br/>
										<label class="required">Status</label><select id="clientStatus" name="clientStatus" required>
														//setting the selected value for the options
														<?php 
															if($clientStatus=="Prospect") echo "<option value='Prospect' selected='true'>Prospective Client</option>";
															else echo "<option value='Prospect'>Prospective Client</option>"; 

															if($clientStatus=="WaitingToBeAssigned") echo "<option value='WaitingToBeAssigned' selected='true'>Needs Investigator Assignment</option>";
															else echo "<option value='WaitingToBeAssigned'>Needs Investigator Assignment</option>"; 

															if($clientStatus=="UnderInvestigation") echo "<option value='UnderInvestigation' selected='true'>Currently Under Active Investigation</option>";
															else echo "<option value='UnderInvestigation'>Currently Under Active Investigation</option>";

															if($clientStatus=="Billing") echo "<option value='Billing' selected='true'>In Invoicing&#x2F;Billing</option>";
															else echo "<option value='Billing'>In Invoicing&#x2F;Billing</option>"; 							

															if($clientStatus=="Closed") echo "<option value='Closed' selected='true'>Closed</option>";
															else echo "<option value='Closed'>Closed</option>"; 											
														?>
												  </select> <br/>
										<label>Type of Request</label><textarea name="requestType" rows="4"><?php echo $clientRequest ?></textarea><br/>
										<label>Additional Notes</label><textarea name="notes" rows="4"><?php echo $notes ?></textarea> <br/>
										<label>Invoice Number</label><input type="text" name="invoiceNumber" value="<?php echo $invoiceNumber ?>"/> <br/>
										<input type="hidden" name="clientId" value="<?php echo $passedClientId ?>"/>
										<input type="hidden" name="actionType" value=""/>
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