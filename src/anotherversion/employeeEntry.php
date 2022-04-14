<?php
	session_start();
	//declare variables so they can be used thrroughout the page.
	$passedEmployeeId=-1;
	$firstName="";
	$lastName="";
	$password="";
	$emailAddress="";
	$isActive=0;
	$lastLoginDate="";
	$lastPwdChangeDate="";
	$date = date('Y-m-d');
	$datetime = date('Y-m-d H:i:s');
	$result="";

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{ 
		$passedEmployeeId = $_POST["employeeId"];
		$firstName = $_POST["firstName"];
		$lastName = $_POST["lastName"];
		$password = $_POST["pwd"];		
		$emailAddress = $_POST["emailAddress"];
		$isActive = $_POST["isActive"] != '' ? $_POST["isActive"] : 0;
		//1. Connect to the DB server
		$dbConnection = mysqli_connect("localhost", "MIS4153", "pirates4thewin", "MPIS", "3306");
		//1a.  Check connection
		if (mysqli_connect_errno())
		{
			printf("Connection failed. %s\n", mysqli_connect_errno());
			exit();
		}
		//2. Send a query to the DB
		if ($passedEmployeeId < 0)
		{
			$sql = "INSERT INTO UserAccount (FirstName, LastName, PasswordHash, emailAddress, isActive, lastPwdChangeDate, CreatedDate) Values ('$firstName','$lastName','$password', '$emailAddress', 1,'$date', '$datetime')";
		}
		elseif ($passedEmployeeId > 0)
		{
			//we know the client id is passed and need to perform an update.
			$sql = "UPDATE UserAccount SET FirstName='$firstName', LastName='$lastName', EmailAddress='$emailAddress', IsActive=$isActive WHERE UserAccountId=$passedEmployeeId";			
		}
		echo $sql;
		mysqli_query($dbConnection, $sql);
		//5. Close the DB connection
		mysqli_close($dbConnection);
		$result="success";
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
									<span class="image main"><img src="images/Debit_Card_Image.jpeg" alt="Employee Information " /></span>
									<!-- if session is not valid, redirects user to the log in page -->
									<?php
										if (!isset($_SESSION["SessionStatus"]))
										{
											header("Location: login.php");
											die();
										}
										if ($result == "success")
										{
											header("Location: employees.php");
											die();	
										}
									   	if(isset($_GET['id']))
									   	{
										   $passedEmployeeId = $_GET['id'];
											?>
											<h3>Update Employee</h3>
											<hr/>
									   <?php
										   //**Need to get data for employee id so we can set the form defaults.
											//1. Connect to the DB server
											$dbConnection = mysqli_connect("localhost", "MIS4153", "pirates4thewin", "MPIS", "3306");
											//1a.  Check connection
											if (mysqli_connect_errno())
											{
												printf("Connection failed. %s\n", mysqli_connect_errno());
												exit();
											}
											//2. Send a query to the DB
											$sql = "SELECT FirstName, LastName, EmailAddress, isActive, LastLoginDate, LastPwdChangeDate FROM UserAccount WHERE UserAccountId=$passedEmployeeId";
										   	if ($employeeArray = mysqli_query($dbConnection, $sql))												
											{
													//3. Work with the returned data
													while ($employeeInfo = mysqli_fetch_assoc($employeeArray))
													{
														$firstName = $employeeInfo['FirstName'];
														$lastName = $employeeInfo['LastName'];
														$emailAddress = $employeeInfo['EmailAddress'];
														$isActive = $employeeInfo['isActive'];
														$lastLoginDate = $employeeInfo['LastLoginDate'];
														$lastPwdChangeDate = $employeeInfo['LastPwdChangeDate'];
													}
													//4. Release the data
													mysqli_free_result($employeeArray);
													//5. Close the DB connection
													mysqli_close($dbConnection);												
											}
									   }
									   else
										{
										?>
											<h3>Add Employee</h3>
											<hr/>
										<?php
										}
									?>


									<form method="post" action="employeeEntry.php">
										<label class="required">First Name</label><input type="text" name="firstName" required value="<?php echo $firstName ?>"/> <br/>
										<label class="required">Last Name</label><input type="text" name="lastName" required value="<?php echo $lastName ?>"/> <br/>
										<label class="required">Email Address</label><input type="text" name="emailAddress" required value="<?php echo $emailAddress ?>"/> <br/>
										<?php
											if ($passedEmployeeId < 1)
											{
												echo "<label class='required'>Password</label><input type='password' name='pwd' required /> <br/>";
												echo "<input type='hidden' name='isActive' value='1'/>";
											}
											else
											{
												if ($isActive==1)
												{
													echo "<input type='checkbox' id='isActive' name='isActive' value='1' checked><label for='isActive'> Active</label><br>";

												}
												else
												{
													echo "<input type='checkbox' id='isActive' name='isActive' value='1'><label for='isActive'> Active</label><br>";
												}
												echo "<strong>Password Last Changed Date:&nbsp;&nbsp;</strong>$lastPwdChangeDate <br/>";
												echo "<strong>Last Login Date:&nbsp;&nbsp;</strong>$lastLoginDate <br/><br/>";
											}
										?>
										<input type="hidden" name="employeeId" value="<?php echo $passedEmployeeId ?>"/>
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