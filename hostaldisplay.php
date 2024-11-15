<?php

$conn = mysqli_connect("localhost", "root", "", "hms");

// Check connection
if ($conn == false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}
$sql = "SELECT *  FROM hostel";
$result = $conn->query($sql);


echo "<table broder=1>
<tr><th>hostelname</th><th>hosteldescription</th><th>hosteltype</th><th>hostelfees</th><th>hosteladdress</th><th>Book</th> </tr>";

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr ><td>$row[hostel_name]</td><td>$row[hostel_description]</td><td>$row[hostel_type]</td><td>$row[hostel_fees]</td><td>$row[hostel_address]</td><td>book</td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}
$conn->close();
