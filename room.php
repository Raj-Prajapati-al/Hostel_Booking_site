<?php
session_start();
$_SESSION['rno'] = "username";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Hostel Booking Site</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">


  <!-- Favicon -->
  <link href="img/favicon.ico" rel="icon">

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@600&family=Lobster+Two:wght@700&display=swap" rel="stylesheet">

  <!-- Icon Font Stylesheet -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

  <!-- Libraries Stylesheet -->
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Template Stylesheet -->
  <link href="css/style.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


  <style>
    .submit {
      background: green;
      padding: 6px;
      border-radius: 5px;
      color: white;
      margin: 5px;
      text-align: center;
    }

    /* https://gist.github.com/toddparker/32fc9647ecc56ef2b38a */

    /* Some basic page styles */

    /* Label styles: style as needed */

    /* Container used for styling the custom select, the buttom class adds the bg gradient, corners, etc. */
    .dropdown {
      position: relative;
      display: block;
      margin-top: 0.5em;
      padding: 0;
    }

    /* This is the native select, we're making everything the text invisible so we can see the button styles in the wrapper */
    .dropdown select {
      width: 100%;
      margin: 0;
      background: none;
      border: 1px solid transparent;
      outline: none;
      /* Prefixed box-sizing rules necessary for older browsers */
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
      /* Remove select styling */
      appearance: none;
      -webkit-appearance: none;
      /* Magic font size number to prevent iOS text zoom */
      font-size: 1.25em;
      /* General select styles: change as needed */
      /* font-weight: bold; */
      color: #444;
      padding: .6em 1.9em .5em .8em;
      line-height: 1.3;
    }

    .dropdown select,
    label {
      font-family: AvenirNextCondensed-DemiBold, Corbel, "Lucida Grande", "Trebuchet Ms", sans-serif;
    }

    /* Custom arrow sits on top of the select - could be an image, SVG, icon font, etc. or the arrow could just baked into the bg image on the select */

    .dropdown::after {
      content: "";
      position: absolute;
      width: 9px;
      height: 8px;
      top: 50%;
      right: 1em;
      margin-top: -4px;
      z-index: 2;
      background: url("data:image/svg+xml;charset=utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 12'%3E%3Cpolygon fill='rgb(102,102,102)' points='8,12 0,0 16,0'/%3E%3C/svg%3E") 0 0 no-repeat;
      /* These hacks make the select behind the arrow clickable in some browsers */
      pointer-events: none;
    }

    /* This hides native dropdown button arrow in IE 10/11+ so it will have the custom appearance, IE 9 and earlier get a native select */
    @media screen and (-ms-high-contrast: active),
    (-ms-high-contrast: none) {
      .dropdown select::-ms-expand {
        display: none;
      }

      /* Removes the odd blue bg color behind the text in IE 10/11 and sets the text to match the focus style text */
      select:focus::-ms-value {
        background: transparent;
        color: #222;
      }
    }

    /* Firefox >= 2 -- Older versions of FF (v2 - 6) won't let us hide the native select arrow, so we'll just hide the custom icon and go with native styling */
    /* Show only the native arrow */
    body:last-child .dropdown::after,
    x:-moz-any-link {
      display: none;
    }

    /* reduce padding */
    body:last-child .dropdown select,
    x:-moz-any-link {
      padding-right: .8em;
    }

    /* Firefox 7+ -- Will let us hide the arrow, but inconsistently (see FF 30 comment below). We've found the simplest way to hide the native styling in FF is to make the select bigger than its container. */
    /* The specific FF selector used below successfully overrides the previous rule that turns off the custom icon; other FF hacky selectors we tried, like `*>.dropdown::after`, did not undo the previous rule */

    /* Set overflow:hidden on the wrapper to clip the native select's arrow, this clips hte outline too so focus styles are less than ideal in FF */
    _::-moz-progress-bar,
    body:last-child .dropdown {
      overflow: hidden;
    }

    /* Show only the custom icon */
    _::-moz-progress-bar,
    body:last-child .dropdown:after {
      display: block;
    }

    _::-moz-progress-bar,
    body:last-child .dropdown select {
      /* increase padding to make room for menu icon */
      padding-right: 1.9em;
      /* `window` appearance with these text-indent and text-overflow values will hide the arrow FF up to v30 */
      -moz-appearance: window;
      text-indent: 0.01px;
      text-overflow: "";
      /* for FF 30+ on Windows 8, we need to make the select a bit longer to hide the native arrow */
      width: 110%;
    }

    /* At first we tried the following rule to hide the native select arrow in Firefox 30+ in Windows 8, but we'd rather simplify the CSS and widen the select for all versions of FF since this is a recurring issue in that browser */
    /* @supports (-moz-appearance:meterbar) and (background-blend-mode:difference,normal) {
.dropdown select { width:110%; }
}   */


    /* Firefox 7+ focus style - This works around the issue that -moz-appearance: window kills the normal select focus. Using semi-opaque because outline doesn't handle rounded corners */
    _::-moz-progress-bar,
    body:last-child .dropdown select:focus {
      outline: 2px solid rgba(180, 222, 250, .7);
    }


    /* Opera - Pre-Blink nix the custom arrow, go with a native select button */
    x:-o-prefocus,
    .dropdown::after {
      display: none;
    }


    /* Hover style */
    .dropdown:hover {
      border: 1px solid #888;
    }

    /* Focus style */
    select:focus {
      outline: none;
      box-shadow: 0 0 1px 3px rgba(180, 222, 250, 1);
      background-color: transparent;
      color: #222;
      border: 1px solid #aaa;
    }


    /* Firefox focus has odd artifacts around the text, this kills that */
    select:-moz-focusring {
      color: transparent;
      text-shadow: 0 0 0 #000;
    }

    option {
      font-weight: normal;
    }


    .output {
      margin: 0 auto;
      padding: 1em;
    }

    .colors {
      padding: 2em;
      color: #fff;
      display: none;
    }

    .red {
      background: #c04;
    }

    .yellow {
      color: #000;
      background: #f5e000;
    }

    .blue {
      background: #079;
    }

    footer {
      margin: 5em auto 3em;
      padding: 2em 2.5%;
      text-align: center;
    }

    a {
      color: #c04;
      text-decoration: none;
    }

    a:hover {
      color: #903;
      text-decoration: underline;
    }
  </style>
  <script>
    function validateitem() {
      var xmlhttp;
      if (window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
      }
      var unm = document.getElementById('month').value;
      var type = document.getElementById('colorselector').value;

      xmlhttp.open('GET', 'val.php?uname=' + unm + '&type=' + type, true);

      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          document.getElementById("info").innerHTML = xmlhttp.responseText;
        } else {
          document.getElementById("info").innerHTML = "response not sent something gone wrong...";
        }
      }
      xmlhttp.send();

    }
  </script>
