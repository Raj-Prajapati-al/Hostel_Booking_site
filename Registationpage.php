<html>

<head>
    <title>Regirstration page</title>
    <meta charset="utf-8">
    <title>Hostal Booking site</title>
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
    <style>
        #hostel,
        #type {
            -webkit-appearance: menulist;
        }
    </style>
</head>

<body>

    <!-- Appointment Start -->
    <!-- <a href="logout_student.php" class="nav-item nav-link float-end" style="margin-left:90px;margin-top:2rem;margin-right:3rem;background-color:rgb(255,99,71);color:white;box-sizing:border-box;border:2px solid black;padding:4px;border-radius:8px;">Home Page</a> -->
    <!-- <form align='right' name="form1" method="post" action="logout_student.php" >
    <label>
<input name="submit12" value="logout" type="submit" style="color:white;background-color:rgb(255,99,71);margin-top:2rem;margin-right:3rem;">
    </label>
</form>     -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="bg-light rounded">
                <div class="row g-0">
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                        <div class="h-100 d-flex flex-column justify-content-center p-5">
                            <h2 class="mb-4">Make Your Registration</h2>
                            <form action="Registationpageinsert.php" method="post" enctype="multipart/form-data" class="needs-validation" novalidate>
                                <div class="row g-3">
                                    <div class="col-sm-6">
                                        <div class="">
                                            <label for="validationCustom01" class="form-label">Name</label>
                                            <input type="text" required class="form-control border-0 p-3" id="validationCustom01" id="student_name" placeholder="" name="student_name" pattern="[a-zA-Z ]*">
                                            <div class="invalid-feedback">
                                                Please provide a name.
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="">
                                            <label for="validationCustom02" class="form-label">E-mail</label>
                                            <input type="email" required class="form-control border-0 p-3" id="validationCustom02" required id="student_email" placeholder="" name="student_email">
                                            <div class="invalid-feedback">
                                                Please provide a valid Email
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="">
                                            <label for="validationCustom03" class="form-label">ParentsNo</label>
                                            <input type="tel" class="form-control border-0 p-3" id="validationCustom03" pattern="[0-9]{1}[0-9]{9}" required name="parents_no" placeholder="" maxlength="10">
                                            <div class="invalid-feedback">
                                                Please provide a ParentsNo
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="validationCustom09" class="form-label">Gender</label>
                                        <div class=" bg-white p-3 rounded-3">
                                            <input type="radio" placeholder="Gander" value="Male" id='validationCustom09' required name="Gander" id=""> Male &nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="radio" placeholder="Gander" value="Female" id='validationCustom13' required name="Gander" id=""> Female

                                            <div class="invalid-feedback">
                                                Please provide a Gender
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="">
                                            <label for="validationCustom04" class="form-label">Date of brith</label>
                                            <input type="date" id='validationCustom04' class="form-control border-0 p-3" required id="Date_of_brith" name="Date_of_brith" placeholder="">
                                            <div class="invalid-feedback">
                                                Please provide a Date of brith
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="">
                                            <label for="validationCustom10" class="form-label">Add Your Photo </label>
                                            <input type="file" id='validationCustom10' class="form-control border-0 p-3" required name="image" id="image">
                                            <div class="invalid-feedback">
                                                please chhose Image
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="">
                                            <label for="type" class="form-label">Type</label>
                                            <select name="course_name" id="type" class="form-control p-3" required>
                                                <option value=""></option>
                                                <option value="student">student</option>
                                                <option value="working_person">working_person</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                please choose Your Type
                                            </div>
                                        </div>
                                    </div>


                                    <?php
                                    $conn = mysqli_connect("localhost", "root", "", "hms");

                                    // Check connection
                                    if ($conn->connect_error) {
                                        die("Connection failed: " . $conn->connect_error);
                                    }

                                    $sql = "SELECT  DISTINCT city,hostel_id,hostel_name FROM  hostel";

                                    $result = $conn->query($sql);
                                    echo "<div class='col-sm-6'>";
                                    echo " <div class=''>";
                                    echo " <label for='hostel' class='form-label'>Select Hostel</label>";
                                    echo "<select name='loc' id='hostel' class='form-control p-3' required>";
                                    echo "<option value='' ></option>";

                                    while ($row = $result->fetch_assoc()) {
                                        echo "<option  value='" . $row['hostel_id'] . "'>" . $row['hostel_name'] . "</option>";
                                    }
                                    echo "</select>";
                                    echo "  <div class='invalid-feedback'>
                                             please Select Hostel
                                             </div>";

                                    echo "</div></div>";

                                    $conn->close();
                                    ?>
                                    <div class="col-12">
                                        <div class="">
                                            <label for="validationCustom05" class="form-label">College Name/Company Name</label>
                                            <input type="text" class="form-control border-0 p-3" id="validationCustom05" required id="city" name="clg" pattern="[a-zA-Z ]*">
                                            <div class="invalid-feedback">
                                                Please provide a College Name
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="">
                                            <label for="validationCustom06" class="form-label">Address</label>
                                            <textarea class="form-control border-0" id="validationCustom06" required placeholder="" id="Address1" name="Address1" style="height: 100px"
                                                pattern="[a-zA-Z ]*"></textarea>
                                            <div class="invalid-feedback">
                                                Please provide a Address
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="">
                                            <label for="validationCustom07" class="form-label">City</label>
                                            <input type="text" class="form-control border-0 p-3" id="validationCustom07" required id="city" placeholder="" name="city" pattern="[a-zA-Z ]*">
                                            <div class="invalid-feedback">
                                                Please provide a city
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="">
                                            <label for="validationCustom08" class="form-label">Pincode</label>
                                            <input type="text" class="form-control border-0 p-3" id='validationCustom08' required id="pincode" maxlength="6" placeholder="" name="pincode" pattern="\d{6,6}">
                                            <div class="invalid-feedback">
                                                Please provide a pincode
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="">
                                            <label for="validationCustom11" class="form-label">Username</label>
                                            <input type="text" class="form-control border-0 p-3" id='validationCustom11' required id="uname" placeholder="" name="uname">
                                            <div class="invalid-feedback">
                                                Please provide a username
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="">
                                            <label for="validationCustom12" class="form-label">Password</label>
                                            <input type="password" id='validationCustom12' class="form-control border-0 p-3" id="p" maxlength="8" title="Eight or more characters" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required placeholder="" name="p" autocomplete>
                                            <div class="invalid-feedback">
                                                Please provide a password, and it Must contains atleast one number and one uppercase and lowercase letter,and atleast 8 or more characters
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 400px;">
                        <div class="position-relative h-100">
                            <img class="position-absolute w-100 h-100 rounded" src="imges/appointment.jpg" style="object-fit: cover;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Appointment End -->


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