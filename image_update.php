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
        header("location:loginpagemain.php");
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    include("main2.php");

    if (isset($_POST['title'])) {
        $title = $_POST['title'];
        $targetDir = "Imges/";
        $targetFile = $targetDir . basename($_FILES["files"]["name"]);
        if (move_uploaded_file($_FILES["files"]["tmp_name"], $targetFile)) {
        }

        if ($title == "hostel_img") {
            $sql = "update image set hostel_img = '$targetFile' where img_id=$id ";
        } elseif ($title == "food") {
            $sql = "update image set food = '$targetFile' where img_id=$id ";
        } else {
            $sql = "update image set parking = '$targetFile' where img_id=$id ";
        }

        if (mysqli_query($conn, $sql)) {
            $update = $conn->affected_rows;
            echo "<div style='border:2px solid black;width:50%;text-align:center;padding:15px;margin-left:25%;'><h1>$update,Record updated Successfully.</h1><br>";
            echo "<a style='background-color:green;color:black;border:2px solid black;padding:5px;' href='images_crud.php'>View Data</a></div>";
        } else {
            echo "<h1>Error Updating Record.</h1>";
        }
    } else {
        $qry = "select * from image where img_id = $id";
        $result = mysqli_query($conn, $qry);
        if (mysqli_num_rows($result) > 0) {
            echo "<h1 style='margin-left:40%;'><u>Update Image's</u></h1>";
            echo "<form method='post' enctype='multipart/form-data'>
            <table class='table' style='width:70%;text-align:center;margin-left:auto;margin-right:auto; margin-top:5rem;border-top:2px solid black;'>
            <tr>
                <th> Select Which type of image you want to Update:</th>
                <td>
                    <select name='title' required style='width:30%;'>
                        <option value=''></option>
                        <option value='hostel_img'>Hostel Image</option>
                        <option value='food'>Food</option>
                        <option value='parking'>Parking</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Enter Image:</th>
                <td>
                  <input type='file' name='files' required style='margin-left:18rem;'>
                </td>
            </tr>
            <tr>
                <td colspan='2'>
                    <input type='submit' value='Update' style='border:2px solid black;color:white;margin-top:1rem;font-size:1.4rem;margin-left:1%;border-radius:3px;background-color:dodgerblue'>
                </td>
            </tr>
            </table>
            </form>";
        }
    }
    ?>
    < <div class="container">
        </div>

</body>

</html>