<!DOCTYPE HTML>
 <html>
 	<head>
 		<title>Student Roster</title>
 		<meta charset="UTF-8" />
 		<link rel="stylesheet" type="text/css" href="style.css">
 	</head>
 	<body>
 		<div class="content">
 			<h2 class="pageTitle">Student Roster Display Setup</h2>
 			<p class="pageDescription">Select the order to display the students.</p>
 			<a href="index.html">Go home</a>
 			<form action="process-view.php" method="POST">
 				<label>Sort By:</label>
 				<select name="sort_by">
 					<option value="username">Username</option>
 					<option value="last_nm">Last Name</option>
 				</select> <br>
 				<label>Sort in:</label>
 				<select name="sort_in">
 					<option value="ASC">Ascending</option>
 					<option value="DESC">Descending</option>
 				</select> <br/>
 				<input type="submit" value="Go!" />
 			</form>
 		</div>
 	</body>
 </html> 