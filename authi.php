<?php

$con = mysqli_connect("localhost", "root", "", "hms");

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

$sql = "select * from adminlogin where email = '$username' and Password1 = '$password'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
$count = mysqli_num_rows($result);

if ($count == 1) {
    echo "<h1><center> Login successful </center></h1>";
    require("main.php");
} else {
    echo "<h1> Login failed. Invalid username or password.</h1>";
}
$conn->close();
