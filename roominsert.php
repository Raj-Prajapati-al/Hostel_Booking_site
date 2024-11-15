<!DOCTYPE html>
<html lang="en">

<head>
	<title>Hostel Booking Site</title>
	<!-- jQuery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- SweetAlert2 -->
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css"> -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

	<!-- Template Stylesheet -->
	<link href="css/style.css" rel="stylesheet">
	<!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->

	<style>
		body {
			/* background-color: aliceblue; */
			font-family: sans-serif;
			text-align: center;
		}

		button {
			background-color: cadetblue;
			color: whitesmoke;
			border: 0;
			-webkit-box-shadow: none;
			box-shadow: none;
			font-size: 15px;
			font-weight: 500;
			border-radius: 8px;
			padding: 12px 30px;
			cursor: pointer;
			white-space: nowrap;
			margin: 8px;
		}

		/* img {
  width: 200px;
} */
		input[type="text"] {
			padding: 12px 10px;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 10px;
			box-sizing: border-box;
		}

		h1 {
			/* border-bottom: solid 2px grey; */
		}

		#success {
			background: green;
		}

		#error {
			background: red;
		}

		#warning {
			background: coral;
		}

		#info {
			background: cornflowerblue;
		}

		#question {
			background: grey;
		}
	</style>



</head>

