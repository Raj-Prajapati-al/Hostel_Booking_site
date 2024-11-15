<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Update </title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">


    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&family=Lobster+Two:wght@700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <style>
        .submit {
            background: green;
            padding: 6px;
            border-radius: 5px;
            color: white;
            margin: 5px;
            text-align: center;
        }
    </style>
</head>

<body>


    <?php
    session_start();
    $roomid = $_SESSION['ownerid'];
    if ($roomid) {
    } else {
        header("location:loginpagemain.php");
    }
    $conn = mysqli_connect("localhost", "root", "", "hms");


    if (isset($_POST['update'])) {
        $user_id = $_REQUEST['id'];
        $room_type = $_REQUEST['room_type'];
        $startDate = $_REQUEST['startDate'];
        $duration = $_REQUEST['dura'];
        $room_number = $_REQUEST['room_number'];
        //Start of Enddate code
        $month = Date('m', strtotime($startDate));
        $day = Date('d', strtotime($startDate));
        $year = Date('y', strTotime($startDate));
        $year = "20$year";
        if ($duration == "3months") {
            if ($month == 10 || $month == 12 || $month == 11) {
                $year = $year + 01;
                if ($month == 10) {
                    $m = "01";
                } elseif ($month == 11) {
                    $m = "02";
                } else {
                    $m = "03";
                }
            } else {
                $m = $month + "03";
            }
            $End_date = "$year-$m-$day";
        } elseif ($duration == "6months") {
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
                $m = $month + "06";
            }
            $End_date = "$year-$m-$day";
        } else {
            $year = $year + 01;
            $End_date = "$year-$month-$day";
        }
        //End of Enddate code.
        $sql = "UPDATE roomdata SET room_number = '$room_number', room_type = '$room_type', startDate = '$startDate',  duration = '$duration',endDate='$End_date'  WHERE id = '$user_id'";

        $result = $conn->query($sql);

        if ($result == TRUE) {

            echo "Record updated successfully.";
            echo "<button style='background-color:green;color:black;'>Go Back</button>";
        } else {

            echo "Error:" . $sql . "<br>" . $conn->error;
        }
    }

    if (isset($_GET['id'])) {

        $user_id = $_GET['id'];

        $sql = "SELECT * FROM roomdata WHERE id='$user_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                $room_number =  $row['room_number'];
                $room_type = $row['room_type'];
                $Hostelname = $row['hostel_id'];
                $startDate = $row['startDate'];

                $month = $row['duration'];
                $id = $row['id'];
            }
        }

    ?>



        <div class="container">
            <div class="bg-light rounded">
                <div class="row g-0">

                    <div class='mt-4'>

                        <!-- <a href="roomdisplay.php" class='submit' >View Data</a> -->
                        <button style='background-color:green;color:black;'>view Data</button>
                    </div>

                    <div class="col-lg-12 wow fadeIn" data-wow-delay="0.1s">
                        <div class="d-flex flex-column justify-content-center p-5">
                            <h1 class="mb-4"> Update Data </h1>
                            <form action="" method="POST">
                                <div class="row g-3">
                                    <input type="hidden" name="user_id" value="<?php echo $id; ?>">

                                    <div class="col-sm-7 mt-2 mb-2">
                                        <div class="form-floating">
                                            <input type="text" style="width:58%;" class="form-control border-0" id="room_number" placeholder="room_number" name="room_number" min="101" max="110" onKeyUp="if(this.value>110){this.value='110';}else if(this.value<0){this.value='0';}"
                                                id="yourid" value=<?php echo $room_number; ?>>
                                            <label for="gname">room_number</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-7 mt-2 mb-2">
                                        <div class="form-floating">
                                            <select name="room_type" class="form-control" style="width:58%;">
                                                <option value="">room type</option>
                                                <option value="ac" <?php if ($room_type == "ac") {
                                                                        echo "Selected";
                                                                    } ?>>ac</option>
                                                <option value="nonac" <?php if ($room_type == "nonac") {
                                                                            echo "Selected";
                                                                        } ?>>nonac</option>
                                            </select>
                                        </div>

                                        <!-- <div class="col-sm-7 mt-2 mb-2">
                                            <div class="form-floating">
                                             <select name="Hostelname"  class="form-control">
                                                <option value="">Select Hostel</option>
                                                <option value="Samaras Boy's Hostel Ahmedabad"  <?php if ($Hostelname == "Samaras Boy's Hostel Ahmedabad") {
                                                                                                    echo "Selected";
                                                                                                } ?>    >Samaras Boy's Hostel Ahmedabad</option>
                                                <option value="Shri Ganesh boys hostel" <?php if ($Hostelname == "Shri Ganesh boys hostel") {
                                                                                            echo "Selected";
                                                                                        } ?>   >Shri Ganesh boys hostel</option>
                                                <option value="Vishal pg | Boys PG in Ahmedabad" <?php if ($Hostelname == "Vishal pg | Boys PG in Ahmedabad") {
                                                                                                        echo "Selected";
                                                                                                    } ?>   >Vishal pg | Boys PG in Ahmedabad</option>
                                                <option value="Arya Dormitory Hotel" <?php if ($Hostelname == "Arya Dormitory Hotel") {
                                                                                            echo "Selected";
                                                                                        } ?>   >Arya Dormitory Hotel</option>
                                                <option value="Shivam hostel, Boys Hostel"  <?php if ($Hostelname == "Shivam hostel, Boys Hostel") {
                                                                                                echo "Selected";
                                                                                            } ?>    >Shivam hostel, Boys Hostel</option>
                                                </select>

                                             </div>
                                     </div> -->


                                        <!-- 
                                         <div class="col-sm-7 mt-2 mb-2">
                                             <div class="form-floating">
                                             <select  name="month" class="form-control">
                                                 <option value="">Select Month</option>
                                                <option value="3Months"  <?php if ($month == "3months") {
                                                                                echo "Selected";
                                                                            } ?>  >3 Months (Rs:3000)</option>
                                                <option value="6Months"   <?php if ($month == "6months") {
                                                                                echo "Selected";
                                                                            } ?>   >6 Months (Rs:6000)</option>
                                                <option value="12Months"  <?php if ($month == "12months") {
                                                                                echo "Selected";
                                                                            } ?>  >12 Months (Rs:12000)</option>
                                               
                                            </select>
                                             </div>
                                         </div> -->

                                        <div class="col-sm-7 mt-2 mb-2">
                                            <div class="form-floating">
                                                <input type="date" name="startDate" value="<?php echo $startDate; ?>" class="form-control">
                                                <label for="cage">start_date</label>
                                            </div>
                                        </div>

                                        <div class="col-sm-7 mt-2 mb-2">
                                            <div class="form-floating">
                                                <select name="dura" class="form-control">
                                                    <option value="">Select Month</option>
                                                    <option value="3months" <?php if ($month == "3months") {
                                                                                echo "Selected";
                                                                            } ?>>3 Months</option>
                                                    <option value="6months" <?php if ($month == "6months") {
                                                                                echo "Selected";
                                                                            } ?>>6 Months</option>
                                                    <option value="12months" <?php if ($month == "12months") {
                                                                                    echo "Selected";
                                                                                } ?>>12 Months</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <input type="submit" value="Update" class='submit' name="update">
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                        <div class="position-relative h-100">
                            <img class="position-absolute w-100 h-100 rounded" src="img/appointment.jpg" style="object-fit:cover;">
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script src="script.js"></script>
</body>

</html>

<?php

    }



?>