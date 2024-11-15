<html>  
<head>  
    <title>PHP login system</title>  
    
    <link rel = "stylesheet" type = "text/css" href = "style.css"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

  </head>  
</head>  
<body>

<?php
session_start();
$_SESSION['superid']="super";
?> 

<div class='container'>
    <div class='row d-flex justify-content-center mt-5'>
    <div class="card mb-3">
  <div class="row g-0" style='background-image: linear-gradient(red, yellow);'>
    <div class="col-md-6">
     
      <img src=" https://www.nicepng.com/png/detail/263-2636180_admin-login-png-admin-login-image-png.png" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-6">
      <div class="card-body">
                        <form name="f1"  class='mt-3 mb-3' action = "authentication.php" onsubmit = "return validation()" method = "POST">  
                            <p>  
                                <label> UserName: </label>  
                                <input type = "text" id ="user" class="form-control" name  = "user" />  
                            </p>  
                            <p>  
                                <label> Password: </label>  
                                <input type = "password" id ="pass"  class="form-control" name  = "pass" />  
                            </p>  
                            <p>     
                                <input type ="submit" id ="btn" class='primary-btn ' value ="Login" />  
                            </p>  
                        </form> 
      </div>
    </div>
  </div>
</div>




    
    <script>  
            function validation()  
            {  
                var id=document.f1.user.value;  
                var ps=document.f1.pass.value;  
                if(id.length=="" && ps.length=="") {  
                    alert("User Name and Password fields are empty");  
                    return false;  
                }  
                else  
                {  
                    if(id.length=="") {  
                        alert("User Name is empty");  
                        return false;  
                    }   
                    if (ps.length=="") {  
                    alert("Password field is empty");  
                    return false;  
                    }  
                }                             
            }  
        </script>  
</body>     
</html>  