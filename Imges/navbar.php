<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>hostel management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

<style>
.container {
  position: relative;
  text-align: center;
  color: black;
}

    .centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
</style>

  </head>
  <body>

<div class="row">
<nav class=" navbar navbar-expand-lg bg-secondary">
  <div class="container-fluid">
   
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active ms-5 text-white" aria-current="page" href="hostal_insert.php">Hostal</a>
        </li>
        <li class="nav-item">
          <a class="nav-link ms-5 text-white" href="location_insert.php">Location</a>
        </li>
        <li class="nav-item dropdown ms-5 ">
        <a class="nav-link text-white" href="logout.php">Logout</a>
          
         
        </li>
       
      </ul>
      <!--<form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      
  
  
   // Create connection
  /* $conn = mysqli_connect("localhost", "root", "", "hms");
   
   // Check connection
   if ($conn->connect_error) {
     die("Connection failed: " . $conn->connect_error);
   }
   
   $sql = "SELECT  DISTINCT location_name FROM  location";
   $result = $conn->query($sql);
   
   echo "<select name=loc>";
   while ($row = $result->fetch_assoc()) {
     echo "<option value='" . $row['location_name'] . "'>" . $row['location_name'] . "</option>";
   }
   echo "</select>";
   
   $conn->close();
   ?>-->
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>