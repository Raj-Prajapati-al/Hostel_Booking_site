<?php

// servername => localhost
// username => root
// password => empty
// database name => staff
$conn = mysqli_connect("localhost", "root", "", "hms");

// Check connection
if ($conn === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

// Taking all 5 values from the form data(input)

$first_name =  $_REQUEST['room_number'];
//$last_name = $_REQUEST['last_name'];
//$gender =  $_REQUEST['gender'];
$address = $_REQUEST['room_description'];
$email = $_REQUEST['room_type'];


// Performing insert query execution
// here our table name is college
$sql = "INSERT INTO room (room_number,room_type,room_description)  VALUES ('$first_name', 
    '$email','$address')";


if (mysqli_query($conn, $sql)) {


    //echo nl2br("\n$first_name\n $last_name\n "
    //  . "$gender\n $address\n $email");
    include("main.php");
} else {
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
