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
        // echo "<a href='images_upload.php' style='border:3px solid black;background-color:rgb(255,99,71);padding:6px;'>Add Images</a></div>";
      }
      mysqli_close($conn);
    }
  }
  ?>


  <!-- <a href="index.php" class="nav-item nav-link float-end" style='font-size:xx-large;color:blue;margin-right:50px;'>logout</a> -->

  <?php require('main1.php'); ?>

  <div class='container '>
    <h1><u>Hostel Details</u></h1><br>
    <div class='row justify-content-center mt-2 md-5'>



      <?php

      $conn = mysqli_connect("localhost", "root", "", "hms");
      if (!$conn) {
        echo "Error....connection failed" . mysqli_connect_error();
      }
      $select = "select * from hostel where hostelowner_id like '" . $hostelid . "'";

      ?>

      <?php

      if ($result = mysqli_query($conn, $select)) {
        if (mysqli_num_rows($result) > 0) {


          while ($row = mysqli_fetch_assoc($result)) {
            $hostel_id = $row['hostel_id'];
            $hname = $row['hostel_name'];
            $hdescription = $row['hostel_description'];
            $htype = $row['hostel_type'];
            $hfees = $row['hostel_fees'];
            $haddress = $row['hostel_address'];
            $hcity = $row['city'];
            $img = $row['hostel_photo_path'];
          }
        }
      }

      ?>

      <table class="table" style="border-top:2px solid black;margin-top:7%;">
        <tr>
          <th>Sr.No</th>
          </th>
          <th>Hostel Name</th>
          <th>Description</th>
          <th>Hostel Type</th>
          <th>Hostel fees</th>
          <th>Address</th>
          <th>City</th>
          <th>Hostel Cover Image</th>
          <th>Operations</th>
          <th>Images</th>
        </tr>
        <tr>
          <td>1</td>
          <td><?php echo  $hname; ?></td>
          <td><?php echo $hdescription; ?></td>
          <td><?php echo $htype; ?></td>
          <td><?php echo $hfees; ?></td>
          <td><?php echo $haddress; ?></td>
          <td><?php echo $hcity; ?></td>
          <?php
          // $trim= ltrim($img,'C:/xampp/htdocs/Hostel-02-03-2024/management/');  
          echo " <td><img src='" . $img . "' alt='' height='140px' width='300px' style='border:1px solid;' ></td>";
          ?>
          <td>
            <a class="btn btn-info" href="Hostel_update.php" style="border:2px solid black;color:white;margin-top:4rem;font-size:1.5rem;">Update</a>
          </td>
          <td>
            <a class='btn btn-info' href='images_crud.php' style='border:2px solid black;color:white;margin-top:1rem; font-size:1.4rem;'>view Img</a>
            <a class='btn btn-info' href='images_upload.php' style='border:2px solid black;color:white;margin-top:1rem;font-size:1.4rem;'>Add Img</a>
          </td>
        </tr>
      </table>
    </div>


  </div>
  </div>





</body>

</html>