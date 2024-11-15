<?php   

//$con = mysqli_connect("localhost", "root", "", "hms");
 
// Check connection
// if($con == false){
//     die("ERROR: Could not connect. "
//         . mysqli_connect_error());
// }
//     $username = $_POST['user'];  
//     $password = $_POST['pass'];  
      
//         //to prevent from mysqli injection  
//         $username = stripcslashes($username);  
//         $password = stripcslashes($password);  
//         $username = mysqli_real_escape_string($con, $username);  
//         $password = mysqli_real_escape_string($con, $password);  
//         session_start();
//         $sql = "select *from adminlogin where email = '$username' and Password1 = '$password'";  
//         $result = mysqli_query($con, $sql);  
//         $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
//         $count = mysqli_num_rows($result);  
          
//         if($count == 1){  
//             echo "<h1><center> Login successful </center></h1>";  
//             require("dashboard.php");
//         }  
//         else{  
//             echo "<h1> Login failed. Invalid username or password.</h1>";  
//         }     
//         $con->close();

$username = $_POST['user'];  
$password = $_POST['pass'];  
      
   if($username=="admin" && $password=="admin123")
   {
    require("dashboard.php");
   }
   else{
      header("Location:validation.php");
   }  
   
   ?>  