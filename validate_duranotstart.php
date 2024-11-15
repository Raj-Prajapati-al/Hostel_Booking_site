<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    :root {
      --family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
    }

    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background: grey;
    }

    .flex-box {
      min-height: 100vh;
      display: flex;
      align-items: center;
    }

    .box {
      width: 80vw;
      min-height: 50vh;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      margin: 0 auto;
      box-sizing: border-box;
      border: 2px solid #fff;
      border-radius: 5px;
      padding: 1rem;
      background-color: lightgrey;
      gap: 1rem;
      font-family: var(--family);
      box-shadow: 12px 12px darkgrey;
    }

    .box h1 {
      font-size: 1.7rem;
      color: #F00;
      text-align: center;
      /* font-family: var(--family); */
    }

    .box p {
      font-size: 25px;
      padding: 1rem;
      text-align: center;
    }

    .box .link-btn {
      font-family: var(--family);
      border: 2px solid grey;
      border-radius: 5px;
      background-color: #000;
      color: #fff;
      text-decoration: none;
      padding: 5px;
      font-size: 1rem;
      cursor: pointer;
    }

    .box .link-btn:hover {
      opacity: 0.8;
      text-decoration: underline;
      font-weight: bold;
    }
  </style>
</head>

<body>
  <div class="flex-box">
    <?php
    echo " 
              <div class='box'>
              <h1>Student's are not started Statying in your hostel,</h1>
              <p>So There is no Data Here, Sorry...</p>";
    echo "<button class = 'link-btn'>Go Back</button>";
    echo "</div>";
    ?>
  </div>
</body>
<script src="script.js"></script>

</html>