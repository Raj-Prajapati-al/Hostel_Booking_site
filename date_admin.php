<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

</head>

<body>

    <a href="session_logout.php" class="nav-item nav-link float-end" style="margin-left:90px;margin-right:2rem;background-color:rgb(255,99,71);color:white;box-sizing:border-box;border:2px solid black;padding:5px;border-radius:8px;font-size:15px;">Logout</a>
    <?php
    session_start();
    $owner = $_SESSION['ownerid'];
    if ($owner) {
    } else {
        header("location:loginpage.php");
    }
    ?>

    <div class="container mt-3">

        <?php
        // $ownerid=$_GET['ownerid'];

        $date = $_POST['dates'];
        // echo "$owner";
        if ($date == 'last 5 Days') {
            echo " <table class='table' style='border-top:2px solid;'>
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
                <tbody>";
            $d = 01;
            $d1 = 05;
            $da = Date('d');
            $m = Date('m');
            $y = Date('y');
            // echo "<br>$d<br>$m<br>$y";
            $dates1 = "$y-$m-$d";

            // echo "<br>$dates1<br>";
            $dates2 = "$y-$m-$da";
            // echo "<br>$dates2";
            $conn = mysqli_connect("localhost", "root", "", "hms");
            $sql = "SELECT * FROM roomdata,hostel,student where roomdata.date_of_booking  >= '$dates1' and roomdata.date_of_booking  <= '$dates2' and roomdata.hostel_id=hostel.hostel_id and roomdata.student_id=student.student_id and hostel.hostelowner_id = $owner";
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
                            <a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>" style="width:90%;">Edit</a>
                            <!-- <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td> -->

                    </tr>
                <?php       }

                require("main1.php");
                echo "<br>";
                echo " <h4 style='display:inline;'><u> Records of This Month</u></h4>";
                echo "<br><br>";
            } else {
                header("location:wrongdata.php");
            }
        } else if ($date == "last month") {
            echo " <table class='table' style='border-top:2px solid;'>
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
                <tbody>";
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
            $sql = "SELECT * FROM roomdata,hostel,student where roomdata.date_of_booking > '$dates1' and roomdata.date_of_booking < '$dates2' and roomdata.hostel_id=hostel.hostel_id and roomdata.student_id=student.student_id and hostel.hostelowner_id = $owner";
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
                            <a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>" style="width:90%;">Edit</a>
                            <!-- <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td> -->

                    </tr>
                <?php       }
                require("main1.php");
                echo "<br>";
                echo " <h4 style='display:inline;'><u>Record's of The Last Month</u></h4><br><br>";
            } else {
                header("location:wrongdata.php");
            }
        } elseif ($date == "last 10") {
            echo " <table class='table' style='border-top:2px solid;'>
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
             <tbody>";
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
            $sql = "SELECT * FROM roomdata,hostel,student where roomdata.hostel_id=hostel.hostel_id and roomdata.student_id=student.student_id and hostel.hostelowner_id = $owner order by startDate asc limit 10";
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
                            <a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>" style="width:90%;">Edit</a>
                            <!-- <a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td> -->

                    </tr>
                <?php    }
                require("main1.php");
                echo "<br>";
                echo " <h4 style='display:inline;'><u> Last Ten Bookings</u></h4><br><br>";
            } else {
                header("location:wrongdata.php");
            }
        } elseif ($date == "status") {

            echo " <table class='table' style='border-top:2px solid;'>
        <thead>
            <tr>
            <th>Sr.No</th>    
            <th>Room Number</th>
            <th>Room Type</th>
            <th>capacity</th>
            <th>Status</th>
            <th>Total student's</th>
        </tr>
        </thead>
        <tbody>";
            $conn = mysqli_connect("localhost", "root", "", "hms");
            if (!$conn) {
                echo "connection failed" . mysqli_connect_error();
            }
            $room_qry = "select * from roomdata where hostel_id=(select hostel_id from hostel where hostelowner_id=$owner)";
            $result = mysqli_query($conn, $room_qry);
            if (mysqli_num_rows($result) > 0) {
                $sr1 = $sr2 = $sr3 = $sr4 = $sr5 = $sr6 = $sr7 = $sr8 = $sr9 = $sr10 = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['room_number'] == 101) {
                        $sr1++;
                    }
                    if ($row['room_number'] == 102) {
                        $sr2++;
                    }
                    if ($row['room_number'] == 103) {
                        $sr3++;
                    }
                    if ($row['room_number'] == 104) {
                        $sr4++;
                    }
                    if ($row['room_number'] == 105) {
                        $sr5++;
                    }
                    if ($row['room_number'] == 106) {
                        $sr6++;
                    }
                    if ($row['room_number'] == 107) {
                        $sr7++;
                    }
                    if ($row['room_number'] == 108) {
                        $sr8++;
                    }
                    if ($row['room_number'] == 109) {
                        $sr9++;
                    }
                    if ($row['room_number'] == 110) {
                        $sr10++;
                    }
                }
                require("main1.php");
                if ($sr1 > 4) {
                    $status1 = "Not Available";
                    $students1 = "$sr1";
                } else {
                    $status1 = "Available";
                    $students1 = "$sr1";
                }
                if ($sr2 > 4) {
                    $status2 = "Not Available";
                    $students2 = "$sr2";
                } else {
                    $status2 = "Available";
                    $students2 = "$sr2";
                }
                if ($sr3 > 4) {
                    $status3 = "Not Available";
                    $students3 = "$sr3";
                } else {
                    $status3 = "Available";
                    $students3 = "$sr3";
                }
                if ($sr4 > 4) {
                    $status4 = "Not Available";
                    $students4 = "$sr4";
                } else {
                    $status4 = "Available";
                    $students4 = "$sr4";
                }
                if ($sr5 > 4) {
                    $status5 = "Not Available";
                    $students5 = "$sr5";
                } else {
                    $status5 = "Available";
                    $students5 = "$sr5";
                }
                if ($sr6 > 4) {
                    $status6 = "Not Available";
                    $students6 = "$sr6";
                } else {
                    $status6 = "Available";
                    $students6 = "$sr6";
                }
                if ($sr7 > 4) {
                    $status7 = "Not Available";
                    $students7 = "$sr7";
                } else {
                    $status7 = "Available";
                    $students7 = "$sr7";
                }
                if ($sr8 > 4) {
                    $status8 = "Not Available";
                    $students8 = "$sr8";
                } else {
                    $status8 = "Available";
                    $students8 = "$sr8";
                }
                if ($sr9 > 4) {
                    $status9 = "Not Available";
                    $students9 = "$sr9";
                } else {
                    $status9 = "Available";
                    $students9 = "$sr9";
                }
                if ($sr10 > 1) {
                    $status10 = "Not Available";
                    $students10 = "$sr10";
                } else {
                    $status10 = "Available";
                    $students10 = "$sr10";
                }
                echo "  <tr><td>1</td><td>101</td><td>Ac</td><td>4</td><td>$status1</td><td>$students1</td></tr>
            <tr><td>2</td><td>102</td><td>NonAc</td><td>4</td><td>$status2</td><td>$students2</td></tr>
            <tr><td>3</td><td>103</td><td>Ac</td><td>4</td><td>$status3</td><td>$students3</td></tr>
            <tr><td>4</td><td>104</td><td>NonAc</td><td>4</td><td>$status4</td><td>$students4</td></tr>
            <tr><td>5</td><td>105</td><td>Ac</td><td>4</td><td>$status5</td><td>$students5</td></tr>
            <tr><td>6</td><td>106</td><td>NonAc</td><td>4</td><td>$status6</td><td>$students6</td></tr>
            <tr><td>7</td><td>107</td><td>Ac</td><td>4</td><td>$status7</td><td>$students7</td></tr>
            <tr><td>8</td><td>108</td><td>NonAc</td><td>4</td><td>$status8</td><td>$students8</td></tr>
            <tr><td>9</td><td>109</td><td>Ac</td><td>4</td><td>$status9</td><td>$students9</td></tr>
            <tr><td>10</td><td>110</td><td>NonAc</td><td>4</td><td>$status10</td><td>$students10</td></tr>";
                echo "<br>";
                echo " <h4 style='display:inline;'><u>Room's Status</u></h4><br><br>";
            }
        } else {

            $Today_date = Date('y-m-d');
            $conn = mysqli_connect("localhost", "root", "", "hms");
            $qry = "SELECT * FROM roomdata,hostel,student where roomdata.hostel_id=hostel.hostel_id and roomdata.student_id=student.student_id and hostel.hostelowner_id = $owner and roomdata.startDate <= '$Today_date' order by startDate asc";
            $ye = Date('y', strTotime($Today_date));
            $mo = Date('m', strTotime($Today_date));
            $da = Date('d', strTotime($Today_date));
            $ye = "20$ye";
            $today_date = "$ye-$mo-$da";
            $result = mysqli_query($conn, $qry);
            $sr = 0;
            if (mysqli_num_rows($result) > 0) {
                echo "<table class='table' style='border-top:2px solid;text-align:center;'>
                <thead><tr><th>Sr.No</th>    
                <th>Room Number</th>
                <th>Room Type</th>
                <th>Student Name</th>
                <th>Duration</th>
                <th>Start Date</th><th>Today Date</th><th>End Date</th><th>Remaining Days</th><th>Manage</th></tr></thead><tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    $sr++;
                ?>
                    <tr>
                        <td><?php echo $sr ?></td>
                        <td><?php echo $row['room_number']; ?></td>
                        <td><?php echo $row['room_type']; ?></td>
                        <td><?php echo $row['student_name'] ?></td>
                        <td><?php echo $row['duration']; ?></td>
                        <?php
                        $date = $row['startDate'];
                        $dura = $row['duration'];

                        if ($dura == "3months") {
                            $dateObj = DateTime::createFromFormat('Y-m-d', $date);
                            if ($dateObj === false) {
                                echo "<td>Invalid date format</td>";
                                return;
                            }

                            $start_date = $dateObj->format('Y-m-d');
                            $dateObjEnd = clone $dateObj;

                            $dateObjEnd->modify('+3 months');
                            $end_date = $dateObjEnd->format('Y-m-d');

                            $today_date = (new DateTime())->format('Y-m-d');

                            if ($today_date > $start_date) {
                                $d = new DateTime($today_date);
                                $d1 = new DateTime($end_date);
                                $interval = $d->diff($d1);

                                echo "<td>$start_date</td>";
                                echo "<td>$today_date</td>";
                                echo "<td>$end_date</td>";

                                if ($interval->m == 0 && $interval->y == 0 && ($interval->d == 15 || $interval->d < 15)) {
                                    if ($interval->d == 15) {
                                        echo "<td>15 Day</td>";
                                    } else if ($interval->d < 15) {
                                        $new = Date('d', strtotime($today_date));
                                        $day = Date('d', strtotime($start_date));
                                        if ($day < $new) {
                                            echo "<td>Expired</td>";
                                        } elseif ($day == $new) {
                                            echo "<td>Last Day</td>";
                                        } elseif ($day > $new) {
                                            $n = $day - $new;
                                            echo "<td>$n day's</td>";
                                        }
                                    }
                                } elseif ($today_date > $end_date) {
                                    echo "<td>Expired</td>";
                                } else {
                                    if ($interval->y == 0) {
                                        if ($interval->m == 0) {
                                            echo "<td>$interval->d days</td>";
                                        } else {
                                            echo "<td>$interval->m months, $interval->d days</td>";
                                        }
                                    } else {
                                        echo "<td>$interval->y years, $interval->m months, $interval->d days</td>";
                                    }
                                }
                            } else {
                                echo "<td>$start_date</td>";
                                echo "<td>$today_date</td>";
                                echo "<td>$end_date</td>";
                                echo "<td>Student is not arrived in the Hostel</td>";
                            }
                        }
                        if ($dura == "6months") {

                            $month = Date('m', strtotime($date));
                            // echo "$month<br>";
                            $day = Date('d', strtotime($date));
                            // echo "$day<br>";
                            $year = Date('y', strTotime($date));
                            // echo "$year<br>";
                            $year = "20$year";
                            $start_date = "$year-$month-$day";
                            if ($month == 12 || $month == 10 || $month == 11 || $month == 7 || $month == 8 || $month == 9) {
                                $year = $year + 01;
                                if ($month == 10) {
                                    $m = "04";
                                } elseif ($month == 11) {
                                    $m = "05";
                                } elseif ($month == 7) {
                                    $m = "01";
                                } elseif ($month == 8) {
                                    $m = "02";
                                } elseif ($month == 9) {
                                    $m = "03";
                                } else {
                                    $m = "06";
                                }
                            } else {
                                $m = $month + 06;
                            }
                            $End_date = "$year-$m-$day";
                            if ($today_date > $start_date) {
                                $d = new DateTime($today_date);
                                $d1 = new DateTime($End_date);
                                $interval = $d->diff($d1);
                                echo "<td>$start_date</td>";
                                echo "<td>$today_date</td>";
                                echo "<td>$End_date</td>";
                                if ($interval->m == 0 && $interval->y == 0 && ($interval->d == 15 || $interval->d < 15)) {
                                    if ($interval->d == 15) {
                                        echo "<td>15 Day</td>";
                                    }
                                    if ($interval->d < 15) {
                                        $new = Date('d', strtotime($today_date));
                                        if ($day < $new) {
                                            echo "<td>Expired</td>";
                                        } elseif ($day == $new) {
                                            echo "<td>Last Day</td>";
                                        } elseif ($day > $new) {
                                            $n = $day - $new;
                                            echo "<td>$n day's</td>";
                                        }
                                    }
                                } elseif ($today_date > $End_date) {
                                    echo "<td>Expired</td>";
                                } else {
                                    $y_d = $interval->y;
                                    if ($y_d == "0") {
                                        if ($interval->m == 0) {
                                            echo "<td>$interval->d days</td>";
                                        } else {
                                            echo "<td>$interval->m  months, $interval->d days </td>";
                                        }
                                    } else {
                                        echo "<td>$y_d years, $interval->m  months, $interval->d days </td>";
                                    }
                                }
                            } else {

                                echo "<td>$start_date</td>";
                                echo "<td>$today_date</td>";
                                echo "<td>$End_date</td>";
                                echo "<td>Student is not arrived in the Hostel</td>";
                            }
                        }
                        if ($dura == "12months") {

                            $month = Date('m', strtotime($date));
                            // echo "$month<br>";
                            $day = Date('d', strtotime($date));
                            // echo "$day<br>";
                            $year = Date('y', strTotime($date));
                            // echo "$year<br>";
                            $year = "20$year";
                            $start_date = "$year-$month-$day";
                            $y = $year + 01;
                            $End_date = "$y-$month-$day";
                            if ($today_date > $start_date) {
                                $d = new DateTime($start_date);
                                $d1 = new DateTime($End_date);
                                $interval = $d->diff($d1);
                                echo "<td>$start_date</td>";
                                echo "<td>$today_date</td>";
                                echo "<td>$End_date</td>";
                                if ($interval->m == 0 && $interval->y == 0 && ($interval->d == 15 || $interval->d < 15)) {
                                    if ($interval->d == 15) {
                                        echo "<td>15 Day</td>";
                                    }
                                    if ($interval->d < 15) {
                                        $new = Date('d', strtotime($today_date));
                                        if ($day < $new) {
                                            echo "<td>Expired</td>";
                                        } elseif ($day == $new) {
                                            echo "<td>Last Day</td>";
                                        } elseif ($day > $new) {
                                            $n = $day - $new;
                                            echo "<td>$n day's</td>";
                                        }
                                    }
                                } else if ($today_date > $End_date) {
                                    echo "<td>Expired</td>";
                                } else {
                                    $d3 = new DateTime($today_date);
                                    $d4 = new DateTime($End_date);
                                    $intervals = $d3->diff($d4);
                                    $y_d = $intervals->y;
                                    if ($y_d == "0") {
                                        echo "<td>$intervals->m  months, $intervals->d days </td>";
                                    } else {
                                        echo "<td>$y_d years, $intervals->m  months, $intervals->d days </td>";
                                    }
                                }
                            } else {

                                echo "<td>$start_date</td>";
                                echo "<td>$today_date</td>";
                                echo "<td>$End_date</td>";
                                echo "<td>Student is not arrived in the Hostel</td>";
                            }
                        }
                        ?> <td>
                            <a class='btn btn-info' href='update.php?id=<?php echo $row['id']; ?>' style='width:90%;'>Edit</a>
                    </tr>

        <?php     }
                require("main1.php");
                echo "<br>";
                echo "<h4 style='display:inline;'><u>Room Expiry Detail's</u></h4>";
            } else {
                header("location:validate_duranotstart.php");
            }
            echo "<span style='width:15%;font-size:12px;'>
           <form  action='date_admin_selecteddate.php' method='post' style='display:inline;'>
               <label for='dte' style='margin-left:50%;'><h6>Select Choice's:</h6></label>
           <select  name='dates' id='dte' style='border-radius:3px;border:2px solid;font-size:12px;width:120px;' required>
               <option value=''></option>
               <option value='3months'required>3months</option>
               <option value='6months'required>6months</option>
               <option value='12months' required>12months</option>
           </select>
           <input type = 'submit' value='view' style='border-radius:3px;border:1px solid;color:black;'>
           </form></span><br>
               </tbody>";
            echo "<br>";
        }
        ?>

        </table>
    </div>
    <script src="script.js"></script>
</body>

</html>