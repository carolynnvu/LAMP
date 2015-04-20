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

//Only display information if submit button was pushed. 
if (isset($_POST['submitBtn'])) {
	if(isset($_POST['radio'])) {

		$radioBtnVal = $_POST['radio'];
		$usernameVal = "'".$_POST['username']."'";

		if(strcasecmp($radioBtnVal, "address") == 0) {
			$query = "SELECT street, city, state, zip
				       FROM address WHERE username={$usernameVal}";
		} elseif(strcasecmp($radioBtnVal, "instruments") == 0) {
			$query = "SELECT descript AS instrument_name
					   FROM student_instrument INNER JOIN instruments 
					   ON student_instrument.instrument_id = instruments.instrument_id
					   WHERE username={$usernameVal}";
		} elseif(strcasecmp($radioBtnVal, "payments") == 0) {
			$query = "SELECT amount, payment_method.descript AS payment_method_descript, 
				       payment_due_date, pay_date, late_fee, 
				       received_through.descript AS received_through_descript 
				       FROM payments INNER JOIN payment_method 
				       ON payments.payment_method_id = payment_method.payment_method_id
				       INNER JOIN received_through
				       ON payments.received_through_id = received_through.received_through_id
				       WHERE payments.username={$usernameVal}";
		}

		$resultSet = $connection->query($query);

		// echo gettype($resultSet);
	}
}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>Student Info</title>
		<meta charset="UTF-8" />
	</head>
	<body>	

	<?php if(strcasecmp($radioBtnVal, "address") == 0) { ?>
		<table>
			<thead>
				<tr>
					<th>Street</th>
					<th>City</th>
					<th>State</th>
					<th>Zip</th>
				</tr>
			</thead>
			<tbody>
				<?php while($row = mysqli_fetch_assoc($resultSet) ):?>
					<tr>
						<td><?php echo $row['street']; ?></td>
						<td><?php echo $row['city']; ?></td>
						<td><?php echo $row['state']; ?></td>
						<td><?php echo $row['zip']; ?></td>
					</tr>
				<?php endwhile ?>
			</tbody>
		</table>
	<?php } elseif(strcasecmp($radioBtnVal, "instruments") == 0) { ?>
		<table>
				<thead>
					<tr>
						<th>Name</th>
					</tr>
				</thead>
				<tbody>
					<?php while($row = mysqli_fetch_assoc($resultSet) ):?>
						<tr>
							<td><?php echo $row['instrument_name']; ?></td>
						</tr>
					<?php endwhile ?>
				</tbody>
			</table>
	<?php } ?>
	</body>
</html>





