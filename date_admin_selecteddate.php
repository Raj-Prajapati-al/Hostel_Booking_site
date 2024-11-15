<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
</head>

<body>
    <a href="session_logout.php" class="nav-item nav-link float-end" style="margin-left:90px;margin-right:2rem;background-color:rgb(255,99,71);color:white;box-sizing:border-box;border:2px solid black;padding:5px;border-radius:8px;font-size:15px;">Logout</a>
    <?php
    session_start();
    $owner = $_SESSION['ownerid'];
    if ($owner) {
    } else {
        header("location:loginpagemain.php");
    }

    ?>
    <div class="container mt-3">

        <?php
        $mvalue = $_POST['dates'];
        if ($mvalue == '3months') {
            $conn = mysqli_connect("localhost", "root", "", "hms");
            $today_date = Date('Y-m-d');
            $qry = "SELECT * FROM roomdata,hostel,student where roomdata.hostel_id=hostel.hostel_id and roomdata.student_id=student.student_id and hostel.hostelowner_id = $owner and roomdata.startDate < '$today_date' order by startDate asc";
            $result = mysqli_query($conn, $qry);
            $today_date = Date('Y-m-d');
            $sr = 0;
            if (mysqli_num_rows($result) > 0) {
                echo "<table class='table' style='border-top:2px solid;'>
                <thead><tr><th>Sr.No</th>    
                <th>Room Number</th>
                <th>Room Type</th>
                <th>Student Name</th>
                <th>Duration</th>
                <th>Start Date</th><th>Today Date</th><th>End Date</th><th>Remaining Days</th>                <th>Manage </th></tr></thead><tbody>";

                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['duration'] == "3months") {
                        $date = $row['startDate'];
                        $today_date = Date('Y-m-d');

                        // Create DateTime object for start date
                        $startDate = DateTime::createFromFormat('Y-m-d', $date);
                        if ($startDate === false) {
                            echo "<td>Invalid start date format</td>";
                            continue;
                        }

                        // Calculate end date by adding 3 months
                        $endDate = clone $startDate;
                        $endDate->modify('+3 months');

                        // Format dates
                        $start_date = $startDate->format('Y-m-d');
                        $end_date = $endDate->format('Y-m-d');

                        if ($today_date > $start_date) {
                            $todayDateObj = new DateTime($today_date);
                            $interval = $todayDateObj->diff($endDate);

                            echo "<tr>
                                    <td>" . ++$sr . "</td>
                                    <td>{$row['room_number']}</td>
                                    <td>{$row['room_type']}</td>
                                    <td>{$row['student_name']}</td>
                                    <td>{$row['duration']}</td>
                                    <td>$start_date</td>
                                    <td>$today_date</td>
                                    <td>$end_date</td>";

                            if ($interval->m == 0 && $interval->y == 0 && ($interval->d == 15 || $interval->d < 15)) {
                                if ($interval->d == 15) {
                                    echo "<td>15 Day</td>";
                                } elseif ($interval->d < 15) {
                                    $day = (int)$startDate->format('d');
                                    $new = (int)$todayDateObj->format('d');
                                    if ($day < $new) {
                                        echo "<td>Expired</td>";
                                    } elseif ($day == $new) {
                                        echo "<td>Last Day</td>";
                                    } else {
                                        $n = $day - $new;
                                        echo "<td>$n days</td>";
                                    }
                                }
                            } elseif ($today_date > $end_date) {
                                echo "<td>Expired</td>";
                            } else {
                                if ($interval->m == 0) {
                                    echo "<td>{$interval->d} days</td>";
                                } else {
                                    echo "<td>{$interval->m} months, {$interval->d} days</td>";
                                }
                            }

                            echo "<td><a class='btn btn-info' href='update.php?id={$row['id']}' style='width:90%;'>Edit</a></td></tr>";
                        }
                    }
                }
                require("main1.php");
                echo "<br><h4 style='display:inline;'><u>Room 3months Detail's</u></h4>";
            }
        }
        if ($mvalue == "6months") {
            $today_date = Date('Y-m-d');
            $conn = mysqli_connect("localhost", "root", "", "hms");
            $qry = "SELECT * FROM roomdata,hostel,student where roomdata.hostel_id=hostel.hostel_id and roomdata.student_id=student.student_id and hostel.hostelowner_id = $owner and roomdata.startDate < '$today_date' order by startDate asc";
            $result = mysqli_query($conn, $qry);
            $sr = 0;
            if (mysqli_num_rows($result) > 0) {
                echo "<table class='table' style='border-top:2px solid;'>
                <thead><tr><th>Sr.No</th>    
                <th>Room Number</th>
                <th>Room Type</th>
                <th>Student Name</th>
                <th>Duration</th>
                <th>Start Date</th><th>Today Date</th><th>End Date</th><th>Remaining Days</th>                <th>Manage </th></tr></thead><tbody>";

                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['duration'] == "6months") {
                        $date = $row['startDate'];
                        $today_date = Date('Y-m-d');

                        // Create DateTime object for start date
                        $startDate = DateTime::createFromFormat('Y-m-d', $date);
                        if ($startDate === false) {
                            echo "<td>Invalid start date format</td>";
                            continue;
                        }

                        // Calculate end date by adding 6 months
                        $endDate = clone $startDate;
                        $endDate->modify('+6 months');

                        // Format dates
                        $start_date = $startDate->format('Y-m-d');
                        $end_date = $endDate->format('Y-m-d');

                        if ($today_date > $start_date) {
                            $todayDateObj = new DateTime($today_date);
                            $interval = $todayDateObj->diff($endDate);

                            echo "<tr>
                                    <td>" . ++$sr . "</td>
                                    <td>{$row['room_number']}</td>
                                    <td>{$row['room_type']}</td>
                                    <td>{$row['student_name']}</td>
                                    <td>{$row['duration']}</td>
                                    <td>$start_date</td>
                                    <td>$today_date</td>
                                    <td>$end_date</td>";

                            if ($interval->m == 0 && $interval->y == 0 && ($interval->d == 15 || $interval->d < 15)) {
                                if ($interval->d == 15) {
                                    echo "<td>15 Day</td>";
                                } elseif ($interval->d < 15) {
                                    $day = (int)$startDate->format('d');
                                    $new = (int)$todayDateObj->format('d');
                                    if ($day < $new) {
                                        echo "<td>Expired</td>";
                                    } elseif ($day == $new) {
                                        echo "<td>Last Day</td>";
                                    } else {
                                        $n = $day - $new;
                                        echo "<td>$n days</td>";
                                    }
                                }
                            } elseif ($today_date > $end_date) {
                                echo "<td>Expired</td>";
                            } else {
                                if ($interval->m == 0) {
                                    echo "<td>{$interval->d} days</td>";
                                } else {
                                    echo "<td>{$interval->m} months, {$interval->d} days</td>";
                                }
                            }

                            echo "<td><a class='btn btn-info' href='update.php?id={$row['id']}' style='width:90%;'>Edit</a></td></tr>";
                        }
                    }
                }
                require("main1.php");
                echo "<br><h4 style='display:inline;'><u>Room 6months Detail's</u></h4>";
            }
        }
        if ($mvalue == "12months") {
            $today_date = Date('Y-m-d');
            $conn = mysqli_connect("localhost", "root", "", "hms");
            $qry = "SELECT * FROM roomdata,hostel,student where roomdata.hostel_id=hostel.hostel_id and roomdata.student_id=student.student_id and hostel.hostelowner_id = $owner and roomdata.startDate < '$today_date' order by startDate asc";
            $result = mysqli_query($conn, $qry);
            $sr = 0;
            if (mysqli_num_rows($result) > 0) {
                echo "<table class='table' style='border-top:2px solid;'>
                <thead><tr><th>Sr.No</th>    
                <th>Room Number</th>
                <th>Room Type</th>
                <th>Student Name</th>
                <th>Duration</th>
                <th>Start Date</th><th>Today Date</th><th>End Date</th><th>Remaining Days</th>                <th>Manage </th></tr></thead><tbody>";
                while ($row = mysqli_fetch_assoc($result)) {
                    if ($row['duration'] == "12months") {
                        $date = $row['startDate'];
                        $today_date = Date('Y-m-d');

                        // Create DateTime object for start date
                        $startDate = DateTime::createFromFormat('Y-m-d', $date);
                        if ($startDate === false) {
                            echo "<td>Invalid start date format</td>";
                            continue;
                        }

                        // Calculate end date by adding 1 year
                        $endDate = clone $startDate;
                        $endDate->modify('+12 months');

                        // Format dates
                        $start_date = $startDate->format('Y-m-d');
                        $end_date = $endDate->format('Y-m-d');

                        if ($today_date > $start_date) {
                            $todayDateObj = new DateTime($today_date);
                            $interval = $todayDateObj->diff($endDate);

                            echo "<tr>
                                    <td>" . ++$sr . "</td>
                                    <td>{$row['room_number']}</td>
                                    <td>{$row['room_type']}</td>
                                    <td>{$row['student_name']}</td>
                                    <td>{$row['duration']}</td>
                                    <td>$start_date</td>
                                    <td>$today_date</td>
                                    <td>$end_date</td>";

                            if ($interval->m == 0 && $interval->y == 0 && ($interval->d == 15 || $interval->d < 15)) {
                                if ($interval->d == 15) {
                                    echo "<td>15 Day</td>";
                                } elseif ($interval->d < 15) {
                                    $day = (int)$startDate->format('d');
                                    $new = (int)$todayDateObj->format('d');
                                    if ($day < $new) {
                                        echo "<td>Expired</td>";
                                    } elseif ($day == $new) {
                                        echo "<td>Last Day</td>";
                                    } else {
                                        $n = $day - $new;
                                        echo "<td>$n days</td>";
                                    }
                                }
                            } elseif ($today_date > $end_date) {
                                echo "<td>Expired</td>";
                            } else {
                                if ($interval->m == 0) {
                                    echo "<td>{$interval->d} days</td>";
                                } else {
                                    echo "<td>{$interval->m} months, {$interval->d} days</td>";
                                }
                            }

                            echo "<td><a class='btn btn-info' href='update.php?id={$row['id']}' style='width:90%;'>Edit</a></td></tr>";
                        }
                    }
                }

                require("main1.php");
                echo "<br><h4 style='display:inline;'><u>Room 12months Detail's</u></h4>";
            }
        }
        echo "<span style='width:15%;font-size:12px;'>
        <form  action='date_admin_selecteddate.php' method='post' style='display:inline;'>
            <label for='dte' style='margin-left:45%;'><h6>Select Choice's:</h6></label>
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
        ?>
        </tbody>
        </table>
    </div>
    <script src="script.js"></script>
</body>

</html>