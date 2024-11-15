<from action="location.php" method="post">
  <table>
    <tr>

      <?php

      $conn = mysqli_connect("localhost", "root", "", "hms");

      if ($conn == false) {
        die("ERROR: Could not connect. "
          . mysqli_connect_error());
      }


      if (isset($_POST['loc']) && isset($_POST['submit'])) {
        $loc = $_POST['loc'];
        $query = "SELECT * FROM hostel WHERE city='$loc'";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
          $students = mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
          $students = [];
        }
      }
      ?>
      <?php
      if (isset($students) > 0) {
      ?>

        <table class=' table  mt-5 mb-5'>
          <thead>

          </thead>
          <tr>
            <th>Hostelname</th>
            <th>Hosteldescription</th>
            <th>Hosteltype</th>
            <th>Hostelfees</th>
            <th>Hosteldescription</th>
            <th>Hostelfees</th>
          </tr>
          <?php
          if (count($students) > 0) {
            $sn = 1;
            foreach ($students as $student) {
          ?>
              <tbody>
                <tr>
                  <td><img class="img-fluid " src="img/h1.jpg" alt=""> </td>
                </tr>
                <tr>
                  <td> <i class="bi bi-bank2"></i> <b>Hostelname</b> <?php echo $student['hostel_name']; ?></td>
                </tr>

                <tr>
                  <td> <b>hostel_description</b> <?php echo $student['hostel_description']; ?></td>
                </tr>

                <tr>
                  <td> <b>hostel_type</b> <?php echo $student['hostel_type']; ?></td>
                </tr>

                <tr>
                  <td> <b>hostel_fees</b> <?php echo $student['hostel_fees']; ?></td>
                </tr>

                <tr>
                  <td> <b>hostel_address</b> <?php echo $student['hostel_address']; ?></td>
                </tr>

                <tr>
                  <td> <b>city</b> <?php echo $student['city']; ?></td>
                </tr>


                <tr>
                  <td> <a href="Registationpage.php">Book</td>
                  </td>
                </tr>
              </tbody>


          <?php
              $sn++;
            }
          } else {
            echo "<tr><td colspan='3'>No Data Found</td></tr>";
          }
          ?>
        </table>
      <?php
      }
      ?>

</from>
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>