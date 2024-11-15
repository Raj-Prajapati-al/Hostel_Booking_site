<!Doctype html>
<html>
<head>
    <title>Hostel Management</title>
    <?php
    include("navbar.php");
    ?>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


<style>
  body {
    /* background-color:#8B0000; */
    }
</style>

</head>
<body>
<!--     
<div class="container">
<div class='card '>
  <div class='card-body'>
  <div class='row mt-5' >

  <div col-md-4>



        <h5>Hostal Form</h5>
  
    <form action="hostal_insertmain.php" class='mt-3 mb-3 m-2' method="post" >
  <div class="mb-3">
    <label for="student_name" class="form-label">Hostelname</label>
    <input type="text" class="form-control "  name="hostel_name" id="" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="student_name" class="form-label">hostel_description</label>
    <textarea class="form-control" name="hostel_description" id=""aria-describedby="emailHelp"> </textarea>
    
  </div>

  <div class="mb-3">
    <label for="" class="form-label">hostel_type</label>
    <input type="radio" name="hostel_type" value="Ac"> Ac
    <input type="radio" name="hostel_type" value="Nonac">Nonac
  </div>

  <div class="mb-3">
    <label for="student_name" class="form-label">hostel_fees</label>
    <input type="text" class="form-control"  name="hostel_fees" id="" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="student_name" class="form-label">hostel_address</label>
    <input type="text" class="form-control"  name="hostel_address" id="" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="student_name" class="form-label">city</label>
    <input type="text" class="form-control"  name="city" id="" aria-describedby="emailHelp">
  </div>
  <div class="mb-3">
    <label for="student_name" class="form-label">owner_name</label>
    <input type="text" class="form-control"  name="owner_name" id="" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="student_name" class="form-label">owner_email</label>
    <input type="text" class="form-control"  name="owner_email" id="" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="student_name" class="form-label">owner_mobileno</label>
    <input type="text" class="form-control"  name="owner_mobileno" id="" aria-describedby="emailHelp">
  </div>


  <div class="mb-3">
  <input type="submit"name="submit"  style=" " class='bg-secondary border-0 rounded-3 p-1 px-3 mb-3'  value="submit">
   
  </div>
 
</form>

<div>
</div>
  </div>

</div>
</div>
</div>
 -->


<div class='container'>
<div class="card mb-3" style="">
  <div class="row g-0" >
    <div class="col-md-6">
    <!-- https://e1.pxfuel.com/desktop-wallpaper/581/154/desktop-wallpaper-backgrounds-for-login-page-login-page.jpg -->
      <img  style='height:1320px; width:100%;' src="img/dan-gold-uhCgfivFP6o-unsplash.jpg " class=" rounded-start" alt="...">
    </div>
    <div class="col-md-6" style='background-color:#808080	;'>
      <div class="card-body shadow-lg">
       
      <h2>Hostel  Form</h2>

  <form action="insertHostel.php" class='mt-3 mb-3 m-2 needs-validation' id='f1' method="post"  enctype="multipart/form-data" novalidate>


<div class="mb-3">
  <label for="validationCustom02" class="form-label text-white">Hostelname</label>
  <input type="text" class="form-control "  name="hostel_name" id="validationCustom02"  required aria-describedby="emailHelp">

  <div class='invalid-feedback'>
      Please Enter Hostelname
  </div>

</div>

<div class="mb-3">
  <label for="validationCustom03" class="form-label text-white">Hostel Description</label>
  <textarea class="form-control" name="hostel_description" id="validationCustom03"  required   aria-describedby="emailHelp"> </textarea>
  
  <div class='invalid-feedback'>
      please enter hostel_description
  </div>
</div>

<div class="mb-3 bg-white p-2 rounded-3">
  <label for="" class="form-label text-white">Hostel Type</label>
  <input type="radio" name="hostel_type" class='ms-2'  value="boy\'s">Girl's
  <input type="radio" name="hostel_type" class='ms-2' value="girl\'s"> Boy's
  <input type="radio" name="hostel_type" class='ms-2' value="general"> General
  <div class='invalid-feedback'>
      please Provide Hostel Type
  </div>
</div>

<div class="mb-3">
  <label for="validationCustom05" class="form-label text-white">Hostel Fees</label>
  <input type="text" class="form-control"  name="hostel_fees" id="validationCustom05"  required  aria-describedby="emailHelp">
  <div class='invalid-feedback'>
      please enter hostel_fees
  </div>

</div>

<div class="mb-3">
  <label for="ValidationCustom08" class="form-label text-white">Hostel Image</label>
  <input type="file" class="form-control border-0 p-3"  name="image" id="ValidationCustom08"  required aria-describedby="emailHelp">
  <div class='invalid-feedback'>
      please enter Image
  </div>
