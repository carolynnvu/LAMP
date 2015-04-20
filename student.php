<!DOCTYPE HTML>
 <html>
 	<head>
 		<title>Select Student Data</title>
 		<meta charset="UTF-8" />
 	</head>
 	<body>
 		<div class="container">
 			<h1>Student Details</h1>
 			<p>Select which data you'd like to see.</p>
 			<?php echo $_GET["username"]; ?>
 			<form action="process_student.php" method="POST">
 				<label>Select data:</label>
 				<input type="radio" name="radio" value="address" checked> Address <br>
 				<input type="radio" name="radio" value="instruments"> Instruments <br>
 				<input type="radio" name="radio" value="payments"> Payments <br>
 				<input type="hidden" name="username" value="<?php echo $_GET["username"]; ?>"> <br>
 				<input type="submit" name="submitBtn" value="Go!" />
 			</form>
 		</div>
 	</body>
 </html> 