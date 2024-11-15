<?php
// require("meun.php");
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


    <style>
        tr,
        td {
            font-size: 15px;
        }

        body {
            background: #FAEBD7;
        }
    </style>


</head>

<body>
    <!-- <a href="index.php" class="nav-item nav-link float-end" style='font-size:xx-large;color:blue;'>logout</a>-->

    <a href="session_logout.php" class="nav-item nav-link float-end" style="margin-left:90px;margin-top:2rem;margin-right:3rem;background-color:rgb(255,99,71);color:white;box-sizing:border-box;border:2px solid black;padding:5px;border-radius:8px;font-size:15px;">Logout</a>

    <div class="container">
        <h1 class='mt-5'><u>feedback Details</u></h1>
        <table class="table" style="border-top:2px solid;">
            <thead>

                <tr>
                    <th>Feedack_id</th>
                    <th>Feedback</th>
                    <th>student name</th>
                    <th>Action</th>
                </tr>

            </thead>
            <tbody>
                <?php

                $sql = "SELECT *  FROM feedback,hostel,student where feedback.stu_id=student.student_id and feedback.hostel_id=hostel.hostel_id and hostel.hostelowner_id=$id";
                $result = $conn->query($sql);
                $sr = 0;
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $sr++;
                ?>
                        <tr>
                            <td><?php echo $sr; ?></td>
                            <td><?php echo $row['feedback']; ?></td>
                            <td><?php echo $row['student_name']; ?></td>

                            <td>
                                <a class="btn btn-danger fs-4" href="feedback_main1Delete.php?feedback_id=<?php echo $row['feedback_id']; ?>" style="font-size:12px;padding:2px;width:6vw;">Delete</a>
                            </td>


                        </tr>
                <?php       }
                }
                require('main1.php');
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>