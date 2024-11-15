
<html>
<head>
    <title>Resigestion page</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>
<body>

<div class="container">
    <div class='row mt-5'>
      <div>
        <h5>Registration Form</h5>
      </div>
    <form action="Registationpageinsert.php" class='mt-3' method="post">
  <div class="mb-3">
    <label for="student_name" class="form-label">student_name</label>
    <input type="text" class="form-control"  name="student_name" id="" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="student_name" class="form-label">parents_no</label>
    <input type="text" class="form-control"  name="parents_no" id="" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="" class="form-label">Gander</label>
    <input type="radio" name="Gander" value="Male"> Male
    <input type="radio" name="Gander" value="Female">Female
  </div>

  <div class="mb-3">
    <label for="student_name" class="form-label">Date_of_brith</label>
    <input type="text" class="form-control"  name="Date_of_brith" id="" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="student_name" class="form-label">Address</label>
    <input type="text" class="form-control"  name="Address1" id="" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="student_name" class="form-label">city</label>
    <input type="text" class="form-control"  name="city" id="" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="student_name" class="form-label">pincode</label>
    <input type="text" class="form-control"  name="pincode" id="" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="student_name" class="form-label">username</label>
    <input type="text" class="form-control"  name="uname" id="" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="student_name" class="form-label">password</label>
    <input type="text" class="form-control"  name="p" id="" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
    <label for="student_name" class="form-label">email</label>
    <input type="text" class="form-control"  name="email" id="" aria-describedby="emailHelp">
  </div>

  <div class="mb-3">
  <input type="submit"name="submit"  style="margin-left: 50%; " class='bg-secondary border-0 rounded-3 p-1 px-3'  value="submit">
   
  </div>
 
 
</form>

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
</body>
</html>



