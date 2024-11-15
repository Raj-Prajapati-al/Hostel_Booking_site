<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

        @media screen and (max-width:1000px) {
            img {
                width: 12vw;
            }
        }
    </style>
</head>

<body>
    <a href="session_logout.php" class="nav-item nav-link float-end" style="margin-left:90px;margin-right:2rem;
margin-top:2rem;background-color:rgb(255,99,71);color:white;box-sizing:border-box;border:2px solid black;padding:5px;border-radius:8px;font-size:15px;">Logout</a>

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
    require("main1.php");

    $qry = "select * from image where hostel_id=(select hostel_id from hostel where hostelowner_id = $ownerid)";
    $result = mysqli_query($conn, $qry);
    $sr = 0;
    if (isset($_GET['id'])) {
        $dle_id = $_GET['id'];
        $qry1 = "select * from image where img_id=$dle_id";
        if ($result1 = mysqli_query($conn, $qry1)) {
            while ($row = mysqli_fetch_assoc($result1)) {
                if ($row['hostel_img'] == "" && $row['food'] == "" && $row['parking'] == "") {
                    $sql = "Delete from image where img_id=$dle_id";
                    if (mysqli_query($conn, $sql)) {
                        $del = $conn->affected_rows;
                    }
                }
            }
        }
    }
    if (mysqli_num_rows($result) > 0) {
        echo "<h1 style='margin-left:3rem;'><u>Hostel images<u></h1>";
        echo "<table border='1' style='margin-left:auto;border-top:2px solid black;margin-right:auto;width:80%;margin-top:3rem;' class='table'><th>Sr.No</th><th>Hostel Images</th><th>Food Images</th><th>parking Images</th><th>Update</th><th>Delete</th>";
        while ($row = mysqli_fetch_assoc($result)) {
            $sr++;
            $hostel_img = $row['hostel_img'];
            $food = $row['food'];
            $parking = $row['parking'];
            // $trim= ltrim($hostel_img,'C:/xampp/htdocs/Hostel-02-03-2024/management/');  
            // $trim2= ltrim($food,'C:/xampp/htdocs/Hostel-02-03-2024/management/');  
            // $trim3= ltrim($parking,'C:/xampp/htdocs/Hostel-02-03-2024/management/');  
            echo "<tr><td>$sr</td>
                        <td><img src='" . $hostel_img . "' alt='hostel' height='100px' width='300px' id='i1' onclick='click();'></td>
                        <td><img src='" . $food . "' alt='food' height='100px' width='300px' id='i1' onclick='click();'></td>
                        <td><img src='" . $parking . "' alt='parking' height='100px' width='300px' id='i1' onclick='click();'></td>
                        <td><a href='image_update.php?id=" . $row['img_id'] . "' style='border:2px solid black;color:white;margin-top:5%;font-size:1.8rem;background-color:dodgerblue;border-radius:3px;padding:3px;'>Update</a></td>
                        <td><a href='image_delete.php?id=" . $row['img_id'] . "' style='border:2px solid black;color:white;margin-top:5%;font-size:1.8rem;background-color:red;border-radius:3px;padding:3px;'>Delete</a></td>
                </tr>";
        }
        echo "</table>";
    }
    ?>
    <script>
        function click() {
            var img = document.getElementById('i1').value;
            if (img = "") {

            } else {
                alert("hello");
            }
        }
    </script>
</body>

</html>