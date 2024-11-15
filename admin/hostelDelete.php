<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        button:hover{
            cursor:pointer;
        }    
    </style>
</head>
<body>
<?php 

$conn = mysqli_connect("localhost", "root", "", "hms");


if (isset($_GET['hostel_id'])) {

    $hostel_id = $_GET['hostel_id'];

    $sql = "DELETE FROM `hostel` WHERE `hostel_id`='$hostel_id'";

     $result = $conn->query($sql);

     if ($result == TRUE) {
        
        echo "<div style='border:2px solid black;width:50%;text-align:center;padding:10px;margin-left:23%;'><h1>Record deleted successfully.</h1><br>";
        echo "<button style='background-color:green;color:black;'>View Data</button></div>";

    }else{

        echo "Error:" . $sql . "<br>" . $conn->error;

    }

} 

?>

<script src="script.js"></script>
</body>
</html>
