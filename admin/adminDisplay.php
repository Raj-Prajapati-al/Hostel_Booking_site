<?php
$conn = mysqli_connect("localhost", "root", "", "hms");
 include('navbar.php');
?>



<!DOCTYPE html>
<html>
<head>
    <title>Student Database</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

</head>
<body>

    <div class="container mt-2">


        <h1><u>Owner Details</u></h1>
<table class="table table-dark table-striped table-bordered fs-4" >
   
    <thead>
    
    <tr>
        <th>SrNo.</th>
        <th>Email Id</th>
        <th>Password</th>
        <th>Manage</th>
    </tr>

    </thead>
    <tbody>
        <?php

                $sql="SELECT *  FROM  hostelowner"; 
                $result = $conn->query($sql);

                $srNo = 0;
                if (mysqli_num_rows($result) > 0) {
                while ($row = $result->fetch_assoc()) {
                    $srNo++;
        ?>
                    <tr>
                    <td><?php echo $srNo; ?></td>
                    <td><?php echo $row['owner_email']; ?></td>
                    <td><?php echo $row['owner_password']; ?></td>
                    
                    <td>
                    <a class="btn btn-info" href="updateAdmin.php?hostalid=<?php echo $row['hostelowner_id']; ?>"><h4>Edit</h4></a>
                    <!-- <a class="btn btn-danger" href="deleteAdmin.php?hostalid=
                     echo $row['hostelowner_id']; ">Delete</a></td> -->
                  
                    </tr>
        <?php       }
            }
            
        ?>
    </tbody>
</table>
    </div>
</body>
</html>