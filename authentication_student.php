<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hostel Booking Site</title>

  <!-- jQuery -->

  <!-- Cancel Booking -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  <!-- Cancel Booking -->

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&family=Lobster+Two:wght@700&display=swap" rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="css/style.css" rel="stylesheet">

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <style>
    body {
      font-family: sans-serif;
      text-align: center;
    }

    button {
      background-color: cadetblue;
      color: whitesmoke;
      border: 0;
      -webkit-box-shadow: none;
      box-shadow: none;
      font-size: 18px;
      font-weight: 500;
      border-radius: 7px;
      padding: 15px 35px;
      cursor: pointer;
      white-space: nowrap;
      margin: 10px;
    }

    input[type="text"] {
      padding: 12px 20px;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 10px;
      box-sizing: border-box;
    }

    .model-title {
      border-bottom: solid 2px grey;
    }

    #success {
      background: green;
    }

    #error {
      background: red;
    }

    #warning {
      background: coral;
    }
  </style>
</head>

<body>

  <?php
  session_start();

  $id = $_SESSION['uname'];
  if ($id == "user") {
    // True Continue The code Flow
  } else {
    header("location:index.php");
  }

  $conn = mysqli_connect("localhost", "root", "", "hms");

  // Check connection
  if ($conn == false) {
    die("ERROR: Could not connect. "
      . mysqli_connect_error());
  }
  $username = $_POST['user'];
  $password = $_POST['pass'];

  // //to prevent from mysqli injection  
  // $username = stripcslashes($username);  
  // $password = stripcslashes($password);  
  // $username = mysqli_real_escape_string($connn, $username);  
  // $password = mysqli_real_escape_string($conn, $password);  
  // session_start();

  ?>

  <?php

  $sel = "select * from hostel,payment,student where hostel.hostel_id = (select hostel_id from student where username='" . $username . "') and payment.student_id= (select student_id from student where username='" . $username . "')";
  $finalpunch = mysqli_query($conn, $sel);

  if (mysqli_num_rows($finalpunch) > 0) {

  ?>
    <!-- navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0 -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
      <a href="#" class="navbar-brand">
        <img style='width:100%; height:100px; ' src="https://img.freepik.com/free-vector/editable-hotel-logo-vector-business-corporate-identity-hostel_53876-111553.jpg" class='rounded-pill' alt="">
      </a>
      <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav mx-auto">
          <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle mt-2 text-primary " data-bs-toggle="dropdown">Student Infomation</a>
            <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
              <a href="feedback.php" class="dropdown-item"> Feedback</a>
            </div>
          </div>
          <a href="session_logout_student.php" class="nav-item nav-link text-primary mt-2">Student Logout</a>
        </div>
        <button type="button" class="btn btn-primary rounded-pill px-3 d-none d-lg-block " data-bs-toggle="modal" data-bs-target="#staticBackdrop">
          Cancel Booking
        </button>
      </div>
    </nav>
    <?php
    $sql = "select * from registiontable where username = '$username'  and binary password1 ='$password' ";
    $result = mysqli_query($conn, $sql);

    $count = mysqli_num_rows($result);

    if ($count == 1) {
      // echo "<h1 style='font-family:rockwell;'><center> Login successful </center></h1>";
      $sql = "SELECT *  FROM student where username='" . $username . "'";
      $sel = "select * from hostel,payment,student where hostel.hostel_id = (select hostel_id from student where username='" . $username . "') and payment.student_id= (select student_id from student where username='" . $username . "')";
      $result = $conn->query($sql);
      $rslt = $conn->query($sel);

      //     echo "<table class='table table-striped' >
      //  ";

      if ($result->num_rows > 0 && $rslt->num_rows > 0) {
        // output data of each row 
        while ($row = $result->fetch_assoc()) {
          $_SESSION['stuid'] = $row['student_id'];
          $userName        =   $row['username'];
          $userEmail       =   $row['email'];
          $userImg         =   $row['image'];
          $studentName     =   $row['student_name'];
          $userParentNo    =   $row['parents_no'];
          $userGender      =   $row['Gander'];
          $userDob         =   $row['Date_of_brith'];
          $userAddress     =   $row['Address1'];
          $userCity        =   $row['city1'];
          $userPincode     =   $row['pincode'];
          $userCollegeName =   $row['college_name'];
          //     echo "

          //     <tr>   <th> Image </th><td><img  style='width: 150px; height: 150px;border-radius:50%;' src='$row[image]'> </td>   </tr>


          // <tr>   <th> Student Name <td>$row[student_name]</td> </th>  </tr>
          // <tr>    <th>  Parents No <td>$row[parents_no]</td></th> </tr>
          // <tr>     <th>  Gender <td>$row[Gander]</td></th> </tr>
          // <tr>    <th>  Date_of_brith  <td>$row[Date_of_brith]</td></th> </tr>

          // <tr>    <th>  Address <td>$row[Address1]</td></th> </tr>
          // <tr>   <th>  City <td>$row[city1]</td></th> </tr>
          // <tr>    <th> Pincode <td>$row[pincode]</td></th> </tr>
          // <tr><th>College Name</th><td>$row[college_name]</td></tr>

          //     ";
        }

        if ($rw = $rslt->fetch_assoc()) {
          $_SESSION['hostelid'] = $rw['hostelowner_id'];
          // echo "<h1>$rw[hostelowner_id]</h1>";
          $userPaymentAmt =  $rw['payment_amount'];
          $userHostelName = $rw['hostel_name'];
          $userHostelDesc = $rw['hostel_description'];
          $userHostelType = $rw['hostel_type'];
          $userHostelAdd = $rw['hostel_address'];
          $userHostelfees = $rw['hostel_fees'];
          $userHostelCity = $rw['city'];
          // echo "
          // <tr><th>Your Paid Amount<td>$rw[payment_amount]</td></th></tr>
          // <tr><th>Hostel Name<td>$rw[hostel_name]</td></th></tr>
          // ";

        }
      }

    ?>
      <div class="container light-style flex-grow-1 container-p-y">
        <h4 class="m-3 text-primary">
          Your Profile
        </h4>
        <div class="card overflow-hidden">
          <div class="row no-gutters row-bordered row-border-light">
            <div class="col-md-3 pt-0">
              <div class="list-group list-group-flush account-settings-links">
                <a class="list-group-item list-group-item-action active" data-toggle="list"
                  href="#account-general">General</a>
                <a class="list-group-item list-group-item-action" data-toggle="list"
                  href="#account-info">Bio</a>
                <a class="list-group-item list-group-item-action" data-toggle="list"
                  href="#account-hostel">Hostel Details</a>
              </div>
            </div>
            <div class="col-md-9">
              <div class="tab-content">
                <img src=<?php echo $userImg ?> alt
                  class="d-inline ui-w-80 m-2" width="150px" height="150px" style="border:2px solid white;border-radius:50%;">
                <div class="tab-pane fade active show" id="account-general">
                  <div class="card-body media align-items-center">


                    <!-- <label class="">
                                        Upload new photo
                                      </label> &nbsp;
                                      <input type="file" class="account-settings-fileinput btn btn-primary "> 
                                    <button type="button" class="btn btn-default md-btn-flat">Reset</button>
                                <div class="text-light small mt-1">Allowed JPG, GIF or PNG. Max size of 800K</div> -->

                  </div>
                  <hr class="border-light m-0">
                  <div class="card-body">
                    <div class="form-group">
                      <label class="form-label">Username</label>
                      <input type="text" class="form-control mb-1" value=<?php echo $userName ?> disabled>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Name</label>
                      <input type="text" class="form-control" value=<?php echo $studentName ?> disabled>
                    </div>
                    <div class="form-group">
                      <label class="form-label">E-mail</label>
                      <input type="text" class="form-control mb-1" value=<?php echo $userEmail ?> disabled>
                      <!-- <div class="alert alert-warning mt-3">
                                        Your email is not confirmed. Please check your inbox.<br>
                                        <a href="javascript:void(0)">Resend confirmation</a>
                                    </div> -->
                    </div>
                    <div class="form-group">
                      <label class="form-label">Payment</label>
                      <input type="text" class="form-control" value=<?php echo $userPaymentAmt ?>
                        disabled>

                    </div>
                  </div>
                </div>
                <div class="tab-pane fade" id="account-info">
                  <div class="card-body pb-2">
                    <div class="form-group">
                      <label class="form-label">Birthday</label>
                      <input type="text" class="form-control" value=<?php echo $userDob ?> disabled>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Address</label>
                      <textarea class="form-control"
                        rows="5" disabled><?php echo $userAddress ?></textarea>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Birthday</label>
                      <input type="text" class="form-control" value=<?php echo $userDob ?> disabled>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Country</label>
                      <select class="custom-select form-control" disabled>
                        <option>USA</option>
                        <option selected>India</option>
                        <option>UK</option>
                        <option>Germany</option>
                        <option>France</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label class="form-label">City</label>
                      <input type="text" class="form-control" value=<?php echo $userCity ?> disabled>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Pincode</label>
                      <input type="text" class="form-control" value=<?php echo $userPincode ?> disabled>
                    </div>
                  </div>
                  <hr class="border-light m-0">
                  <div class="card-body pb-2">
                    <h6 class="mb-4">Contacts</h6>
                    <div class="form-group">
                      <label class="form-label">Phone</label>
                      <input type="text" class="form-control" value="+(91)<?php echo $userParentNo ?>" disabled>
                    </div>
                    <!-- <div class="form-group">
                                    <label class="form-label"></label>
                                    <input type="text" class="form-control" value>
                                </div> -->
                  </div>
                </div>
                <div class="tab-pane fade" id="account-hostel">
                  <div class="card-body pb-2">
                    <div class="form-group">
                      <label class="form-label">Hostel Name</label>
                      <input type="text" class="form-control" value=<?php echo $userHostelName                 ?> disabled>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Address</label>
                      <textarea class="form-control"
                        rows="5" disabled><?php echo $userHostelAdd ?></textarea>
                    </div>
                    <div class="form-group">
                      <label class="form-label">City</label>
                      <input type="text" class="form-control" value=<?php echo $userHostelCity ?> disabled>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Hostel Type</label>
                      <input type="text" class="form-control" value=<?php echo $userHostelType ?> disabled>
                    </div>
                    <div class="form-group">
                      <label class="form-label">Fees</label>
                      <input type="text" class="form-control" value=<?php echo $userHostelfees ?> disabled>

                    </div>
                    <div class="form-group">
                      <label class="form-label">Description</label>
                      <textarea class="form-control"
                        rows="5" disabled><?php echo $userHostelDesc ?></textarea>
                    </div>
                  </div>
                  <hr class="border-light m-0">
                  <div class="card-body pb-2">
                    <h6 class="mb-4">Contacts</h6>
                    <div class="form-group">
                      <label class="form-label">Phone</label>
                      <input type="text" class="form-control" value="+(91)<?php echo $userParentNo ?>" disabled>
                    </div>
                    <!-- <div class="form-group">
                                    <label class="form-label"></label>
                                    <input type="text" class="form-control" value>
                                </div> -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- <div class="text-right mt-3">
            <button type="button" class="btn btn-primary">Save changes</button>&nbsp;
            <button type="button" class="btn btn-default">Cancel</button>
        </div> -->
      </div>
      <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
      <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
      <script type="text/javascript">

      </script>
  <?php
    } else {

      header("Location:validation.php");
    }

    $conn->close();
  } else {
    $sql = "select * from hostel,student where student.username='$username' and student.hostel_id=hostel.hostel_id";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
      while ($row = mysqli_fetch_assoc($result)) {
        $stu_id = $row['student_id'];
        $stu_name = $row['student_name'];
        $hostel_id = $row['hostel_id'];
        $_SESSION['id'] = $hostel_id;
        $_SESSION['stu_id'] = $stu_id;
        $_SESSION['rno'] = "username";
      }
      // echo "<h1>success,id->$stu_id,name->$stu_name,hid->$hostel_id</h1>";
    } else {
      header("Location:validation.php");
    }

    echo " <div class='box' style='margin-left:5rem;margin-right:5rem;box-sizing:border-box;border:2px solid black;padding:3rem;margin-top:8rem;background-color:lightgrey ;'>
  <h2 style='font-family:Rockwell;font-size:40px;color:red;'> You are a Registered User,So please logout</h2>
  <p style='margin-left:5%;font-size:30px;padding:1rem;font-family:rockwell;'>or Start Booking process By Clicking on Below button</p>
  <table style='margin-left:84%;'><tr><td><a class='' style='border:2px solid;font-size:large;color:black;background-color:grey;padding:5px;border-radius:3px;' href='session_logout_student.php'>Log out</a></td><td>
  <a class='' style='border:2px solid;font-size:large;color:black;background-color:grey;padding:5px;border-radius:3px;' href='room.php'>Book Now</a></td></tr></table></div>";
  }

  ?>
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Cancel Booking</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="CancelBooking.php" class='mt-3 mb-3' method="post">
          <label for="email">Enter your name:</label>
          <input type="text" id="email" name="email" disabled value=<?php echo $username; ?> required><br><br>
          <button type="reset" id="success" data-bs-dismiss="modal" id='cancel-btn'>Cancel Booking</button>
        </form>

      </div>
    </div>
  </div>


  <script>
    // Alert Modal Type
    $(document).on('click', '#success', function(e) {
      swal(
        'Success',
        'your Hostel Booking cancel <b style="color:green;">successfully </b> !',
        'success'
      )
    });
    $(document).on('click', '#error', function(e) {
      swal(
        'Error!',
        'You clicked the <b style="color:red;">error</b> button!',
        'error'
      )
    });

    $(document).on('click', '#warning', function(e) {
      swal(
        'Warning!',
        'You clicked the <b style="color:coral;">warning</b> button!',
        'warning'
      )
    });

    $(document).on('click', '#info', function(e) {
      swal(
        'Info!',
        'You clicked the <b style="color:cornflowerblue;">info</b> button!',
        'info'
      )
    });

    $(document).on('click', '#question', function(e) {
      swal(
        'Question!',
        'You clicked the <b style="color:grey;">question</b> button!',
        'question'
      )
    });

    // Alert With Custom Icon and Background Image
    $(document).on('click', '#icon', function(event) {
      swal({
        title: 'Custom icon!',
        text: 'Alert with a custom image.',
        imageUrl: 'https://image.shutterstock.com/z/stock-vector--exclamation-mark-exclamation-mark-hazard-warning-symbol-flat-design-style-vector-eps-444778462.jpg',
        imageWidth: 200,
        imageHeight: 200,
        imageAlt: 'Custom image',
        animation: false
      })
    });

    $(document).on('click', '#image', function(event) {
      swal({
        title: 'Custom background image, width and padding.',
        width: 700,
        padding: 150,
        background: '#fff url(https://image.shutterstock.com/z/stock-vector--exclamation-mark-exclamation-mark-hazard-warning-symbol-flat-design-style-vector-eps-444778462.jpg)'
      })
    });

    // Alert With Input Type
    $(document).on('click', '#subscribe', function(e) {
      swal({
        title: 'Submit email to subscribe',
        input: 'email',
        inputPlaceholder: 'Example@email.xxx',
        showCancelButton: true,
        confirmButtonText: 'Submit',
        showLoaderOnConfirm: true,
        preConfirm: (email) => {
          return new Promise((resolve) => {
            setTimeout(() => {
              if (email === 'example@email.com') {
                swal.showValidationError(
                  'This email is already taken.'
                )
              }
              resolve()
            }, 2000)
          })
        },
        allowOutsideClick: false
      }).then((result) => {
        if (result.value) {
          swal({
            type: 'success',
            title: 'Thank you for subscribe!',
            html: 'Submitted email: ' + result.value
          })
        }
      })
    });

    // Alert Redirect to Another Link
    $(document).on('click', '#link', function(e) {
      swal({
          title: "Are you sure?",
          text: "You will be redirected to https://utopian.io",
          type: "warning",
          confirmButtonText: "Yes, visit link!",
          showCancelButton: true
        })
        .then((result) => {
          if (result.value) {
            window.location = 'https://utopian.io';
          } else if (result.dismiss === 'cancel') {
            swal(
              'Cancelled',
              'Your stay here :)',
              'error'
            )
          }
        })
    });
  </script>
</body>

</html>