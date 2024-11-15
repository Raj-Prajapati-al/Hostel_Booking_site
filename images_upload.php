<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Hostel Booking Site</title>
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
  <a href="session_logout.php" class="nav-item nav-link float-end" style="margin-left:90px;margin-right:2rem;
margin-top:3rem;background-color:rgb(255,99,71);color:white;box-sizing:border-box;border:2px solid black;padding:5px;border-radius:8px;font-size:15px;">Logout</a>

  <!-- <form action="images_upload_insert.php" method="post" enctype="multipart/form-data">
    <select name="description" id="description">
  <option value="view">Hostel image</option>
  <option value="food">Food</option>
  <option value="Parking">parking</option>
 </select>
        <label for="image">Choose Image:</label>
        <input type="file" name="filename" id="image" required>
        <br>
        
        <input type="submit" value="Upload Image">
    </form> -->
  <?php
  session_start();
  $hostelid = $_SESSION['ownerid'];
  if ($hostelid) {
  } else {
    header("location:loginpage.php");
  }
  if (isset($_POST['id'])) {
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

        echo "<h1 style='color:green;text-align:center;'>Image uploaded successfully!</h1>";
      } else {
        echo "<div style='text-align:center;margin-left:25%;border:2px solid;width:40%;height:150px;padding:10px;'><h1>Error uploading image,you have to upload any one of the image</h1>.";
        echo "<a href='images_upload.php' style='border:3px solid black;background-color:rgb(255,99,71);padding:6px;'>Add Images</a></div>";
      }
      mysqli_close($conn);
    }
  }
  ?>


  <!-- <a href="index.php" class="nav-item nav-link float-end" style='font-size:xx-large;color:blue;margin-right:50px;'>logout</a> -->

  <?php require('main1.php'); ?>

  <div class='container '>
    <h1><u>Add New Image's</u></h1><br>
    <div class='row justify-content-center mt-2 md-5'>



      <?php

      $conn = mysqli_connect("localhost", "root", "", "hms");
      if (!$conn) {
        echo "Error....connection failed" . mysqli_connect_error();
      }
      $select = "select * from hostel where hostelowner_id like '" . $hostelid . "'";

      ?>
      <div class='col-md-4'>
        <div class="card">
          <img style='height:200px;' src="https://www.clker.com/cliparts/L/t/3/i/z/1/upload-button-png-hi.png" class="card-img-top" alt="...">
          <div class="card-body mt-5 mb-5 text-center">
            <form method="post" enctype="multipart/form-data">
              <?php

              if ($result = mysqli_query($conn, $select)) {
                if (mysqli_num_rows($result) > 0) {
                  echo "<label for='hst' style='font-size:15px;'> Your Hostel</label>";
                  echo "<select name='id' class='form-select' id='hst' required>";

                  while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['hostel_id'] . "'>" . $row['hostel_name'] . "</option>";
                  }
                  echo "</select>";
                }
              }

              ?>

              <div class="card-body mt-5 mb-5 text-center">
                <form action="images_upload_insert.php" method="post" enctype="multipart/form-data">
                  <label for="image" class='mt-3 mb-3' style='font-size:12px;'>Upload Hostel Image:</label>
                  <input type="file" class='form-control' name="hostel_img" id="image" required>
                  <br>
                  <label for="fd" class='mt-3 mb-3' style='font-size:12px;'>Upload Food Image:</label>
                  <input type="file" class='form-control' name="food" id="fd" required>
                  <br>
                  <label for="prk" class='mt-3 mb-3' style='font-size:12px;'>Upload Parking Image:</label>
                  <input type="file" class='form-control' name="parking" id="prk" required>
                  <br>

                  <input type="submit" value="Upload Image" class='bg-primary p-2 rounded-3 text-white'>
                </form>

              </div>
          </div>
        </div>


      </div>
    </div>





</body>

</html>