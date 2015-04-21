<?php 
	
//Log errors
error_reporting(E_ALL);
ini_set("display_errors",1);

//Connect to database server
$connection = mysqli_connect(<db_server>, 
			     <username>, 
			     <password>, 
			     <db>);

if(empty($_POST['sort_by'])) {
	$sortBy = 'username';
} else {
	$sortBy = $_POST['sort_by'];
}

if(empty($_POST['sort_in'])) {
	$sortIn = 'ASC'; 
} else {
	$sortIn = $_POST['sort_in'];
}

//Setup query 
$query = "SELECT username, first_nm, last_nm, date_of_birth, 
				 sex.descript AS sex_descript, 
				 age_group.descript AS age_descript
		  FROM students LEFT JOIN sex ON students.sex_id = sex.sex_id 
		  LEFT JOIN age_group ON students.age_group_id = age_group.age_id 
		  ORDER BY " . $sortBy . " " . $sortIn;

$resultSet = $connection->query($query);

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>View Students</title>
		<meta charset="UTF-8" />
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	<body>

		<div class="content">
			<h3 class="pageTitle"> Student Roster </h3>
			<a href="index.html">Go home</a>
			<table>
				<thead>
					<tr>
						<th>Username</th>
						<th>First Name</th>					
						<th>Last Name</th>					
						<th>DOB</th>					
						<th>Sex</th>					
						<th>Age Group</th>
						<th>See More</th>					
					</tr>
				</thead>
				<tbody>
					<?php while($row = mysqli_fetch_array($resultSet)) : ?>
					<tr>
						<td><?php echo $row["username"]; ?></td>
						<td><?php echo $row["first_nm"]; ?></td>
						<td><?php echo $row["last_nm"]; ?></td>
						<td><?php echo $row["date_of_birth"]; ?></td>
						<td><?php echo $row["sex_descript"]; ?></td>
						<td><?php echo $row["age_descript"]; ?></td>
						<td><a href="student.php?username=<?php echo $row["username"]; ?>"><img src="images/magnifying-glass.png"></a></td>
					</tr>
					<?php endwhile; ?>
				</tbody>
			</table>
		</div>
	</body>
</html>  
