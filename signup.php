<?php
if (isset($_POST['register'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	$member = $_POST['member'];

	require("dbconn.php");
	if ($member == "student") {
		$check = mysqli_query($con, "SELECT `email` FROM `student` WHERE email = '$email'");
		if ($check) {
?>
			<script>
				alert("User already exist");
				window.location.href = 'signup.php'
			</script>
		<?php
		} else {
			$result = mysqli_query($con, "INSERT INTO `student`(`firstname`, `lastname`, `email`, `address`, `phone`, `password`, `about`, `age`, `school`) VALUES ('','','$email','','','$password','','','')");
		}
	} else {
		if ($check) {
		?>
			<script>
				alert("User already exist");
				window.location.href = 'signup.php'
			</script>
		<?php
		} else {
			$result = mysqli_query($con, "INSERT INTO `company`(`name`, `email`, `phone`, `address`, `password`, `image`, `facebook`, `instagram`, `twitter`, `linkedin`, `website`) VALUES ('','$email','$password','','','','','','','','')");
		}
	}
	if ($result) {
		?>
		<script>
			alert("Registration Successful");
			window.location.href = 'login.php'
		</script>
	<?php
	} else {
	?>
		<script>
			alert("An error occured");
		</script>
<?php
	}
}
?>

<!doctype html>
<html lang="en">

<head>
	<title>Sign Up</title>
	<meta charset="utf-8">
	<link href="img/lg.png" rel="icon">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" href="css/style.css">

</head>

<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section"></h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="img" style="background-image: url(img/office.jpg);">
						</div>
						<div class="login-wrap p-4 p-md-5">
							<div class="d-flex">
								<div class="w-100">
									<h3 class="mb-2">Sign Up</h3>
								</div>

							</div>
							<form action="" class="signin-form" method="post">
								<div class="form-group mb-2">
									<label class="label" for="name"></label>
									<input type="text" class="form-control" placeholder="Email" name="email" required>
								</div>
								<div class="form-group mb-1">
									<label class="label" for="name"></label>
									<select type="text" class="form-control" name="member" required>
										<option value="company">Company</option>
										<option value="student">Student</option>
									</select>
								</div>
								<div class="form-group mb-1">
									<label class="label" for="password"></label>
									<input type="password" class="form-control" placeholder="Password" name="password" required>
								</div>
								<div class="form-group">
									<button type="submit" class="form-control btn btn-primary rounded submit px-3" style="background-color: #e43c5c;" name="register">Sign Up</button>
								</div>
								<div class="form-group d-md-flex">
									<div class="w-50 text-left">

									</div>

								</div>
							</form>
							<p class="text-center">Already a member? <a href="login.php">Log In</a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
	<script src="js/popper.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/main.js"></script>

</body>

</html>