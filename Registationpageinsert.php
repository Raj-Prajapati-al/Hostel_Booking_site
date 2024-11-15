<?php

// servername => localhost
// username => root
// password => empty
// database name => staff
$conn = mysqli_connect("localhost", "root", "", "hms");

// Check connection

if ($conn == false) {
  die("ERROR: Could not connect. "
    . mysqli_connect_error());
}

$allowed_extension = array('jpg', 'png', 'jpeg');
$file = $_FILES['image']['name'];
$file_extension = pathinfo($file, PATHINFO_EXTENSION);
if (!in_array($file_extension, $allowed_extension)) {
  header("location:validation_image.php");
} else {
}
//$s1=$GLOBALS['student_name'];
// Taking all 5 values from the form data(input)
$studentname =  $_REQUEST['student_name'];
//$last_name = $_REQUEST['last_name'];
//$gender =  $_REQUEST['gender'];
$parentsno = $_REQUEST['parents_no'];
$Gander = $_REQUEST['Gander'];
$Dateofbrith = $_REQUEST['Date_of_brith'];
$Address1 = $_REQUEST['Address1'];
$city = $_REQUEST['city'];
$pincode = $_REQUEST['pincode'];
$loc = $_REQUEST['loc'];
$clg_name = $_REQUEST['clg'];
$paydate = date("Y-m-d");
//$coursename=$_REQUEST['course_name'];
$user = $_REQUEST['uname'];
$pass = $_REQUEST['p'];
$email = $_REQUEST['student_email'];
@$course_name = $_REQUEST['course_name'];
$sel = "select email from student ";
$qry = "SELECT * FROM  registiontable";
$makedone = mysqli_query($conn, $sel);
$getdata = mysqli_query($conn, $qry);
if (mysqli_num_rows($makedone) > 0 && mysqli_num_rows($getdata) > 0) {

  while ($row = mysqli_fetch_array($makedone)) {
    if ($email == $row['email']) {
      $email = "invalid";
      break;
    } else {
      $email = $email;
    }
  }
  while ($res = mysqli_fetch_array($getdata)) {
    if ($user == $res['username'] && $pass == $res['password1']) {
      $user = $pass = "invalid";
    } elseif ($user == $res['username']) {
      $user = "invalid";
    } elseif ($pass == $res['password1']) {
      $pass = "invalid";
    } else {
      $user = $user;
      $pass = $pass;
    }
  }
} else {
  echo "<h1>something went wrong..</h1>";
}

if ($user == "invalid" && $email == "invalid" && $pass == "invalid") {
  header("location:Registration_validation/all_validate.php");
} else if ($user == "invalid" && $pass == "invalid") {
  header("location:Registration_validation/user&pass.php");
} else if ($email == "invalid" && $pass == "invalid") {
  header("location:Registration_validation/email&pass.php");
} else if ($user == "invalid" && $pass == "invalid") {
  header("location:Registration_validation/user&pass.php");
} elseif ($email == "invalid") {
  header("location:Registration_validation/Email_validate.php");
} elseif ($user == "invalid") {
  header("location:Registration_validation/user_validation.php");
} elseif ($pass == "invalid") {
  header("location:Registration_validation/password_validation.php");
} else {
  //  $status = $statusMsg = ''; 
  //  if(isset($_POST["submit"])){ 
  //      $status = 'error'; 
  //      if(!empty($_FILES["image"]["name"])) { 
  // Get file info 




  // Performing insert query execution
  // here our table name is college
  $today_Date = date('Y-m-d');
  $d = new DateTime($today_Date);
  $d1 = new DateTime($Dateofbrith);
  $interval = $d->diff($d1);

  if ((!$interval->y == 0 && $interval->y >= 12) && $today_Date > $Dateofbrith) {

    //$description = $_POST['description'];
    // Upload image
    $targetDir = "Imges/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
      // Insert data into database
      // $insertQuery = "INSERT INTO student (image) VALUES ('$targetFile')";
      // $conn->query($insertQuery);


    } else {
      echo "Error uploading image.";
    }



    $sql = "INSERT INTO student(student_name,email,parents_no,Gander,Date_of_brith,Address1,hostel_id,college_name,city1,image,pincode,username,course_name,date_of_register)  VALUES ('$studentname', '$email',
    '$parentsno','$Gander','$Dateofbrith','$Address1','$loc','$clg_name','$city', '$targetFile', '$pincode','$user','$course_name','$paydate')";


    $sql1 = "INSERT INTO registiontable(username,password1,phoneno,date_of_registration)  VALUES ('$user', 
  '$pass','$parentsno','$paydate')";



    if (mysqli_query($conn, $sql)) {


      if (isset($_REQUEST['student_name'])) {
        echo " <div style='margin-top:12%; text-align:center' class='bg-primary text-white p-3  rounded-3'>
  Registration Successfully
</div> ";
        echo " <div class='' role='alert' style='width:100%; margin-top:5%; '> 
    
 <a style='margin-left:45%;' class='bg-primary text-white p-3 rounded-3'' href=room.php?id=$loc> Room Booking</a>
</div> ";
      }
    } else {
      echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($conn);
    }
    if (mysqli_query($conn, $sql1)) {


      // echo"hi";
    } else {
      echo "ERROR: Hush! Sorry $sql1. "
        . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
  } else {
    if ($today_Date < $Dateofbrith) {
      echo " <div class='box' style='margin-left:5rem;margin-right:5rem;box-sizing:border-box;border:2px solid black;padding:3rem;margin-top:5rem;background-color:white;'>
    <h2 style='margin-left:12%;Font-size:37px;font-family:rockwell;color:red;'>Warning!You Should Not select Date Before Today Date.</h2>
    <p style='margin-left:20%;font-size:30px;padding:1rem;font-family:rockwell;'>Re-enter The Date-of-Birth By Clicking on below link</p><br>";
      echo "<button style='margin-left:46%;color:red;border-radius:3px;'>Go Back</button>";
    } else {
      echo " <div class='box' style='margin-left:5rem;margin-right:5rem;box-sizing:border-box;border:2px solid black;padding:3rem;margin-top:8rem;background-color:white;'>
    <h2 style='margin-left:5%;Font-size:37px;font-family:rockwell;color:red;'>Warning!your age should be  greater than  or Equal to 12 year.</h2>
    <p style='margin-left:18%;font-size:30px;padding:1rem;font-family:rockwell;'>Re-enter The Date-of-Birth By Clicking on below link</p><br>";
      echo "<button style='margin-left:46%;color:red;border-radius:3px;'>Go Back</button>";
    }
  }
}

?>
<script src="script.js">
  Go Back
</script>

<body style='background-color:grey;'>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>