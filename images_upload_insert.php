<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "hms");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];

    // Upload image
    $targetDir = "Imges/";
    $targetFile = $targetDir . basename($_FILES["hostel_img"]["name"]);
    $tgt = $targetDir . basename($_FILES["food"]["name"]);
    $tgh = $targetDir . basename($_FILES["parking"]["name"]);


    if (move_uploaded_file($_FILES["hostel_img"]["tmp_name"], $targetFile) && move_uploaded_file($_FILES["food"]["tmp_name"], $tgt) && move_uploaded_file($_FILES["parking"]["tmp_name"], $tgh)) {
        // Insert data into database
        $insertQuery = "INSERT INTO image(hostel_id,hostel_img,food,parking) VALUES ('$id','$targetFile', '$tgt','$tgh')";

        $conn->query($insertQuery);

        echo "<h1 style='color:green;'>Image uploaded successfully!</h1>";
        include("main1.php");
    } else {
        echo "<div style='text-align:center;margin-left:25%;border:2px solid;width:40%;height:150px;padding:10px;'><h1>Error uploading image,you have to upload any one of the image</h1>.";
        // echo "<a href='images_upload.php' style='border:3px solid black;background-color:rgb(255,99,71);padding:6px;'>Add Images</a></div>";
    }
}
