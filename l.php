<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hms";

// Create connection
$conn = new mysqli(
	$servername,
	$username,
	$password,
	$dbname
);

// Check connection
if ($conn->connect_error) {
	die("Connection failed: "
		. $conn->connect_error);
}

$sqlquery = "INSERT INTO adminlogin VALUES 
	('John', 'john@example.com')"

// if ($conn->query($sqlquery) == TRUE) {
// 	echo "record inserted successfully";
// } else {
// 	echo "Error: " . $sql . "<br>" . $conn->error;
// }
?>