<?php
// require("meun.php");
$conn = mysqli_connect("localhost", "root", "", "hms");

include("navbar.php");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Database</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <style>
        table .hname,.haddress,.hdesc{
            text-align:left;
        }
         .success{
            background-color: green; 
            color:#fff; 
            text-align:center;
            font-size:1.2rem;
            padding: 5px;
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

    <div class="container mt-2">
        <h1><u>Hostel Details</u></h1><br>
        <table class="table table-dark table-striped table-bordered fs-4">
            <thead>
            <tr>
                <th>SrNo.</th>
                <th>Hostel Name</th>
                <th>Hostel Description</th>
                <th>Hostel Type</th>
                <th>Hostel Fees</th>
                <th>Hostel Address</th>
                <th>Action</th>
        </tr>
        </thead>
        <tbody>

    
        <?php
                //when data is submitted this section will delete the hostel
                if (isset($_GET['hostel_id'])) 
                {

                    $hostel_id = $_GET['hostel_id'];
                
                    $sql = "DELETE FROM `hostel` WHERE `hostel_id`='$hostel_id'";
                
                     $result = $conn->query($sql);
                
                    if ($result == TRUE) 
                    {
                        echo "<div id='success'>
                                    Hostel Deleted successfully.
                                </div>";
                    }
                    else{
                        echo "Error:" . $sql . "<br>" . $conn->error;
                    }
                
                }                 

               $sql="SELECT *  FROM hostel"; 
               $result = $conn->query($sql);
               $srNo = 0;
                if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()){
                    $srNo++;
        ?>
                    <tr>
                    <td><?php echo $srNo; ?></td>
                    <td class='hname'><?php echo $row['hostel_name']; ?></td>
                    <td class='hdesc'><?php echo $row['hostel_description']; ?></td>
                    <td><?php echo $row['hostel_type']; ?></td>
                    <td><?php echo $row['hostel_fees']; ?></td>
                    <td class='haddress'><?php echo $row['hostel_address']; ?></td>
                    
                    <td>
                    <a class="btn btn-danger" href="hostelDisplay.php?hostel_id=<?php echo $row['hostel_id']; ?>">Delete</a></td>
                   
                    </tr>
        <?php       }
            }
        ?>
    </tbody>
</table>
    </div>

<script>
    let success = document.querySelector("#success");
    success.classList.add("success");
        setTimeout(() => {
            success.remove();
    }, 3000);
</script>
</body>
</html>