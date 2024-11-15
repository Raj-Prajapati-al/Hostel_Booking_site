<?php
$conn = mysqli_connect("localhost", "root", "", "hms");

// Check connection
if ($conn == false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
$username = $_POST['user'];
$password = $_POST['pass'];

//to prevent from mysqli injection  
$username = stripcslashes($username);
$password = stripcslashes($password);
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);
session_start();


$sql = "update registiontable  set  password1 = '$password' where username = '$username'";

$result = mysqli_query($conn, $sql);
//$row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
//$count = mysqli_num_rows($result);  
echo "your Password is change";
include("student_main_Login.php");


$conn->close();
