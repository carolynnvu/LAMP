<!DOCTYPE HTML>
 <html>
 	<head>
 		<title>Search</title>
 		<meta charset="UTF-8" />
 	</head>
 	<body>
 		<div class="container">
 			<h1>Search a Student</h1>
 			<p>Enter a username</p>
 			<form action="process_student.php" method="POST">
 				<label>Select data:</label>
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