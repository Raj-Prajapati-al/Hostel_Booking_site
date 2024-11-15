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
            background: green;
            padding: 6px;
            border-radius: 5px;
            color: white;
            margin: 5px;
            text-align: center;
        }

        button:hover {
            cursor: pointer;
        }
    </style>
</head>

<body>


    <?php
    session_start();

    $id = $_SESSION['ownerid'];
    if ($id) {
    } else {
        header("location:loginpagemain.php");
    }

    $conn = mysqli_connect("localhost", "root", "", "hms");


    if (isset($_POST['update'])) {
        $user_id = $_REQUEST['user_id'];
        $student_name =  $_REQUEST['student_name'];
        $parents_no = $_REQUEST['parents_no'];
        $Gander = $_REQUEST['Gander'];
        $Date_of_brith = $_REQUEST['Date_of_brith'];
        $Address1 = $_REQUEST['Address1'];
        $city = $_REQUEST['city'];
        $pincode = $_REQUEST['pincode'];
        $email = $_REQUEST['email'];


        $sql = "UPDATE student SET student_name = '$student_name', email = '$email',parents_no = '$parents_no', Gander = '$Gander', Date_of_brith = '$Date_of_brith', Address1 = '$Address1', city1 = '$city', pincode = '$pincode' WHERE student_id ='$user_id'";



        $result = $conn->query($sql);

        if ($result == TRUE) {

            echo "&nbsp;&nbsp;&nbsp;<h3 style='color:Green;'>Record updated successfully.</h3>";
        } else {

            echo "Error:" . $sql . "<br>" . $conn->error;
        }
    }

    if (isset($_GET['student_id'])) {

        $user_id = $_GET['student_id'];

        $sql = "SELECT * FROM student WHERE student_id='$user_id'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {

                $student_name =  $row['student_name'];
                $email = $row['email'];
                $parents_no = $row['parents_no'];
                $Gander = $row['Gander'];
                $Date_of_brith = $row['Date_of_brith'];
                $Address1 = $row['Address1'];
                $city = $row['city1'];
                $pincode = $row['pincode'];
                $student_id = $row['student_id'];
            }
        }



    ?>


        <div class="container-xxl py-5">
            <div class="container">
                <div class="bg-light rounded">
                    <button style='background-color:green;color:black;'>view Data</button>
                </div>
                <div class="row g-0">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">

                        <div class="h-100 d-flex flex-column justify-content-center p-5">
                            <h1 class="mb-4">student update details </h1>

                            <form action="" method="POST">
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <input type="hidden" name="user_id" value="<?php echo $student_id; ?>">
                                        <div class="form-floating">
                                            <input type="text" class="form-control border-0" name="student_name" value="<?php echo $student_name; ?>">
                                            <label for="gname">student_name</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-floating">

                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-floating">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-floating">
                                            <input type="radio" id="male" name="Gander" value="Male" required>
                                              Male
                                            <input type="radio" id="female" name="Gander" value="Female" required>
                                              Female
                                             
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-floating">
                                            <input type="text" name="parents_no" class="form-control border-0" max="10" id="no" value="<?php echo $parents_no; ?>">
                                            <label for="no">Parents_no</label>
                                             
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-floating">
                                            <input type="email" name="email" class="form-control border-0" id="no" value="<?php echo $email; ?>">
                                            <label for="no">E-mail</label>
                                             
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="form-floating">
                                            <input type="date" name="Date_of_brith" class="form-control border-0" value="<?php echo $Date_of_brith; ?>">
                                            <label for="cage">Date_of_brith</label>
                                             
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control border-0" name="Address1" style="height: 100px"><?php echo $Address1; ?></textarea>

                                            <label for="Address">Address</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control border-0" name="city" value="<?php echo $city; ?>">
                                            <label for="city">city</label>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-floating">
                                            <input type="text" max="6" class="form-control border-0" name="pincode" value="<?php echo $pincode; ?>">
                                            <label for="pincode">pincode</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit" name="update">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                        <div class="position-relative h-100">
                            <img class="position-absolute w-100 h-100 rounded" src="imges/1000_F_721552946_lVbTg3K1h7lE5M8THf9xnij6cJr40KuX.jpg" style="object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>


        <script src="script.js"></script>
</body>

</html>

<?php

    }



?>