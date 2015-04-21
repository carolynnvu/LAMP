<!DOCTYPE HTML>
 <html>
 	<head>
 		<title>Select Student Data</title>
 		<meta charset="UTF-8" />
 		<link rel="stylesheet" type="text/css" href="style.css">
 	</head>
 	<body>
 		<div class="content">
 			<h3 class="pageTitle">Student Details</h3>
 			<p class="pageDescription">Select which data you'd like to see.</p>
 			<a href="index.html">Go home</a>
 			<form action="process_student.php" method="POST">
 				<label>Select data:</label> <br>
 				<input type="radio" name="radio" value="address" checked> Address <br>
 				<input type="radio" name="radio" value="instruments"> Instruments <br>
 				<input type="radio" name="radio" value="payments"> Payments <br>
 				<input type="radio" name="radio" value="contact_info"> Contact Info <br>
 				<input type="hidden" name="username" value="<?php echo $_GET["username"]; ?>"> <br>
 				<input type="submit" name="submitBtn" value="Go!" />
 			</form>
 		</div>
 	</body>
 </html> 