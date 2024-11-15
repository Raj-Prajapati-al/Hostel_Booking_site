<?php
require("meun.php");
$conn = mysqli_connect("localhost", "root", "", "hms");

// Check connection
if ($conn == false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
$sql = "DELETE FROM room WHERE room_number ='" . $row["room_number"] . "'";
echo $sql;
$result = $conn->query($sql);


echo "<table class='table table-striped' >
<tr><th>Room_Number</th><th>RoomType</th><th>Hostelname</th><th>CAPACITY</th><th>startdate</th> <th> update</th> <th> Delete</th></tr>";

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>$row[room_number]</td><td>$row[room_type]</td><td>$row[hostelname]</td><td>$row[CAPACITY]</td><td>$row[startdate]</td><td>Update</td><td>Delete</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>