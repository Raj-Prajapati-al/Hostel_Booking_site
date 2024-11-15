<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css"> -->

    <style>
  .form-control{
      width:200%;
      text-align:center;
  }

    /* The grid: Four equal columns that floats next to each other */

    .column {
      float: left;
      width: 25%;
      padding: 10px;
      margin-left:13rem;
    }

    /* Style the images inside the grid */
    .column img {
      opacity: 0.8;
      cursor: pointer;
    }

    .column img:hover {
      opacity: 1;
    }

    /* Clear floats after the columns */
    .row:after {
      content: "";
      display: table;
      clear: both;
    }

/* The expanding image container (positioning is needed to position the close button and the text) */
    .contain{
      position: relative;
      display: none;
    }
    .contains
    {
      position:relative;
      display:none;
    }
    .containes
    {
      position:relative;
      display:none;
    }
    /* Expanding image text */
    #imgtext {
      position: absolute;
      bottom: 15px;
      left: 15px;
      color: white;
      font-size: 20px;
    }

    /* Closable button inside the image */
    .closebtn {
      position: absolute;
      top: 10px;
      right: 15px;
      color: white;
      font-size: 35px;
      cursor: pointer;
    }
    </style>

<script>
function myFunction(imgs) {
  // Get the expanded image
  var expandImg = document.getElementById("expandedImg");
  // Get the image text
  var imgText = document.getElementById("imgtext");
  // Use the same src in the expanded image as the image being clicked on from the grid
  expandImg.src = imgs.src;
  // Use the value of the alt attribute of the clickable image as text inside the expanded image
  imgText.innerHTML = imgs.alt;
  // Show the container element (hidden with CSS)
  expandImg.parentElement.style.display = "block";

}
function myFunctionss(imgs) {
  // Get the expanded image
  var expandImg = document.getElementById("expandedImgs");
  // Get the image text
  var imgText = document.getElementById("imgtext");
  // Use the same src in the expanded image as the image being clicked on from the grid
  expandImg.src = imgs.src;
  // Use the value of the alt attribute of the clickable image as text inside the expanded image
  imgText.innerHTML = imgs.alt;
  // Show the container element (hidden with CSS)
  expandImg.parentElement.style.display = "block";

}
function myFunctions(imgs) {
  // Get the expanded image
  var expandImg = document.getElementById("expandedImgss");
  // Get the image text
  var imgText = document.getElementById("imgtext");
  // Use the same src in the expanded image as the image being clicked on from the grid
  expandImg.src = imgs.src;
  // Use the value of the alt attribute of the clickable image as text inside the expanded image
  imgText.innerHTML = imgs.alt;
  // Show the container element (hidden with CSS)
  expandImg.parentElement.style.display = "block";
}
</script>

</head>
<body>

  <!-- Navbar Start -->
  <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top px-4 px-lg-5 py-lg-0">
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
          <a href="Registationpage.php" class="btn btn-primary rounded-pill px-3 d-none d-lg-block">Register Now<i class="fa fa-arrow-right ms-3"></i></a>&nbsp;&nbsp;&nbsp;
          <a href="loginpagemain.php" class="btn btn-primary rounded-pill px-3 d-none d-lg-block">Admin Login<i class="fa fa-arrow-right ms-3"></i></a>
      </div>
  </nav>
  <!-- Navbar End -->

<?php
      $con = mysqli_connect("localhost", "root", "", "hms");
      if ($con->connect_error)
      {
          die("Connection failed: " . $con->connect_error);
      }
      $id=$_POST['hostel_id'];
      $selectQuery = "SELECT * FROM  image where hostel_id like '".$id."'";
      $select="select * from hostel where hostel_id like'".$id."'";
      $qry=mysqli_query($con,$select);
      $result = $con->query($selectQuery);
?>

<div class='container'>
<div class='row d-flex justify-content-center'>
<div class='col-lg-12 mt-4'>
    <div class='text-center'>
      <h1><u>Hostel Details</u></h1>
</div>

<?php
    echo "<div class='row'>";
        while ($row = $result->fetch_assoc()) 
        {
          $img=$row['hostel_img'];

            // $trim= ltrim($img,'C:/xampp/htdocs/Hostel-02-03-2024/management/'); 

          echo " <div class='column'>
          <img style='width:100%;height:270px;border:4px solid #ddd;border-radius:8px;' src='" . $img . "' 
          alt='Hostel image' onclick='myFunction(this);'> 
          </div>";
        }
    echo "</div>";
    $con->close();
?>

 <div class="contain">
    <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
    <img id="expandedImg" style="width:100%;height:500px;border:4px solid #ddd;border-radius:8px;">
    <div id="imgtext"></div>
 </div>

<div style='width:100%;'>
  
