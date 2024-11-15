<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <div class="container mt-3">
        <?php
        // $ownerid=$_GET['ownerid'];
        session_start();

        $id = $_SESSION['ownerid'];
        $date = $_POST['dates'];
        if ($id) {
        } else {
            header("location:loginpagemain.php");
        }
        // echo "$date";
        if ($date == 'last 5 Days student') {
            echo  "<h2><u>Registration of this month</u></h2>
                <table class='table' style='border-top:2px solid;'>
                    <thead>
                    
                    <tr><th>Sr.No</th><th>Student Name</th><th>Hostel Name</th><th>college/company name</th><th>Designation</th><th>Gender</th><th>Address</th><th>city</th> <th>Parentsno</th><th>Registered Date</th><th>Manage</th>  </tr>
                
                    </thead>
                    <tbody> ";
            $d = 01;
            $d1 = 15;
            $da = Date('d');
            $m = Date('m');
            $y = Date('y');
            // echo "<br>$d<br>$m<br>$y";
            $dates1 = "$y-$m-$d";
            // echo "<br>$dates1<br>";
            $dates2 = "$y-$m-$da";
            // echo "<br>$dates2";
            $conn = mysqli_connect("localhost", "root", "", "hms");
            $sql = "SELECT *  FROM student,registiontable ,hostel  where date_of_register > '$dates1' and date_of_register < '$dates2'  and  student.username=registiontable.username  and  student.hostel_id=hostel.hostel_id and hostel.hostelowner_id = $id order by date_of_register desc ";
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
                            <a class="btn btn-info" href="studentUpdate.php?student_id=<?php echo $row['student_id']; ?>" style="height:30px;width:50px;">Edit</a>
                            <a class="btn btn-danger" href="studentDelete.php?student_id=<?php echo $row['student_id']; ?>" style="height:30px;width:70px;">Delete</a>
                        </td>

                    </tr>
                <?php       }
                require("main1.php");
                echo "<br>";
            } else {
                header("location:wrongdata.php");
            }
        } else if ($date == "last month student") {
            echo  "<h2><u>Last Month Registered User's</u></h2>
            <table class='table' style='border-top:2px solid;'>
                <thead>
                
                <tr><th>Sr.No</th><th>Student Name</th><th>Hostel Name</th><th>college/company name</th><th>Designation</th><th>Gender</th><th>Address</th><th>city</th> <th>Parentsno</th><th>Registered Date</th><th>Manage</th>  </tr>
            
                </thead>
                <tbody> ";
            $d = Date('m');
            $m = Date('m');
            $m -= 1;
            $y = Date('y');
            // echo "<br>$d<br>$m<br>$y";
            $dates1 = "$y-$m-$d";
            // echo "<br>$dates1<br>";
            $d1 = 1;
            $m += 1;
            $dates2 = "$y-$m-$d1";
            // echo "<br>$dates2";
            $conn = mysqli_connect("localhost", "root", "", "hms");
            $sql = "SELECT *  FROM student,registiontable ,hostel  where date_of_register > '$dates1' and date_of_register < '$dates2'  and  student.username=registiontable.username  and  student.hostel_id=hostel.hostel_id and hostel.hostelowner_id = $id order by date_of_register desc ";
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
                            <a class="btn btn-info" href="studentUpdate.php?student_id=<?php echo $row['student_id']; ?>" style="height:30px;width:50px;">Edit</a>
                            <a class="btn btn-danger" href="studentDelete.php?student_id=<?php echo $row['student_id']; ?>" style="height:30px;width:70px;">Delete</a>
                        </td>

                    </tr>
                <?php       }
                require("main1.php");
            } else {
                header("location:wrongdata.php");
            }
        } else {
            echo  "<h2><u>Registerd User's Details</u></h2>
                <table class='table' style='border-top:2px solid;'>
                    <thead>
                    
                    <tr><th>Sr.No</th><th>Student Name</th><th>Hostel Name</th><th>college/company name</th><th>Designation</th><th>Gender</th><th>Address</th><th>city</th> <th>Parentsno</th><th>Registered Date</th><th>Manage</th>  </tr>
                
                    </thead>
                    <tbody> ";

            $conn = mysqli_connect("localhost", "root", "", "hms");

            $sql = "SELECT *  FROM student,registiontable ,hostel  where student.username=registiontable.username  and  student.hostel_id=hostel.hostel_id and hostel.hostelowner_id = $id order by date_of_register desc LIMIT 5 ";
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
                            <a class="btn btn-info" href="studentUpdate.php?student_id=<?php echo $row['student_id']; ?>" style="height:30px;width:50px;">Edit</a>
                            <a class="btn btn-danger" href="studentDelete.php?student_id=<?php echo $row['student_id']; ?>" style="height:30px;width:70px;">Delete</a>
                        </td>

                    </tr>
        <?php       }
                require("main1.php");
            } else {
                header("location:wrongdata.php");
            }
        }
        ?>
        </tbody>
        </table>
    </div>
    <script src="script.js"></script>
</body>

</html>