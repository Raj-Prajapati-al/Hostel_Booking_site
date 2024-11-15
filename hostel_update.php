<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta content="" name="keywords">
    <meta content="" name="description">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        th,
        td {
            font-family: sans-serif;
            color: black;
            font-size: 15px;
        }

        input,
        textarea {
            border-radius: 5px;
            padding: 6px;
            box-sizing: border-box;
            border: 2px solid #ccc;

        }
    </style>

</head>

<body>
    <a href="session_logout_student.php" class="nav-item nav-link float-end" style="margin-left:62%;margin-right:2rem;background-color:rgb(255,99,71);color:white;box-sizing:border-box;border:2px solid black;padding:5px;border-radius:8px;font-size:15px;margin-top:1rem;">Logout</a>
    <?php
    session_start();
    $ownerid = $_SESSION['ownerid'];
    if ($ownerid) {
        $conn = mysqli_connect("localhost", "root", "", "hms");
        if (!$conn) {
            echo "Connection Error" . mysqli_connect_error();
        }
    } else {
        header("location:loginpage.php");
    }
    include("main2.php");

    $qry = "select * from hostel where hostelowner_id = $ownerid";
    $result = mysqli_query($conn, $qry);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $hid = $row['hostel_id'];
            $name = $row['hostel_name'];
            $descirptoin = $row['hostel_description'];
            $htype = $row['hostel_type'];
            $hfees = $row['hostel_fees'];
            $haddress = $row['hostel_address'];
            $photopath = $row['hostel_photo_path'];
            $city1 = $row['city'];
        }
        if (isset($_POST['hname'])) {
            $hname = mysqli_real_escape_string($conn, $_POST['hname']);
            $desc = $_POST['desc'];
            $type = $_POST['type'];
            $fees = $_POST['fees'];
            $add = $_POST['address'];
            $city = $_POST['city'];

            $sql = "UPDATE hostel SET hostel_name = '$hname', hostel_description = '$desc', hostel_type = '$type',  hostel_fees = '$fees' , hostel_address = '$add',  city = '$city' WHERE hostel_id = $hid";

            if (mysqli_query($conn, $sql)) {
                $update = $conn->affected_rows;
                echo "<div style='border:2px solid black;width:50%;text-align:center;padding:15px;margin-left:25%;'><h1>$update,Record updated Successfully.</h1><br>";
                echo "<a style='background-color:green;color:black;border:2px solid black;padding:5px;' href='Hostel_details.php'>View Data</a></div>";
            } else {
                echo "<h1>Error Updating Record.</h1>";
            }
        } else {
            echo "<h1 style='margin-left:33%;'><u>Hostel Detail's Update Page</u></h1>";
            echo "<form method='post' enctype='multipart/form-data' >";
            echo "   <table style='margin-left:auto;margin-right:auto;margin-top:2rem;border-top:2px solid;width:80%;' class='table'>";
            echo "<tr><th>Hostel Name:</th><td>
                <input type='text' id='' name='hname'  value='" . $name . "' style='width:70%;' required></td></tr>
               <tr> <th>Hostel Description:</th><td>
                <textarea id='pins' name='desc' style='width:70%;'row='3'cols=''14' required >" . $descirptoin . "</textarea></td></tr>
                <tr><th>Hostel Type:</th><td>
                <input type='text' id='pins' name='type' value='" . $htype . "' style='width:70%;' required></td></tr> 
                <tr><th>Hostel Fees:</th><td>
                <input type='text' id='pins' name='fees'  value='" . $hfees . "' style='width:70%;' required></td></tr> 
                <tr><th>Hostel Address:</th><td>
                <input type='text' id='pins' name='address'  value='" . $haddress . "' style='width:70%;' required></td></tr> 
  
                <tr><th>city:</th><td>
                <input type='text' id='pins' name='city'  value='" . $city1 . "' style='width:70%;' required></td>
                </tr>";

            echo "</table><input  type='submit' id='success' value='Update' style='border-radius:10px;margin-left:45%;padding:5px;font-size:13px;color:white;margin-top:10px;background-color:rgb(255,99,71);border:2px solid black;'>
             </form>";
        }
    }
    ?>
    < <div class="container">
        </div>

</body>

</html>