<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    :root{
      --family:Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }
    *{
      margin:0;
      padding: 0;
      box-sizing:border-box;
    }
    .flex-box{
        min-height:100vh;
        display: flex;
        align-items:center;
    }
    .box{
      width:80vw;
      min-height:50vh;
      display:flex;
      flex-direction:column;
      align-items:center;
      justify-content:center;
      margin:0 auto;
      box-sizing:border-box;
      border:2px solid #fff;
      border-radius:5px;
      padding:1rem;
      background-color:lightgrey;
      gap:1rem;
      font-family: var(--family);
      box-shadow: 12px 12px grey;
    }
    .box h1{
        font-size:2rem;
        color:red;
        text-align:center;
        /* font-family: var(--family); */
    }
    .box p{
      font-size:30px;
      padding:1rem;
      text-align:center;
    }
     .box .link-btn{
      font-family: var(--family);
      border:2px solid grey;
      border-radius:5px;
      background-color: #000;
      color:#fff;
      text-decoration:none;
      padding:5px;
    }
    .box .link-btn:hover{
      opacity:0.8;
      text-decoration:underline;
      font-weight:bold;
    }
  </style>
</head>
<body>
    <div class="flex-box">
      <?php
            echo " 
              <div class='box' '>
              <h1> You are not a admin</h1>
              <p>
                Please Enter valid login credentials
              </p>";
              echo"<a class='link-btn' href=index.php> Admin Login</a> ";
              
              echo "</div>";
      ?>
    </div>
</body>
</html>




