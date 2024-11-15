<?php
// require("meun.php");
// $conn = mysqli_connect("localhost", "root", "", "hms");

// Check connection
// if($conn == false){
//     die("ERROR: Could not connect. "
//         . mysqli_connect_error());
// }
// $sql="SELECT *  FROM room"; 
// $result = $conn->query($sql);


// echo "<table class='table table-striped table-bordered border-primary' >
// <tr><th>Room_Number</th><th>RoomType</th><th>Hostelname</th><th>CAPACITY</th><th>startdate</th> <th>Edit</th> <th> Delete</th></tr>";

// if ($result->num_rows > 0) {
//     // output data of each row
//     while($row = $result->fetch_assoc())
//     {
// echo "<tr class='mt-5'  ><td>$row[room_number]</td><td>$row[room_type]</td><td>$row[ ]</td><td>$row[CAPACITY]</td><td>$row[startdate]</td><td>Update</td><td>
// <a href=Delete_room.php?room_number ='$row[room_number]'>"."Delete</a>

// </td></tr>";
// }
// echo "</table>";
// }
// else {
//     echo "0 results";
//   }
//   $conn->close();
// 
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


<?php
session_start();
$ownerid = $_SESSION['ownerid'];
if ($ownerid) {
} else {
    header("location:loginpage.php");
}
$conn = mysqli_connect("localhost", "root", "", "hms");

?>
<!DOCTYPE html>
<html>

<head>
    <title>Hostel Booking Site</title>
    </title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
</head>

<body>
    <a href="session_logout.php" class="nav-item nav-link float-end" style="margin-left:90px;margin-right:2rem;background-color:rgb(255,99,71);color:white;box-sizing:border-box;border:2px solid black;padding:5px;border-radius:8px;font-size:15px;">Logout</a>
    <div class="container mt-5">

        <table class="table" style="border-top:2px solid;">
            <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Room Number</th>
                    <th>Room Type</th>
                    <th>Hostel Name</th>
                    <th>Student Name</th>
                    <th>Startdate</th>
                    <th>Duration</th>
                    <th>Booking Date</th>
                    <th>EndDate</th>
                    <th>Manage </th>

                </tr>
            </thead>
            <tbody>
                <?php

                $sql = "SELECT * FROM roomdata,hostel,student where roomdata.hostel_id=hostel.hostel_id and roomdata.student_id=student.student_id and hostel.hostelowner_id like '" . $ownerid . "'";
                $result = $conn->query($sql);
                $sr = 0;
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $sr++;
                ?>
                        <tr>
                            <td><?php echo $sr ?></td>
                            <td><?php echo $row['room_number']; ?></td>
                            <td><?php echo $row['room_type']; ?></td>
                            <td><?php echo $row['hostel_name'] ?></td>
                            <td><?php echo $row['student_name'] ?></td>
                            <td><?php echo $row['startDate']; ?></td>
                            <td><?php echo $row['duration']; ?></td>
                            <td><?php echo $row['date_of_booking']; ?></td>
                            <td><?php echo $row['endDate']; ?></td>
                            <td>
                                <a class="btn btn-info fs-4" href="update.php?id=<?php echo $row['id']; ?>" style="width:6vw;">Edit</a>
                                <!-- <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td> -->
                        </tr>
                <?php   }

                    require("main1.php");
                }
                ?>
                <span style="width:15%;font-size:12px;">
                    <form action="date_admin.php" method="post">
                        <h1 style="display:inline;">
                            <u>Room Details</u>
                        </h1>
                        <label for="dte" style="margin-left:58%;">
                            <h3>Select Choice's:</h3>
                        </label>
                        <select name="dates" id="dte" style="border-radius:3px;border:2px solid;font-size:12px;width:120px;" required>
                            <option value=""></option>
                            <option value="last 5 Days" required>Bookings of this month</option>
                            <option value="last month" required>last month</option>
                            <option value="last 10" required>last 10 Bookings</option>
                            <option value="Expire" required>Duration Ending Report</option>
                            <option value="status" required>Room Status</option>
                        </select>
                        <input type="submit" value="view" style="border-radius:3px;border:1px solid;color:black;">
                    </form>
                </span><br><br>
            </tbody>
        </table>
    </div>

</body>

</html>