</head>

<body>


  <div class="container-xxl bg-white p-0">
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
      <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar Start -->

    <!-- Navbar End -->


    <!-- Page Header End -->
    <!-- <div class="container-xxl py-5 page-header position-relative mb-5">
            <div class="container py-5">
                <h1 class="display-2 text-white animated slideInDown mb-4">Admin Login

                </h1>
                <nav aria-label="breadcrumb animated slideInDown">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="loginpage.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="">Room</a></li>
                         <li class="breadcrumb-item"><a href="">student</a></li>
                        <li class="breadcrumb-item text-white active" aria-current="page">Reports</li>
                    </ol>
                </nav>
            </div>
</div>-->


    <!-- 
<form action="roominsert.php" method="POST">

  <fieldset>

    <legend>Personal information:</legend>

    room_number:<br>

    <input type="text" name="room_number">

    <br>   <br>

    room_type:<br>

    <select name="room_type">
      <option value="two">two</option>
      <option value="three">three</option>
    </select>

    <br>   <br>

    Hostelname:<br>
    <select name="Hostelname">
      <option value="">Select Hostel</option>
      <option value="Samaras Boy's Hostel Ahmedabad">Samaras Boy's Hostel Ahmedabad</option>
      <option value="Shri Ganesh boys hostel">Shri Ganesh boys hostel</option>
      <option value="Vishal pg | Boys PG in Ahmedabad">Vishal pg | Boys PG in Ahmedabad</option>
      <option value="Arya Dormitory Hotel">Arya Dormitory Hotel</option>
      <option value="Shivam hostel, Boys Hostel">Shivam hostel, Boys Hostel</option>
    </select>

    <br>   <br>

                                        
                                  <input type="date" name="startDate">
                                     <br><br>
                                     <input type="date" name="endDate">
                                  <br> <br>

                                            <select  name="month">
                                                 <option value="">Select Month</option>
                                                <option value="3Months">3 Months (Rs:3000)</option>
                                                <option value="6Months">6 Months (Rs:6000)</option>
                                                <option value="12Months">12 Months (Rs:12000)</option>
                                                <option value="1Months">1 Months (Rs:2000)</option>
                                            </select>

    <input type="submit" name="submit" value="submit">

  </fieldset>

