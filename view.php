<!DOCTYPE HTML>
 <html>
 	<head>
 		<title>Form Action Example</title>
 		<meta charset="UTF-8" />
 	</head>
 	<body>
 		<div class="container">
 			<h1>Form Action Example</h1>
 			<p>Select the order to display the students.</p>
 			<form action="process-view.php" method="POST">
 				<label>Sort By:</label>
 				<select name="sort_by">
 					<option value="username">Username</option>
 					<option value="last_nm">Last Name</option>
 				</select>
 				<label>Sort in:</label>
 				<select name="sort_in">
 					<option value="ASC">Ascending</option>
 					<option value="DESC">Descending</option>
 				</select>
 				<input type="submit" value="Go!" />
 			</form>
 		</div>
 	</body>
 </html> 