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
									<h2>Macks Pickett Investigative Services, Inc.</h2>
								</header>							

							<!-- Content -->
								<section>
									<span class="image main"><img src="images/Debit_Card_Image.jpeg" alt="Enter Client Information " /></span>
									<h3>Add Client Information</h3>
									<hr/>
									<!-- if session is not valid, redirects user to the log in page -->
									<?php
										if (!isset($_SESSION["SessionStatus"]))
										{
											header("Location: login.php");
											die();
										}
									?>


									<form method="post" action="clientProcessing.php">
										Name: <input type="text" name="clientName" required="true"/> <br/>
										Address: <input type="text" name="address"/> <br/>
										Phone: <input type="text" name="phone"/> <br/>
										Attorney: <input type="text" name="attorney"/> <br/>
										Business: <input type="text" name="business"/> <br/>
										Marital Status: <select id="maritalStatus" name="maritalStatus">
															<option value="single">Single</option>
															<option value="married">Married</option>
															<option value="divorced">Divorced</option>
														  </select> <br/>
										Years Married: <input type="text" name="yearsMarried"/> <br/>
										Number of Children: <input type="text" name="numChildren"/> <br/>
										Subject: <input type="text" name="subject"/> <br/>
										Suspect: <input type="text" name="suspect"/> <br/>
										Status:   <select id="clientStatus" name="clientStatus">
													<option value="Prospect">Prospective Client</option>
													<option value="WaitingToBeAssigned">Needs Investigator Assignment</option>
													<option value="UnderInvestigation">Currently Under Active Investigation</option>
													<option value="Billing">In Invoicing&#x2F;Billing</option>
													<option value="Closed">Closed</option>
												  </select> <br/>
										Type of Request: <textarea name="requestType" rows="4"></textarea><br/>
										Additional Notes: <textarea name="notes" rows="4"></textarea><br/>
										Invoice Number: <input type="text" name="invoiceNumber"/> <br/>
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