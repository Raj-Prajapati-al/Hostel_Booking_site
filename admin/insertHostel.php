<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> 
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
 
    <style>
       table th{
           text-align:center; 
        }
      .fonth1{
        font-family:roman;
        text-decoration:underline;
      }
     .success{
            background-color: green; 
            color:#fff; 
            text-align:center;
            font-size:1.1rem;
            padding: 5px;
            animation: transition 3s ease 1s 1; 
            margin-top:0;
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
    include("navbar.php");
    // servername => localhost
    // username => root
    // password => empty
    // database name => staff
    $conn = mysqli_connect("localhost", "root", "", "hms");
    
    // Check connection
    if($conn == false)
    {
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
    }

//Here Below  all  values from the form(input) are stored in variables.

    $hostel_name =  $_POST['hostel_name'];
    //$last_name = $_REQUEST['last_name'];
    //$gender =  $_REQUEST['gender'];
    $hostel_description = $_POST['hostel_description'];
    $hostel_type = $_POST['hostel_type'];
    $hostel_fees = $_POST['hostel_fees'];
    $hostel_address = $_POST['hostel_address'];
    $city=$_POST['city'];
    $owner_name = $_POST['owner_name'];
    $owner_email = $_POST['owner_email'];
    $owner_password=$_POST['owner_password'];
    $owner_mobileno = $_POST['owner_mobileno'];

    $targetDir ="Imges/";

    //The Below Three variable is Created for storing Uploaded Files in the database.
    $targetFile = $targetDir . basename($_FILES["image"]["name"]); 
    $tgt    =   $targetDir.basename($_FILES["food"]["name"]);
    $tgh    =   $targetDir.basename($_FILES["parking"]["name"]);

    //The Below 3 lines code is for preparing variables for storing uploaded files in Our Directory.
    $targetFile_tmpname = "../imges/" . basename($_FILES["image"]["name"]); 
    $tgt_tmpname  =  "../imges/" . basename($_FILES["food"]["name"]);
    $tgh_tmpname  =  "../imges/" . basename($_FILES["parking"]["name"]);

//Validating Hostel'Details if there already same Exists

$Hostel_qry = "select * from hostel where hostel_name = '".$hostel_name."' and hostel_address = '".$hostel_address."' and hostel_type = '".$hostel_type."' ";

    $Hostel_qry_result = mysqli_query($conn,$Hostel_qry);

if(mysqli_num_rows($Hostel_qry_result) > 0)
{
    // Data Entry Restricted.
}
else
{

    // Hostel Table Data Entry Starts

    $sql2 = "INSERT INTO hostelowner (owner_name,owner_email,owner_password,owner_mobileno)  VALUES ('$owner_name','$owner_email', '$owner_password','$owner_mobileno')";  

    if(mysqli_query($conn, $sql2) )  
    {
        // echo"<h1>congratulations! New  business partner add grow your business!!!!</h1>";
    }
    else
    {
        echo "ERROR: Hush! Sorry $sql2."
            . mysqli_error($conn);
    }
// Hostel Table Data Entry Ends

//Fetching Hostel_owner's id from hostelowner table for storing that id into Hostel Table as a foreign key

    $sl="select * from hostelowner  order by hostelowner_id desc LIMIT 1"; 
    $rst=mysqli_query($conn,$sl);
    if(mysqli_num_rows($rst)>0)
    {
       while($rw=mysqli_fetch_assoc($rst))
       {
           $id=$rw['hostelowner_id'];
       }
    }
//Fetching Complete for hostelowner id

//Hostel Table Data Entry Query Starts

    $sql="INSERT INTO `hostel`(`hostel_name`, `hostel_description`, `hostel_type`, `hostel_fees`, `hostel_address`, `city`,`hostelowner_id`,`hostel_photo_path`) VALUES ('$hostel_name','$hostel_description','$hostel_type','$hostel_fees','$hostel_address','$city','$id','$targetFile')";

    if(mysqli_query($conn,$sql) )  
    {
        echo"<div class='success'>congratulations! New Hostel is Added.!!!!</div>";
    } 
    else
    {
        echo "ERROR: Hush! Sorry $sql. ". mysqli_error($conn);
    }
//Hostel Table Data Entry Query Ends

//Feching Hostel id for using it as foreign key in Image Table
    
    $sel="select * from hostel  order by hostel_id desc LIMIT 1"; 
    $rslt=mysqli_query($conn,$sel);
    if(mysqli_num_rows($rslt)>0)
    {
        while($rww=mysqli_fetch_assoc($rslt))
        {
            $hostel_id=$rww['hostel_id'];
        }
    }
//Fetching Complete for Hostel_id.

//Moving Images to Directory
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile_tmpname)&& move_uploaded_file($_FILES["food"]["tmp_name"],$tgt_tmpname)&&move_uploaded_file($_FILES["parking"]["tmp_name"], $tgh_tmpname)) 
    {
//Image Table Data Entry Starts

            $insertQuery = "INSERT INTO image(hostel_id,hostel_img,food,parking) VALUES ('$hostel_id','$targetFile', '$tgt','$tgh')";
            
            $conn->query($insertQuery);
            // echo "<h1>Image and Hostel Added  Successfully..</h1>";
    }
    else
    {
        echo "ERROR: Hush! Sorry $sql. "
            . mysqli_error($conn);
    }
//Image Table Data Entry Ends 

}
//Validation Ends for same Hostel Data  
?>

<!-- The Select query for Displaying Inserted Hostel -->
<?php
    
    $conn = mysqli_connect("localhost", "root", "", "hms");

    // Check connection
    if($conn == false){
        die("ERROR: Could not connect. "
            . mysqli_connect_error());
    }
    $sql="SELECT *  FROM hostel"; 
    $result = $conn->query($sql);
    $sr = 0;
    echo"<center><h1 class='fonth1'>Our Partner's</h1></center>";
    echo "<div class='conatiner mt-2'>
        <table class= 'table table-dark table-striped table-bordered'>
        <tr>
            <th>Sr.No</th><th>HostelName</th><th>HostelDescription</th>
            <th>HostelType</th><th>HostelFees</th>
            <th>HostelAddress</th> 
        </tr>";

    if ($result->num_rows > 0) 
    {
        // output data of each row
        while($row = $result->fetch_assoc())
        {   $sr++;
            echo "<tr ><td>$sr</td><td>$row[hostel_name]</td><td>$row[hostel_description]</td><td>$row[hostel_type]</td><td>$row[hostel_fees]</td><td>$row[hostel_address]</td></tr>";
        }
        echo "</table>
        </div>";
    }
    else 
    {
        echo "0 results";
    }
    $conn->close();
 
?>

<script>
    let success = document.querySelector("#success");
    success.classList.add("success");
        setTimeout(() => {
            success.remove();
    }, 3000);
</script>
</body>
</html>