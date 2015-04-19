<?php 
	
//Log errors
error_reporting(E_ALL);
ini_set("display_errors",1);

//Will replace with config file later
$creds = fopen("credentials.txt", "r") or die("Unable to open file!");
$db_server = trim(fgets($creds)); 
$user = trim(fgets($creds)); 
$password = trim(fgets($creds)); 
$db_name = trim(fgets($creds));
fclose($creds);

//Connect to database server
$connection = mysqli_connect($db_server, 
							 $user, 
							 $password, 
							 $db_name);

//Setup query 
$query = "SELECT username, first_nm, last_nm, date_of_birth, 
				 sex.descript AS sex_descript, 
				 age_group.descript AS age_descript
		  FROM students LEFT JOIN sex ON students.sex_id = sex.sex_id 
		  LEFT JOIN age_group ON students.age_group_id = age_group.age_id 
		  ORDER BY username";

$resultSet = $connection->query($query);

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>View Students</title>
		<meta charset="UTF-8" />
	</head>
	<body>
		<?php while($row = mysqli_fetch_array($resultSet)) : ?>
			<li>
				<?php echo $row["username"]; ?>
				-
				<?php echo $row["first_nm"]; ?>
				-
				<?php echo $row["last_nm"]; ?>
				-
				<?php echo $row["date_of_birth"]; ?>
				-
				<?php echo $row["sex_descript"]; ?>
				-
				<?php echo $row["age_descript"]; ?>
			</li>
		<?php endwhile; ?>
	</body>
</html>  