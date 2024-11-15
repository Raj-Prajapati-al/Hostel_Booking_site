<!Doctype Html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


    <style>
        body{
            background:#FAEBD7;
        }
        #fname,#hname{
            text-align:start;
        }
        th,td{
            font-size:15px;
            /* text-align:start; */
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
    </style>
</head>
<body>
    <?php

    include("navbar.php");
    $conn = mysqli_connect("localhost", "root", "", "hms");
    
    if (isset($_GET['feedback_id'])) 
    {
        $user_id = $_GET['feedback_id'];

        $sql = "DELETE FROM  feedback WHERE feedback_id  ='$user_id'";

        $result = $conn->query($sql);

        if ($result == TRUE) 
        {
            echo "  <div id='success' class='mt-2'>
                        Record Deleted SuccessFully.
                    </div>";
        }
        else
        {
            echo "Error:" . $sql . "<br>" . $conn->error;
        }
    } 

?>
    
    <div class="container">
    <!-- <a href="index.php" class='fs-3 mt-3' style='margin-left:90%;'>logout</a> -->
        <h2 class='mt-2'><u>Feedback Details</u></h2>
    <table class="table table-dark table-striped">
    <thead>
    
        <tr><th>FeedBack Id</th><th>Hostel_name</th><th>Feedback Details</th> <th>Manage</th> </tr>

    </thead>
    <tbody>
        <?php

            $sql="SELECT *  FROM feedback join hostel where feedback.hostel_id = hostel.hostel_id  order by hostel_name"; 
            $result = $conn->query($sql);
            $srNo = 0;
                if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) 
                {
                    $srNo++;
        ?>          <tr>
                    <td><?php echo $srNo; ?></td>
                    <td id='hname'><?php echo $row['hostel_name']; ?></td>
                    <td id='fname'><?php echo $row['feedback']; ?></td>
                    
                    <td>
                    <a class="btn btn-danger fs-4"  href="feedbackDisplay.php?feedback_id=<?php echo $row['feedback_id']; ?>">Delete</a></td>
                   

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