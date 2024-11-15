<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


<?php
session_start();

$id = $_SESSION['ownerid'];
if ($id) {
} else {
    header("location:loginpage.php");
}
$conn = mysqli_connect("localhost", "root", "", "hms");

?>
<!DOCTYPE html>
<html>

<head>
    <title>Hostel Booking Site</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <style>
        th,
        td {
            font-family: sans-serif;
            color: black;
            font-size: 15px;
        }
    </style>
</head>

<body>
    <a href="session_logout.php" class="nav-item nav-link float-end" style="margin-left:90px;margin-right:2rem;background-color:rgb(255,99,71);color:white;box-sizing:border-box;border:2px solid black;padding:5px;border-radius:8px;font-size:15px;">Logout</a>

    <div class="container mt-4">

        <table class="table" style="border-top:2px solid;">
            <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Student Name</th>
                    <th>Hostel Name</th>
                    <th>college/company name</th>
                    <th>Designation</th>
                    <th>Gender</th>
                    <th>Address</th>
                    <th>city</th>
                    <th>Parentsno</th>
                    <th>Registered Date</th>
                    <th>Manage</th>
                </tr>
            </thead>

            <tbody>

                <?php

                $sql = "SELECT *  FROM student, registiontable ,hostel where  student.username=registiontable.username  and  student.hostel_id=hostel.hostel_id and hostel.hostelowner_id = $id order by date_of_register desc ";
                $result = $conn->query($sql);
                $sr = 0;
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $sr++;
                ?>
                        <tr>
                            <td><?php echo $sr; ?></td>
                            <td><?php echo $row['student_name']; ?></td>
                            <td><?php echo $row['hostel_name']; ?></td>
                            <td><?php echo $row['college_name'] ?></td>
                            <td><?php echo $row['course_name'] ?></td>
                            <td><?php echo $row['Gander']; ?></td>
                            <td><?php echo $row['Address1']; ?></td>
                            <td><?php echo $row['city1']; ?></td>
                            <td><?php echo $row['parents_no']; ?></td>
                            <td><?php echo $row['date_of_register']; ?></td>

                            <td>
                                <a style="width:6vw;margin-bottom:3px;" class="btn btn-info fs-4" href="studentUpdate.php?student_id=<?php echo $row['student_id']; ?>">Edit</a>
                                <a style="width:6vw" class="btn btn-danger fs-4" href="studentDelete.php?student_id=<?php echo $row['student_id']; ?>">Delete</a>
                            </td>

                        </tr>
                <?php    }
                    require("main1.php");
                }
                ?>
                <span style="width:15%;font-size:12px;">
                    <form action="date_admin_registereduser.php" method="post">
                        <h1 style="display:inline;"><u>Registerd User's Details</u></h1>

                        <label for="dte" style="margin-left:44%;">
                            <h3>Select Choice's:</h3>
                        </label>
                        <select name="dates" id="dte" style="border-radius:3px;border:2px solid;font-size:12px;width:120px;" required>
                            <option value=""></option>
                            <option value="last 5 Days student" required>Record's of This Month</option>
                            <option value="last month student" required>last month</option>
                            <option value="last 10 student" required>last 10 Bookings</option>
                        </select>
                        <input type="submit" value="view" style="border-radius:3px;border:1px solid;color:black;">
                    </form>
                </span><br><br>

            </tbody>
        </table>
    </div>

</body>

</html>