<!DOCTYPE html>
<html lang="en">

<head>
	<title>How to use and customize SweetAlert2</title>
	<!-- jQuery -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<!-- SweetAlert2 -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.2.0/sweetalert2.all.min.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


	<style>
		body {
			background-color: aliceblue;
			font-family: sans-serif;
			text-align: center;
		}

		button {
			background-color: cadetblue;
			color: whitesmoke;
			border: 0;
			-webkit-box-shadow: none;
			box-shadow: none;
			font-size: 18px;
			font-weight: 500;
			border-radius: 7px;
			padding: 15px 35px;
			cursor: pointer;
			white-space: nowrap;
			margin: 10px;
		}

		img {
			width: 200px;
		}

		input[type="text"] {
			padding: 12px 20px;
			display: inline-block;
			border: 1px solid #ccc;
			border-radius: 10px;
			box-sizing: border-box;
		}

		h1 {
			border-bottom: solid 2px grey;
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

<body>
	<a href="logout_student.php" style='margin-left:90%;'>logout</a>


	<h3>Cancel Your Booking</h3>


	<form action="">
		<label for="email">Enter your name:</label>
		<input type="text" id="email" name="email" required><br><br>

		<label for="pin">Enter your password:</label>
		<input type="text" id="pin" name="pin" required><br><br>

		<button type="submit" id="success">Cancel Booking</button>

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
				'your Hostel Booking cancel <b style="color:green;">successfully </b> !',
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