<body align='center'>
	<!-- <a href="logout_student.php" style='margin-left:90%;'>logout</a> -->
	<a href="session_logout_student.php" class="nav-item nav-link float-end" style="margin-left:62%;margin-right:2rem;background-color:rgb(255,99,71);color:white;box-sizing:border-box;border:2px solid black;padding:5px;border-radius:8px;font-size:15px;margin-top:1rem;">Logout</a>

	<?php

	// servername => localhost
	// username => root
	// password => empty
	// database name => staff
	session_start();
	$idd = $_SESSION['rno'];
	if ($idd) {
	} else {
		header("location:Registationpage.php");
	}

	if (isset($_POST['rno'])) {
		$conn = mysqli_connect("localhost", "root", "", "hms");
	}
	// Check connection
	if ($conn == false) {
		die("ERROR: Could not connect. "
			. mysqli_connect_error());
	}

	if (isset($_SESSION['stu_id'])) {
		$stu_id = $_SESSION['stu_id'];
		$sql = "select * from student where student_id=$stu_id";
	} else {
		$sql = "SELECT  * FROM  student order by student_id  desc LIMIT 1 ";
	}

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
		// output data of each row
		while ($row = $result->fetch_assoc()) {
			$stuid = $row['student_id'];
		}
	} else {
		echo "0 results";
	}

	// Taking all 5 values from the form data(input)
	$room_number =  $_REQUEST['rno'];
	$room_type = $_REQUEST['type'];
	$id = $_REQUEST['loc'];
	$startDate = $_REQUEST['startDate'];
	$duration = $_REQUEST['duration'];
	$paydate = date("Y-m-d");

	// Performing insert query execution
	// here our table name is college

	$month = $_REQUEST['month'];
	$month = preg_replace('/[0-9]+/', null, $month);
	if ($room_type == "ac" && $month == "nonac") {
		header("location:morefifty.php");
	} elseif ($room_type == "nonac" && $month == "ac") {
		header("location:morefifty.php");
	} else {
		$s_validate = "select * from roomdata,student,payment,hostel where roomdata.student_id = $stuid ";
		$qry_result = mysqli_query($conn, $s_validate);
		if (mysqli_num_rows($qry_result) > 0) {
			header("location:already_paid.php");
		} else {
			$month = Date('m', strtotime($startDate));
			$day = Date('d', strtotime($startDate));
			$year = Date('y', strTotime($startDate));
			$year = "20$year";
			if ($duration == "3months") {
				if ($month == 10 || $month == 12 || $month == 11) {
					$year = $year + 01;
					if ($month == 10) {
						$m = "01";
					} elseif ($month == 11) {
						$m = "02";
					} else {
						$m = "03";
					}
				} else {
					$m = $month + "03";
				}
				$End_date = "$year-$m-$day";
			} elseif ($duration == "6months") {
				if ($month == 12 || $month == 10 || $month == 11 || $month == 7 || $month == 8 || $month == 9) {
					$year = $year + 01;
					if ($month == 10) {
						$m = "04";
					} elseif ($month == 11) {
						$m = "05";
					} elseif ($month == 7) {
						$m = "01";
					} elseif ($month == 8) {
						$m = "02";
					} elseif ($month == 9) {
						$m = "03";
					} else {
						$m = "06";
					}
				} else {
					$m = $month + "06";
				}
				$End_date = "$year-$m-$day";
			} else {
				$year = $year + 01;
				$End_date = "$year-$month-$day";
			}
			$sql = "INSERT INTO roomdata (room_number,room_type,hostel_id,startDate,duration,endDate,student_id,date_of_booking)  VALUES ('$room_number','$room_type','$id','$startDate','$duration','$End_date','$stuid','$paydate')";



			if (mysqli_query($conn, $sql)) {

				// echo"<h1>Room Booked succeessfully</h1>";
				require("main2.php");
			} else {
				echo "ERROR: Hush! Sorry $sql. "
					. mysqli_error($conn);
			}
			// if(mysqli_query($conn, $sql) )  {


			//     } else{
			//         // echo "ERROR: Hush! Sorry $sql. "
			//         //     . mysqli_error($conn);
			//     }


			// Close connection
			mysqli_close($conn);

			// else
			// {
			// 	echo "<h3>sorry no data passed....</h3>";
			// }
	?>



			<h2 style="font-family:sans-serif;"><u>Make Your Payment</u></h2>

			<form>

		<?php


			$payment = $_REQUEST['month'];
			$f = $_REQUEST['food'];


			/*if($payment=="3Months"and $f=="Yes")
{
$payment= 3000*2;
}
else if($payment=="6Months" and$f=="Yes")
{
$payment= 6000*2;
}
else if($payment=="12Months" and $f=="Yes")
{
$payment= 12000*2;
}
else
{
$payment= 1000*2;
}*/

			// if($payment=="3Months")
			// {
			// $payment= 3000;
			// }
			// else if($payment=="6Months")
			// {
			// $payment= 6000;
			// }
			// else if($payment=="12Months" )
			// {
			// $payment= 12000;
			// }
			// else
			// {
			// $payment= 1000;
			// }

			// if($f=="Yes")
			// {
			// 	$mpayment=$payment*2;
			// }
			// else{
			// 	$mpayment=$payment;
			// }
			if ($duration == "3months") {
				$payment = (int)$payment;
				if ($f == "Yes") {
					$payment = ($payment * 3) + (2000 * 3);
				} else {
					$payment = $payment * 3;
				}
			} else if ($duration == "6months") {
				$payment = (int)$payment;
				if ($f == "Yes") {
					$payment = ($payment * 6) + (2000 * 6);
				} else {
					$payment = $payment * 6;
				}
			} else if ($duration == "12months") {
				$payment = (int)$payment;
				if ($f == "Yes") {
					$payment = ($payment * 12) + (2000 * 12);
				} else {
					$payment = $payment * 12;
				}
			} else {
				echo "Error.....No payments selcted by the User....";
			}

			/* $servername = "localhost";
 $username = "root";
 $password = " ";
 $dbname = "hms";*/

			// Create connection
			$conn = mysqli_connect("localhost", "root", "", "hms");

			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}
			if (isset($_SESSION['stu_id'])) {
				$stu_id = $_SESSION['stu_id'];
				$sql = "SELECT  * FROM  student where student_id=$stu_id ";
				$sel = "select * from roomdata where student_id=$stu_id";
			} else {
				$sql = "SELECT  * FROM  student order by student_id  desc LIMIT 1 ";
				$sel = "select * from roomdata order by id desc LIMIT 1";
			}
			$rst = $conn->query($sel);

			$result = $conn->query($sql);

			if ($rst->num_rows > 0) {
				while ($rw = $rst->fetch_assoc()) {
					$roomid = $rw['id'];
				}
			}
			if ($result->num_rows > 0) {
				// output data of each row
				while ($row = $result->fetch_assoc()) {
					$stuid = $row['student_id'];
					$name = $row['student_name'];
				}
			} else {
				echo "0 results";
			}

			echo "<div>";

			$paystatus = 'Yes';
			$paymode = 'online';
			$paydate = date("Y-m-d");
			$qry = "insert into payment(student_id,id,payment_amount,payment_date,payment_status,modeofpayment)values('$stuid','$roomid','$payment','$paydate','$paystatus','$paymode')";

			$done = $conn->query($qry);
			if ($done) {
				echo "";
			} else {
				echo "bro it's not done...";
			}
			echo "</div>";
			//  $f=$_REQUEST['food'];
			//  echo "your food".$f;
			$conn->close();
		}
	}
		?>
		<table style='margin-left:auto;margin-right:auto;margin-top:2rem;border-top:2px solid;width:70%;' class='table'>
			<tr>
				<th>Your Name:</th>
				<td>
					<input type='text' id='in' name='pin' value=<?php echo $name ?> style='width:70%;' disabled>
				</td>
			</tr>
			<!-- <tr><th>Hostel Name:</th><td> -->
			<!-- <input type='text' id='pins' name='pin' maxlength='8' value='hname' style='width:70%;' disabled></td></tr>  -->
			<tr>
				<th>Your Amount:</th>
				<td>
					<input type='text' id='pin' name='pin' maxlength='8' value=<?php echo $payment ?> style='width:70%;' disabled>
				</td>
			</tr>

		</table>
		<!-- <input type="reset" value="Reset">
  <input type="submit" value="Submit">  -->
		<br>
		<button type="reset" id="success" style="border-radius:10px;"> Payment Here </button>


			</form>


			<!-- <div>
      
      <button  type="reset" id="success">Payment Here</button>
     
    </div>
    -->


			<script>
				// Alert Modal Type
				$(document).on('click', '#success', function(e) {
					swal(
						'Success',
						'payment <b style="color:green;">successfully </b> !',
						'success'
					)
				});

				$(document).on('click', '#error', function(e) {
					swal(
						'Error!',
						'You clicked the <b style="color:red;">error</b> button!',
						'error'
					)
				});

				$(document).on('click', '#warning', function(e) {
					swal(
						'Warning!',
						'You clicked the <b style="color:coral;">warning</b> button!',
						'warning'
					)
				});

				$(document).on('click', '#info', function(e) {
					swal(
						'Info!',
						'You clicked the <b style="color:cornflowerblue;">info</b> button!',
						'info'
					)
				});

				$(document).on('click', '#question', function(e) {
					swal(
						'Question!',
						'You clicked the <b style="color:grey;">question</b> button!',
						'question'
					)
				});

				// Alert With Custom Icon and Background Image
				$(document).on('click', '#icon', function(event) {
					swal({
						title: 'Custom icon!',
						text: 'Alert with a custom image.',
						imageUrl: 'https://image.shutterstock.com/z/stock-vector--exclamation-mark-exclamation-mark-hazard-warning-symbol-flat-design-style-vector-eps-444778462.jpg',
						imageWidth: 200,
						imageHeight: 200,
						imageAlt: 'Custom image',
						animation: false
					})
				});

				$(document).on('click', '#image', function(event) {
					swal({
						title: 'Custom background image, width and padding.',
						width: 700,
						padding: 150,
						background: '#fff url(https://image.shutterstock.com/z/stock-vector--exclamation-mark-exclamation-mark-hazard-warning-symbol-flat-design-style-vector-eps-444778462.jpg)'
					})
				});

				// Alert With Input Type
				$(document).on('click', '#subscribe', function(e) {
					swal({
						title: 'Submit email to subscribe',
						input: 'email',
						inputPlaceholder: 'Example@email.xxx',
						showCancelButton: true,
						confirmButtonText: 'Submit',
						showLoaderOnConfirm: true,
						preConfirm: (email) => {
							return new Promise((resolve) => {
								setTimeout(() => {
									if (email === 'example@email.com') {
										swal.showValidationError(
											'This email is already taken.'
										)
									}
									resolve()
								}, 2000)
							})
						},
						allowOutsideClick: false
					}).then((result) => {
						if (result.value) {
							swal({
								type: 'success',
								title: 'Thank you for subscribe!',
								html: 'Submitted email: ' + result.value
							})
						}
					})
				});

				// Alert Redirect to Another Link
				$(document).on('click', '#link', function(e) {
					swal({
							title: "Are you sure?",
							text: "You will be redirected to https://utopian.io",
							type: "warning",
							confirmButtonText: "Yes, visit link!",
							showCancelButton: true
						})
						.then((result) => {
							if (result.value) {
								window.location = 'https://utopian.io';
							} else if (result.dismiss === 'cancel') {
								swal(
									'Cancelled',
									'Your stay here :)',
									'error'
								)
							}
						})
				});
			</script>

</body>

</html>