</form> -->





    <!-- Appointment Start -->
    <!-- <a href="logout_student.php" class="nav-item nav-link float-end">logout</a> -->
    <a href="session_logout_student.php" class="nav-item nav-link float-end" style="margin-left:90px;margin-top:2rem;margin-right:3rem;background-color:rgb(40,50,61);color:white;box-sizing:border-box;border:2px solid black;padding:5px;border-radius:8px;font-size:15px;">Logout</a>
    <!-- 
<div class='container'>
    <div class='row d-flex justify-content-center'>
       <div class='col-md-6'>  

       </div>


       <div class='col-md-6'>  

</div>

    </div>

</div> -->
    <!-- 
<div class="button dropdown"> 
  <select id="colorselector">
     <option value="red">Red</option>
     <option value="yellow">Yellow</option>
     <option value="blue">Blue</option>
  </select>
</div>

<div class="output">
  <div id="red" class="colors red">  “Good artists copy, great artists steal” Pablo Picasso</div>
  <div id="yellow" class="colors yellow"> “Art is the lie that enables us to realize the truth” Pablo Picasso</div>
  <div id="blue" class="colors blue"> “If I don't have red, I use blue” Pablo Picasso</div>
</div> -->


    <!-- <div class="container-xxl py-5"> -->
    <div class="container">
      <!-- <div class="bg-light rounded"> -->
      <div class="row mt-5 d-flex justify-content-center g-0  ">
        <div class="col-lg-8 wow fadeIn shadow-lg" data-wow-delay="0.1s">
          <div class="h-100  p-5">
            <h1 class="mb-4">Room Insert </h1>
            <form action="roominsert.php" method="POST" class='needs-validation' novalidate>

              <div class="row g-3">
                <div class="col-sm-6">

                  <div class="button dropdown">
                    <select id="colorselector" name="type" onchange="validateitem();" required>
                      <option value="">Select Type</option>
                      <option value="ac">A.c</option>
                      <option value="nonac">Non.Ac</option>
                    </select>

                    <div class='invalid-feedback'>
                      please enter hostelname
                    </div>

                  </div>
                  <?php
                  $conn = mysqli_connect("localhost", "root", "", "hms");
                  if (isset($_SESSION['stu_id'])) {
                    $id = $_SESSION['id'];
                  } else {
                    $id = $_GET['id'];
                  }
                  if (!$conn) {
                    echo "connection failed" . mysqli_connect_error();
                  }
                  $room_qry = "select * from roomdata where hostel_id=$id";
                  $result = mysqli_query($conn, $room_qry);
                  if (mysqli_num_rows($result) > 0) {
                    $sr1 = $sr2 = $sr3 = $sr4 = $sr5 = $sr6 = $sr7 = $sr8 = $sr9 = $sr10 = 0;
                    while ($row = mysqli_fetch_assoc($result)) {

                      if ($row['room_number'] == 101) {
                        $sr1++;
                      }
                      if ($row['room_number'] == 102) {
                        $sr2++;
                      }
                      if ($row['room_number'] == 103) {
                        $sr3++;
                      }
                      if ($row['room_number'] == 104) {
                        $sr4++;
                      }
                      if ($row['room_number'] == 105) {
                        $sr5++;
                      }
                      if ($row['room_number'] == 106) {
                        $sr6++;
                      }
                      if ($row['room_number'] == 107) {
                        $sr7++;
                      }
                      if ($row['room_number'] == 108) {
                        $sr8++;
                      }
                      if ($row['room_number'] == 109) {
                        $sr9++;
                      }
                      if ($row['room_number'] == 110) {
                        $sr10++;
                      }
                    }
                  }

                  ?>

                  <div class="output">
                    <div id="ac" class="colors yellow">
                      Select Your Room
                      <select name='rno' class='form-select'>

                        <?php if ($sr1 > 4) {
                        } else {
                          echo '<option value="101">101_ac_room</option>';
                        } ?>
                        <?php if ($sr3 > 4) {
                        } else {
                          echo '<option value="103">103_ac_room</option>';
                        } ?>
                        <?php if ($sr5 > 4) {
                        } else {
                          echo '<option value="105">105_ac_room</option>';
                        } ?>
                        <?php if ($sr7 > 4) {
                        } else {
                          echo '<option value="107">107_ac_room</option>';
                        } ?>
                        <?php if ($sr9 > 4) {
                        } else {
                          echo '<option value="109">109_ac_room</option>';
                        } ?>



                        <!-- <option value="103">103_ac_room</option>
                                            <option value="105">105_ac_room</option>
                                            <option value="107">107_ac_room</option>
                                            <option value="109">109_ac_room</option> -->
                      </select>

                    </div>
                    <div id="nonac" class="colors blue">
                      Select Your Room
                      <select name='rno' class='form-select'>
                        <?php if ($sr2 > 4) {
                        } else {
                          echo '<option value="102">102_non_ac_room</option>';
                        } ?>
                        <?php if ($sr4 > 4) {
                        } else {
                          echo '<option value="104">104_non_ac_room</option>';
                        } ?>
                        <?php if ($sr6 > 4) {
                        } else {
                          echo '<option value="106">106_non_ac_room</option>';
                        } ?>
                        <?php if ($sr8 > 4) {
                        } else {
                          echo '<option value="108">108_non_ac_room</option>';
                        } ?>
                        <?php if ($sr10 > 4) {
                        } else {
                          echo '<option value="110">110_non_ac_room</option>';
                        } ?>
                        <!-- <option value="104">104_non_ac_room</option>
                                            <option value="106">106_non_ac_room</option>
                                            <option value="108">108_non_ac_room</option>
                                            <option value="110">110_non_ac_room</option> -->
                      </select>

                    </div>
                  </div>
                  <div class='col-sm-12'>
                    <div class='form-floating'>
                      <label for='month'><b>Price Per Month</b></label><br><br>
                      <select name='month' id='month' class='form-control ' onchange='validateitem();' required>
                        <?php

                        $conn = mysqli_connect("localhost", "root", "", "hms");

                        if (isset($_SESSION['stu_id'])) {
                          $id = $_SESSION['id'];
                        } else {
                          $id = $_GET['id'];
                        }
                        // Check connection
                        if ($conn->connect_error) {
                          die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT  * FROM  hostel where hostel_id like'" . $id . "'";
                        $result = $conn->query($sql);


                        while ($row = $result->fetch_assoc()) {
                          $fees = $row['hostel_fees'];
                          $final = $fees / 12;
                          $final = round($final);
                          $final_ac = $final + 500;
                        }
                        echo "<option value=''>Please select</option>";
                        echo "<option  value='" . $final_ac . "ac'>" . $final_ac . " A.c</option>";
                        echo "<option  value='" . $final . "nonac'>" . $final . " Non.Ac</option>";

                        echo "</select>";
                        echo "<p style='color:red;'id='info'></p>";
                        echo "</div></div>";
                        mysqli_close($conn);
                        ?>

                        <br>
                        <?php
                        $conn = mysqli_connect("localhost", "root", "", "hms");
                        if (isset($_SESSION['stu_id'])) {

                          $id = $_SESSION['id'];
                        } else {
                          $id = $_GET['id'];
                        }
                        // Check connection
                        if ($conn->connect_error) {
                          die("Connection failed: " . $conn->connect_error);
                        }

                        $sql = "SELECT  DISTINCT city,hostel_id,hostel_name FROM  hostel where hostel_id like'" . $id . "'";
                        $result = $conn->query($sql);
                        echo " <div class='col-sm-12'>
                                                <div class='form-floating'>";
                        echo " <label for='hostel'><b>Your Selected Hostel</b></label><br><br>";
                        echo "<select name='loc' id='hostel' class='form-control ' required>";
                        while ($row = $result->fetch_assoc()) {
                          echo "<option  value='" . $row['hostel_id'] . "'>" . $row['hostel_name'] . "</option>";
                        }
                        echo "</select>";
                        echo "</div></div>";
                        ?>

                        <div class='invalid-feedback'>
                          please select month
                        </div>
                        <div class="col-sm-12 mt-3 mb-3">
                          <div class="form-floating">
                            <input type="date" name="startDate" id="validationCustom04" required class="form-control">
                            <label for="cage">start_date</label>
                          </div>

                          <div class='invalid-feedback'>
                            please select start_date
                          </div>


                        </div>
                        <div class="col-sm-12 mt-3 mb-3">
                          <div class="form-floating">
                            <select name="duration" class="form-control" id="validationCustom06" required>
                              <option value="">Select Duration</option>
                              <option value="6months">6 Months </option>
                              <option value="12months">12 Months</option>
                              <option value="3months">3 Months</option>

                            </select>

                            <div class='invalid-feedback'>
                              please select duration
                            </div>
                          </div>
                        </div>

                        <div class="col-sm-12 mt-3 mb-3">
                          <div class="form-floating">
                            <select name="food" class="form-control" id="validationCustom07" required>
                              <option value="">Select Food facility </option>
                              <option value="Yes">Per Monthly 2000</option>
                              <option value="No">No Charge </option>

                            </select>

                            <div class='invalid-feedback'>
                              please select food
                            </div>
                          </div>
                        </div>
                    </div>
                    <div class="col-8 mt-3">
                      <!-- <input type="submit" name="submit" value="submit" class='submit'> -->


                      <div class="col-12">
                        <button class="btn btn-primary w-50 py-3" name="submit" type="submit">Submit</button>
                      </div>

                    </div>
                  </div>
            </form>
          </div>
        </div>


      </div>
      <!-- </div>   -->
    </div>
    <!-- </div> -->
    <!-- Appointment End -->
    <script>
      var date = new Date(); //creating object by getting today date;
      var tdate = date.getDate(); //extracting today date from date variable
      var month = date.getMonth() + 1; //extracting month no from date variable

      if (tdate < 10) {
        tdate = '0' + tdate; // if the date is less than 10 than add 0 in it for specifying format

      }
      if (month < 10) {
        month = '0' + month; // if the month is less than 10 than add 0 in it for specifying format
      }
      var month_added = date.getMonth() + 2;
      month_added = '0' + month_added;
      var year = date.getUTCFullYear();
      var minDate = year + "-" + month + "-" + tdate;
      var maxDate = year + "-" + month_added + "-" + tdate;
      document.getElementById('validationCustom04').setAttribute('min', minDate);
      document.getElementById('validationCustom04').setAttribute('max', maxDate);
      console.log(minDate);
    </script>






    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
      <div class="container py-5">
        <div class="row g-5">
          <div class="col-lg-3 col-md-6">
            <h3 class="text-white mb-4">Get In Touch</h3>
            <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>FF3 ,Harivilla Complex,Nr Silver Star ,Chandloiya Ahmabad</p>
            <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+091 9426147423</p>
            <p class="mb-2"><i class="fa fa-envelope me-3"></i>Info@WALLYARD CONCEPT HOSTEL.in</p>
            <div class="d-flex pt-2
                            <a class=" btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
              <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
              <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
              <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <h3 class="text-white mb-4">Quick Links</h3>
            <a class="btn btn-link text-white-50" href="about.html">About Us</a>
            <a class="btn btn-link text-white-50" href="contact.html">Contact Us</a>
            <a class="btn btn-link text-white-50" href="classes.html">Our Services</a>
            <!--<a class="btn btn-link text-white-50" href="">Privacy Policy</a>
                        <a class="btn btn-link text-white-50" href="">Terms & Condition</a>-->
          </div>
          <div class="col-lg-3 col-md-6">
            <h3 class="text-white mb-4">Photo Gallery</h3>
            <div class="row g-2 pt-2">
              <div class="col-4">
                <img class="img-fluid rounded bg-light p-1" src="img/classes-1.jpg" alt="">
              </div>
              <div class="col-4">
                <img class="img-fluid rounded bg-light p-1" src="img/classes-2.jpg" alt="">
              </div>
              <div class="col-4">
                <img class="img-fluid rounded bg-light p-1" src="img/classes-3.jpg" alt="">
              </div>
              <div class="col-4">
                <img class="img-fluid rounded bg-light p-1" src="img/classes-4.jpg" alt="">
              </div>
              <div class="col-4">
                <img class="img-fluid rounded bg-light p-1" src="img/classes-5.jpg" alt="">
              </div>
              <div class="col-4">
                <img class="img-fluid rounded bg-light p-1" src="img/classes-6.jpg" alt="">
              </div>
            </div>
          </div>
          <div class="col-lg-3 col-md-6">
            <h3 class="text-white mb-4">Newsletter</h3>
            <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
            <div class="position-relative mx-auto" style="max-width: 400px;">
              <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
              <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
            </div>
          </div>
        </div>
      </div>
      <div class="container">
        <!--<div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved. 
                        -->
        <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
        Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
      </div>
      <div class="col-md-6 text-center text-md-end">
        <div class="footer-menu">
          <!-- <a href="index.html">Home</a> -->
          <!-- <a href="">Cookies</a>
                                <a href="">Help</a>
                                <a href="">FQAs</a>-->
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  <!-- Footer End -->


  <!-- Back to Top -->
  <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
  </div>

  <!-- JavaScript Libraries -->
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>

  <!-- Template Javascript -->
  <script src="js/main.js"></script>

  <script>
    $(function() {
      $('#colorselector').change(function() {
        $('.colors').hide();
        $('#' + $(this).val()).show();
      });
    });
  </script>



  <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (() => {
      'use strict'

      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      const forms = document.querySelectorAll('.needs-validation')

      // Loop over them and prevent submission
      Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
          if (!form.checkValidity()) {
            event.preventDefault()
            event.stopPropagation()
          }

          form.classList.add('was-validated')
        }, false)
      })
    })()
  </script>


</body>

</html>