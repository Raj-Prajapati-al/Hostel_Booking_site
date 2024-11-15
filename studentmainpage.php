<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        th,
        td {
            padding: 5px;
        }
    </style>
</head>

<body>
    <?php

    $conn = mysqli_connect("localhost", "root", "", "hms");

    // Check connection
    if ($conn == false) {
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
    }
    $sql = "SELECT *  FROM student";
    $result = $conn->query($sql);


    echo "<table border=1 style='margin-left:auto;margin-right:auto;text-align:center;'>
<tr><th>Studentid</th><th>Name</th><th>Parents_Phoneno</th><th>Gender</th><th>Date-of-Birth</th><th>city</th><th>Pincode</th><th>Registration_date</th></tr>";

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr ><td>$row[student_id]</td><td>$row[student_name]</td><td>$row[parents_no]</td><td>$row[Gander]</td><td>$row[Date_of_brith]</td><td>$row[city1]</td><td>$row[pincode]</td><td>$row[date_of_register]</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }
    $conn->close();
    ?>

</body>

</html>