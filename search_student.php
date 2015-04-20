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


if (isset($_POST['submitBtn'])) {
	$usernameVal = "'".$_POST['username']."'";

	//Setup query 
	$query = "SELECT first_nm, last_nm, date_of_birth, 
			  sex.descript AS sex_descript, 
			  age_group.descript AS age_descript
			  FROM students LEFT JOIN sex ON students.sex_id = sex.sex_id 
			  LEFT JOIN age_group ON students.age_group_id = age_group.age_id 
			  WHERE username={$usernameVal} LIMIT 1";

	$resultSet = $connection->query($query);
}

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Search Student Result</title>
		<meta charset="UTF-8" />
	</head>
	<body>
		<h1>Search Result</h1>
		<?php 
			$row_count = mysqli_num_rows($resultSet); 
			if($row_count < 1) {
				echo "NO STUDENT";
			} else {
				echo "FOUND!!!";
			}
		?>
	</body>
</html>