<?php

  if($rst=mysqli_num_rows($qry)>0)
  {
    echo "<div class='col-md-12 mt-3 mb-3 bg-secondary text-white'>";
     
    while ($row = $qry->fetch_assoc()) {
     
        echo " <h3><div class='m-2'> <i class='bi bi-telegram fs-5 '></i>Hostel Name :".$row["hostel_name"]."<br><br></div>
        <div class='m-2'> <i class='bi bi-telegram fs-5 ''></i>Hostel Type :".$row["hostel_type"]."<br><br></div>
        <div class='m-2'> <i class='bi bi-telegram fs-5 '></i> Hostel Address :".$row["hostel_address"]."<br><br></div>
        <div class='m-2'> <i class='bi bi-telegram fs-5 '></i> Hostel Annual fees :".$row["hostel_fees"]."<br><br></div>
        <div class='m-2'>
        <pre><i class='bi bi-telegram fs-5 '></i><u>Hostel Timings:-</u>
            Open Timings - 08:am
            Closed Timings- 11:pm
      <u>->Family Meeting Time:-</u>
            Saturday- 9:00 to 12:00
            Sunday- 9:00 to 12:00
        </pre></i>
        </h3> ";
    }
    echo "</div>";
  } 

?> 
  </div>

  <div id="carouselExampleIndicators" class="carousel slide">
  <div class="carousel-indicators">
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
  </div>
  <div class="carousel-inner">
    <!-- <div class="carousel-item active">
      <img style='height:500px;'  src="https://kripalhomes.com/wp-content/uploads/2023/02/WhatsApp-Image-2020-07-31-at-12.02.36-PM-3-e1625383337516.jpeg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img style='height:500px;' src="https://www.collegebatch.com/static/clg-gallery/rai-university-ahmedabad-220754.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img style='height:500px;' src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQsORUSP3VjjMUxl0OGZHGOLBSC4W1Op12NGU7FgmiXKBvT2fmtfdG89KJrojAi88lLyiU&usqp=CAU" class="d-block w-100" alt="...">
    </div>
  </div> -->



 

