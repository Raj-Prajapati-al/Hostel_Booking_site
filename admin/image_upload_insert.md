<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "hms");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $description = $_POST['description'];

    // Upload image
    $targetDir = "img/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        // Insert data into database
        $insertQuery = "INSERT INTO hostel_img (filename, description) VALUES ('$targetFile', '$description')";
        $conn->query($insertQuery);
    echo "Image uploaded successfully!";
    } else {
        echo "Error uploading image.";
    }

}
?>