</div>
<div class="mb-3">
  <label for="ValidationCustom09" class="form-label text-white">Food Related Image</label>
  <input type="file" class="form-control border-0 p-3"  name="food" id="ValidationCustom09"  required aria-describedby="emailHelp">
  <div class='invalid-feedback'>
      please enter Food Related Image
  </div>
</div>
<div class="mb-3">
  <label for="ValidationCustom10" class="form-label text-white">Parking Image</label>
  <input type="file" class="form-control border-0 p-3"  name="parking" id="ValidationCustom010"  required aria-describedby="emailHelp">
  <div class='invalid-feedback'>
      please enter Parking Image
  </div>
</div>


<div class="mb-3">
  <label for="student_name" class="form-label text-white">Hostel Address</label>
  <input type="text" class="form-control"  name="hostel_address" id="validationCustom06"  required  aria-describedby="emailHelp">
  <div class='invalid-feedback'>
      please enter hostel_address
  </div>

</div>
<div class="mb-3">
  <label for="student_name" class="form-label text-white">City</label>
  <input type="text" class="form-control"  name="city" id="validationCustom07"  required aria-describedby="emailHelp">
  <div class='invalid-feedback'>
      please enter city
  </div>
</div>

<div class="mb-3">
  <label for="validationCustom11" class="form-label text-white">Owner Name</label>
  <input type="text" class="form-control"  name="owner_name" id="validationCustom11"  required aria-describedby="emailHelp">
  <div class='invalid-feedback'>
      please enter owner_name
  </div>
</div>



<div class="mb-3">
  <label for="validationCustom010" class="form-label text-white">Owner Mobileno</label>
  <input type="text" class="form-control"  name="owner_mobileno" id="validationCustom010"  pattern=[0-9]{1}[0-9]{9}  maxlength="10"  required aria-describedby="emailHelp">
</div>

<div class="mb-3">
  <label for="validationCustom080" class="form-label text-white">Owner Email</label>
  <input type="email" class="form-control"  name="owner_email" id="validationCustom080"  required aria-describedby="emailHelp">
  <div class='invalid-feedback'>
      please enter owner_email
  </div>
</div>

<div class="mb-3">
  <label for="validationCustom12" class="form-label text-white">Owner Password</label>
  <input type="text" class="form-control"  name="owner_password" id="validationCustom12" maxlength="8" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" required aria-describedby="emailHelp">
  <div class='invalid-feedback'>
      please enter owner_password, and it Must contains atleast one number and one uppercase and lowercase letter,and atleast 8 or more characters
  </div>
</div>




<div class="col-12">
                                            <button class="btn btn-primary w-100 py-3" name="submit" type="submit" >Submit</button>
                                        </div>

<!-- <div class="mb-3">
<input type="submit"name="submit"  style=" " class='bg-secondary shadow-lg mt-3  text-white border-0 rounded-3 p-2 px-3 mb-3'  value="submit">
 
</div> -->

</form>
      </div>
    </div>
  </div>
</div>

</div>






<!-- 
<form action="Registationpageinsert.php" method="post">
        <table broder="1">
            <tr>
                <td>student_name</td>
                <td><input type="text" name="student_name">
                </tr>
                <tr>
                <td>parents_no</td>
                <td><input type="text" name="parents_no">
                </tr>
                <tr>
                <td>Gander</td>
                <td><input type="radio" name="Gander" value="Male"> Male

                <input type="radio" name="Gander" value="Female">Female </td>
                </tr>
                <tr>
                <td>Date_of_brith</td>
                <td><input type="datetime" name="Date_of_brith"></td>

                </tr>
                <tr>
                    <td>Address</td>
                    <td><textarea rows="3" cols="25" name="Address1"></textarea></td>

                    </tr>
                    <tr>
                        <td>city</td>
                        <td><input type="text" name="city"></td>
                            
                        </tr>
                        <tr>
                        <td>pincode</td>
                        <td><input type="text" name="pincode"></td>
</tr>

<tr>
                        <td>username</td>
                        <td>
                
                    
<input  type="text" name="uname">
</td>
</tr>
<tr>
    <td>password</td>
    <td>
        <input type="password" name="p">
</td>
</tr>

<tr>
                        <td>email</td>
                        <td>
                
                    
<input  type="text" name="email">
</td>
</tr>
<tr>
    <td>
        <input type="submit"name="submit" value="submit"></td>
        <td><input type="reset" name="reset" value="reset">
</td>
</table>
</from> -->





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