<!-- <p class='text-black'>
A hostel is a form of low-cost, short-term shared sociable lodging where guests can rent a bed, usually a bunk bed in a dormitory sleeping 4-20 people,[2] with shared use of a lounge and usually a kitchen.[3] Rooms can be mixed or single-sex and have private or shared bathrooms. Private rooms may also be available. Hostels are popular forms of lodging for backpackers,[3] however very few impose age limits, so hostels are an option for travellers of all ages and styles.[2] The benefits of hostels include lower costs and opportunities to meet people from different places, find travel partners, and share travel experiences.[1][3] Some hostels, such as in India or Hostelling International, cater to a niche market of travelers. Different hostels can be known for offering different experiences.[3] For example, one hostel might feature in-house social gatherings such as movie nights or communal dinners,[2</p> -->
  </div>

<hr style='border:3px solid blue'>

<div class='col-lg-12 mt-4 mb-5'>
      
<?php
        $con = mysqli_connect("localhost", "root", "", "hms");
        if ($con->connect_error) 
        {
            die("Connection failed: " . $con->connect_error);
        }
        $selectQuery = "SELECT * FROM image where hostel_id like'".$id."'";
        $result = $con->query($selectQuery);
?>

  <h2><u>Food Details</u></h2>

<?php
    echo "<div class='row'>";
    while ($row = $result->fetch_assoc()) 
    {
      $img=$row['food'];
        // $trim=ltrim($img,'C:/xampp/htdocs/Hostel-02-03-2024/management/');  
      
      echo "<div class='column'>
      <img  style='width:100%;border:4px solid #ddd;height:270px;border-radius:8px;' src='" . $img. "' 
      alt='Food Image' onclick='myFunctionss(this);'>
      </div>";   
    }
    echo "</div>";
    $con->close();
?>

 <div class="contains">
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
  <img id="expandedImgs" style="width:100%;height:500px;border:4px solid #ddd;border-radius:8px;">
  <div id="imgtext"></div>
 </div>

<!-- <p class='text-black'>
Physical Layout: Details about the layout of the facility, including the kitchen area, storage spaces, dining areas (if applicable), and any other relevant sections.

Equipment and Appliances: Information about the types of equipment and appliances used in the facility, such as ovens, stoves, refrigerators, freezers, cooking utensils, and more.

Hygiene and Sanitation Practices: Descriptions of the hygiene and sanitation practices followed within the facility, including cleaning routines, food safety measures, and pest control procedures.

Food Handling Processes: Explanation of how food is received, stored, prepared, cooked, and served. This includes details about food sourcing, storage conditions, and cooking methods.

Menu: If applicable, a description of the menu offered by the facility, including types of cuisine, dishes, and any special offerings.
</p>  -->
<div class='col-md-12 mt-3 mb-3 bg-secondary text-white'>
<h4><div class='m-2'> <i class='bi bi-telegram fs-5 '></i>Per Month : 2000<br><br></div>
        <div class='m-2'> <pre><i class='bi bi-telegram fs-5 '></i><u>Food Timings:-</u>
        BreakFast- 08:am
        Lunch- 01:pm
        Dinner- 08:pm
      </pre></div>
      <div class='m-2'> <i class='bi bi-telegram fs-5 '></i>If you Missed the Food timings, so you will get Food only one hour after food timings.<br><br></div>
      <div class='m-2'> <i class='bi bi-telegram fs-5 '></i>Food will Be Made With pure Hygine,No compromise On Student's Health.<br><br></div>
 </h4> 
    
</div>
</div>
<hr  style='border:3px solid blue'>

<div class='col-lg-12 mt-4 mb-5'>
        
<?php
      $con = mysqli_connect("localhost", "root", "", "hms");
      if ($con->connect_error) 
      {
          die("Connection failed: " . $con->connect_error);
      }
      $selectQuery = "SELECT * FROM  image where hostel_id like'".$id."'";
      $result = $con->query($selectQuery);
?>


  <h3><u>Parking Details</u></h3>
  
<?php
     echo "<div class='row'>";
    while ($row = $result->fetch_assoc()) 
    {
      $img = $row['parking'];

      // $trim = ltrim($img,'C:/xampp/htdocs/Hostel-02-03-2024/management/');   
      echo "<div class='column'>
        <img style='width:100%;border:4px solid #ddd;height:270px;border-radius:8px' src='" . $img. "' alt='Parking Image' onclick='myFunctions(this);'>
        </div>";
        // echo "<hr>";
    }
    echo "</div>";
    $con->close();
?>

  <div class="containes">
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
  <img id="expandedImgss" style="width:100%;height:500px;border:4px solid #ddd;border-radius:8px;">
  <div id="imgtext"></div>
 </div>

<!-- <p class='text-black'>
Location: Hostel parking areas are usually located on the premises of the hostel or in close proximity to the building. They may be situated in a dedicated parking lot, courtyard, or adjacent street.

Capacity: The parking area will have a specific capacity, indicating the number of vehicles it can accommodate. This capacity can vary depending on the size of the hostel and the available space.

Designated Spaces: Parking spaces may be marked or designated for specific use, such as guest parking, staff parking, or disabled parking. Clear signage is often provided to guide users to the appropriate areas.

Security Measures: To ensure the safety of parked vehicles, hostel parking areas may have security measures in place. This could include well-lit spaces, surveillance cameras, or even a gated entrance that requires a key or code for access.
</p> -->
<div class='col-md-12 mt-3 mb-3 bg-secondary text-white'>
<h5><div class='m-2'> <i class='bi bi-telegram fs-5 '></i><u>Parking Details</u><br><br></div>
        <div class='m-2'> <i class='bi bi-telegram fs-5 '></i>You Will Get a parking service with no charge included.<br><br></div></h5>

    
</div>
</div>


<div class="mt-2 mb-2">
         <a href="Registationpage.php" class='text-dark '> 
              <button type='button' class='btn btn-primary'><b>Register Now</b> </button>
            </a>
         </div>

</div>
</div>

<div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="container py-5">
                        <div class="row g-5">
                            <div class="col-lg-3 col-md-6">
                                <h3 class="text-white mb-4">Get In Touch</h3>
                                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>FF3 ,Harivilla Complex,Nr Silver Star ,Chandloiya Ahmabad</p>
                                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+091 9426147423</p>
                                <p class="mb-2"><i class="fa fa-envelope me-3"></i>Info@WALLYARD CONCEPT HOSTEL.in</p>
                                <div class="d-flex pt-2
                                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
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
                                        <img class="img-fluid rounded bg-light p-1" src="img/360_F_219669327_v12pBKc7TB62E3uCJrgRRkDhfVENK3z5.jpg" alt="">
                                    </div>
                                    <div class="col-4">
                                        <img class="img-fluid rounded bg-light p-1" src="img/download.jpeg" alt="">
                                    </div>
                                    <div class="col-4">
                                        <img class="img-fluid rounded bg-light p-1" src="img/istockphoto-1208347864-1024x1024.jpg" alt="">
                                    </div>
                                    <div class="col-4">
                                        <img class="img-fluid rounded bg-light p-1" src="img/h1.jpg" alt="">
                                    </div>
                                    <div class="col-4">
                                        <img class="img-fluid rounded bg-light p-1" src="img/h4.jpeg" alt="">
                                    </div>
                                    <div class="col-4">
                                        <img class="img-fluid rounded bg-light p-1" src="img/h3.jpeg" alt="">
                                    </div>
                                </div>
                            </div>
                          
                </div>
               
        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>
</body>
</html>