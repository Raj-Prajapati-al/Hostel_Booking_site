<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        button:hover {
            cursor: pointer;
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


    if (isset($_GET['feedback_id'])) {

        $user_id = $_GET['feedback_id'];

        $sql = "DELETE FROM  feedback WHERE feedback_id  ='$user_id'";

        $result = $conn->query($sql);

        if ($result == TRUE) {

            echo "Record deleted successfully.";
            echo "<button style='background-color:green;color:black;'>view Data</button>";
        } else {

            echo "Error:" . $sql . "<br>" . $conn->error;
        }
    }

    ?>


    <script src="script.js"></script>
</body>

</html>