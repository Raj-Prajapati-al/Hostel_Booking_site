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
              <div class='box' >
              <h1>Upload Image Under Below Given Formats...</h1>
              <p>Format => (jpg , png, jpeg) only this format is Accepted...</p>";
    echo "<Button class='link-btn'>Go Back</Button>";
    echo "</div>";
    ?>
  </div>
  <script src="script.js"></script>
</body>

</html>