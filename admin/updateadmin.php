<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Update </title>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">

    <style>
        .submit {
            background:green;
            padding:6px;
            border-radius:5px;
            color:white;
            margin:5px;
            text-align:center;
        }
        .success{
             background-color: green; 
            color:#fff; 
            text-align:center;
            font-size:1.1rem;
            animation: transition 3s ease 1s 1; 
        }
        @keyframes transition {
            0%{
                background-color: green; 
                color:#fff; 
                text-align:center;
                font-size:1.1rem;  
            }
            50%{
                background-color: lightgreen; 
                color:#fff; 
                text-align:center;
                font-size:1.1rem;
            }
            100%{
                visibility: hidden;
            }
        }
    </style>
</head>
<body>


<?php 

$conn = mysqli_connect("localhost", "root", "", "hms");


    if (isset($_POST['update'])) {
        $user_id = $_REQUEST['user_id'];
        $email =  $_REQUEST['email'];
       $Password1 = $_REQUEST['Password1'];

        $sql = "UPDATE  hostelowner SET owner_email = '$email',owner_password = '$Password1' WHERE hostelowner_id = '$user_id'"; 

        $result = $conn->query($sql); 

        if ($result == TRUE) {

                echo"<div id='success'>
                        Record updated successfully.
                    </div> ";

        }else{

            echo "Error:" . $sql . "<br>" . $conn->error;

        }

    } 

if (isset($_GET['hostalid'])) 
{

    $user_id = $_GET['hostalid']; 

    $sql = "SELECT * FROM hostelowner WHERE hostelowner_id='$user_id'";
    $result = $conn->query($sql); 

    if ($result->num_rows > 0) 
    {        
        while ($row = $result->fetch_assoc()) {

            $email =  $row['owner_email'];
            $Password1 = $row['owner_password'];
            $hostalid = $row['hostelowner_id'];

        } 
    }

    ?>

    <div class="container">
        <div class="bg-light rounded">
            <div class="row g-0">

            <div class='mt-4'>
                <a href="adminDisplay.php" class='submit' >View Data</a>
            </div>

                <div class="col-lg-12 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-flex flex-column justify-content-center p-5">
                        <h1 class="mb-4"> Update Admin Data </h1>
                            <form action="" method="POST">
                            <div class="row g-3">
                        <input type="hidden" name="user_id" value="<?php echo $hostalid; ?>">

                                <div class="col-sm-7">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0"  id="email"  placeholder="email" name="email" min="101" max="110"    onKeyUp="if(this.value>110){this.value='110';}else if(this.value<0){this.value='0';}"
                                            id="yourid"   value="<?php echo $email; ?>">
                                        <label for="gname">Email</label>
                                    </div>
                                </div>
                                
                                <div class="col-sm-7">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0"  id="Password1"  placeholder="Password1" name="Password1" 
                                            id="yourid"   value="<?php echo $Password1; ?>">
                                        <label for="gname">Password</label>
                                    </div>
                                </div>
                                
                                    <div class="col-12">
                                    <input type="submit" value="Update" class='submit' name="update" >
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                    <!-- <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded" src="img/appointment.jpg" style="object-fit: cover;">
                    </div> -->
                </div> 
            </div>
        </div>
    </div>
<?php

} 

?> 
</body>
<script>
    let success = document.querySelector("#success");
    success.classList.add("success");
        setTimeout(() => {
            success.remove();
    }, 3000);
</script>
</html>
