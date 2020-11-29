<?php
	$firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$gender = $_POST['gender'];
	$age = $_POST['age'];
	$blood = $_POST['blood'];
	$number = $_POST['number'];

	// Database connection
	$conn = new mysqli('localhost','root','','patient');
	if($conn->connect_error){
		echo "$conn->connect_error";
		die("Connection Failed : ". $conn->connect_error);
	} else {
		$stmt = $conn->prepare("insert into pat_table(firstName, lastName, gender, age, blood, number) values(?, ?, ?, ?, ?, ?)");
		$stmt->bind_param("sssisi", $firstName, $lastName, $gender, $age, $blood, $number);
		$execval = $stmt->execute();
		echo $execval;
		echo "Made appoinment successfully...";
		$stmt->close();
		$conn->close();
	}
?>