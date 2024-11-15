<?php
session_start();
$roomid = $_SESSION['ownerid'];
if ($roomid) {
} else {
    header("location:loginpagemain.php");
}
$conn = mysqli_connect("localhost", "root", "", "hms");


if (isset($_GET['id'])) {

    $user_id = $_GET['id'];

    $sql = "DELETE FROM `roomdata` WHERE `id`='$user_id'";

    $result = $conn->query($sql);

    if ($result == TRUE) {

        echo "Record deleted successfully.";
    } else {

        echo "Error:" . $sql . "<br>" . $conn->error;
    }
}
