<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Hostel Booking site</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
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
    <!-- Favicon -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        .abc:hover {
            background-color: black;
        }
    </style>
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
        <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
            <!-- <a href="index.php" class="navbar-brand">
             <img style='width:100%; height:100px; margin-left:100%;' src="https://img.freepik.com/free-vector/editable-hotel-logo-vector-business-corporate-identity-hostel_53876-111553.jpg" alt=""> 
            </a> -->
            <a href="index.php" class="navbar-brand">
                <h1 class="m-0 text-primary"><i class="fa fa-book-reader me-3"></i>Hostel Booking Site</h1>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav mx-auto">
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="about.html" class="nav-item nav-link">About Us</a>
                    <a href="classes.html" class="nav-item nav-link">Rooms</a>
                    <div class="nav-item dropdown">
                        <!-- <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Student Infomation</a>
                        <div class="dropdown-menu rounded-0 rounded-bottom border-0 shadow-sm m-0">
                            <a href="facility.html" class="dropdown-item"> hostel Facilities</a>-->
                        <!--  <a href="team.html" class="dropdown-item">Popular Teachers</a>
                            <a href="call-to-action.html" class="dropdown-item">Become A Teachers</a>-->

                        <!--<a href="testimonial.html" class="dropdown-item">Testimonial</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>-->
                        <a href="contact.html" class="nav-item nav-link">Contact Us</a>

                    </div>
                    <a href="student_main_Login.php" class="nav-item nav-link text-primary ">Student Login</a>
                </div>
            </div>
            <a href="loginpage.php" class="btn btn-primary rounded-pill px-3 d-none d-lg-block">Admin Login<i class="fa fa-arrow-right ms-3"></i></a>
    </div>
    </nav>
    <!-- Navbar End -->
    <!-- Carousel Start -->
    <!-- <div class="container-fluid p-0 mb-5">
            <div class="owl-carousel header-carousel position-relative">
                <div class="owl-carousel-item position-relative">
                    <img class="img-fluid " src="img/h1.jpg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .2);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-2 text-white animated slideInDown mb-4">Hostal booking site</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
    <!--<div class="owl-carousel-item position-relative">
                    <img class="img-fluid" src="img/h4.jpeg" alt="">
                    <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .2);">
                        <div class="container">
                            <div class="row justify-content-start">
                                <div class="col-10 col-lg-8">
                                    <h1 class="display-2 text-white animated slideInDown mb-4"></h1>
                                    <p class="fs-5 fw-medium text-white mb-4 pb-2">Vero elitr justo clita lorem. Ipsum dolor at sed stet sit diam no. Kasd rebum ipsum et diam justo clita et kasd rebum sea elitr.</p>
                                    <a href="" class="btn btn-primary rounded-pill py-sm-3 px-sm-5 me-3 animated slideInLeft">Learn More</a>
                                    <a href="" class="btn btn-dark rounded-pill py-sm-3 px-sm-5 animated slideInRight">Our Classes</a>
                                </div>-->
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <!-- Carousel End -->
    <form action="location.php" method="post">
        <table>
            <tr>
                <?php

                $conn = mysqli_connect("localhost", "root", "", "hms");

                if ($conn == false) {
                    die("ERROR: Could not connect. "
                        . mysqli_connect_error());
                }


                if (isset($_POST['loc']) && isset($_POST['submit'])) {
                    $loc = $_POST['loc'];
                    $query = "SELECT * FROM hostel WHERE city='$loc'";
                    // $sel="select * from hostel_img";
                    // $rslt=$conn->query($sel);

                    $result = $conn->query($query);
                    if ($result->num_rows > 0) //&& $rslt->num_rows>0
                    {
                        $students = mysqli_fetch_all($result, MYSQLI_ASSOC);
                        // $row=mysqli_fetch_all($rslt,MYSQLI_ASSOC);
                    } else {
                        $students = [];
                    }
                }
                ?>
    </form>
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <div class='container'>

        <?php
        if (count($students) > 0) {
            $sn = 1;
            foreach ($students as $student) {
                //  foreach($row as $rw){
                //   if($rw['hostel_id']==$student['hostel_id'])
                //     {
                //         $id=$rw['Hostel_cover'];
                //     }
                // }
        ?>

                <!-- <div class=" mb-3" >
            <div class=" g-0"> -->
                <div class="col-md-12">
                    <br>
                    <?php
                    $img = $student["hostel_photo_path"];
                    // $trim= ltrim($img,'C:/xampp/htdocs/Hostel-02-03-2024/management/');   
                    echo "<img src='" . $img . "' style='width:100%; height:400px;margin-right:8%;' class='' alt='Hostel Image'>";
                    echo "<hr/>";
                    ?>
                </div>
                <div class='row d-flex justify-content-center'>
                    <div class="col-md-12 mt-3 mb-3 bg-secondary text-white">

                        <!-- <div class="m-2">
            <i class="bi bi-telegram fs-5 "></i> hostel id:  
            </div> -->
                        <?php //echo $student['hostel_id']; 
                        ?>
                        <div class="m-2">
                            <i class="bi bi-telegram fs-5 "></i> Hostel Name: <?php echo $student['hostel_name']; ?>
                        </div>

                        <!-- <div class="mt-2 mb-2">
        <i class="bi bi-telegram fs-5"></i>  hostel description:  <?php echo $student['hostel_description']; ?>
         </div>-->

                        <div class="m-2 ">
                            <i class="bi bi-telegram fs-5"></i> Hostel Type: <?php echo $student['hostel_type']; ?>
                        </div>

                        <div class="m-2">
                            <i class="bi bi-telegram fs-5"></i> Hostel Fees: <?php echo $student['hostel_fees']; ?>
                        </div>

                        <div class="m-2">
                            <i class="bi bi-telegram fs-5"></i> Hostel Address: <?php echo $student['hostel_address']; ?>
                        </div>
                        <!-- 
            <div class="mt-2 mb-2">
            <i class="bi bi-telegram fs-5"></i> city:  <?php echo $student['city']; ?>
            </div> -->

                        <!-- <div class="mt-2 mb-2">
            <a href="Registationpage.php" class='text-danger abc'> <b>Book</b> </a>
            </div> -->
                        <form action="viewHostelDetails.php" method="post">
                            <div class="mt-2 mb-2">


                                <button class='btn btn-primary m-3' value=<?php echo $student['hostel_id'] ?> name="hostel_id">View Details</button>

                            </div>
                        </form>
                        <!-- </div>
            </div> -->
                    </div>
                </div>
        <?php
                $sn++;
            }
        } else {
            echo "<tr><td colspan='3'>No Data Found</td></tr>";
        }
        ?>

        </form>
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
</body>

</html>