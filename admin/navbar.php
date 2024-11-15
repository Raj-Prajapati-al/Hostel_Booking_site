<!Doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hostel management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<style>
    .container {
      position: relative;
      text-align: center;
      color: black;
    }

    .centered {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
</style>
</head>
<body>

    <?php
        session_start();
        $admin_id=$_SESSION['superid'];
        if($admin_id)
        {
          //Just no Objection
        }
        else
        {
          header("location:index.php");
        }
    ?>

  <div class="row m-0">
  <nav class=" navbar navbar-expand-lg bg-secondary m-0">
    <div class="container-fluid">
    
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active ms-5 text-white" aria-current="page" href="addHostelForm.php"><p style="font-size:16px;">Add New Hostel </p></a>
          </li>
          <li class="nav-item">
          <a class="nav-link ms-5 text-white" href="adminDisplay.php"><p style="font-size:16px;">Owner Details</p></a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link ms-5 text-white" href="image_upload.php">Upload hostel image</a>
          </li> -->
          <li class="nav-item">
            <a class="nav-link ms-5 text-white" href="feedbackDisplay.php"><p style="font-size:16px;">Feedback</p></a>
          </li>
          <li class="nav-item">
            <a class="nav-link ms-5 text-white" href="hostelDisplay.php"><p style="font-size:16px;">Hostel Details</p></a>
          </li>
          <li class="nav-item dropdown ms-5 ">
          <a class="nav-link text-white" href="sessionLogout.php"><p style="font-size:16px;">Logout</p></a>
            
          
          </li>
        </ul>
    </div>
  </div>
  </nav>
  </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>