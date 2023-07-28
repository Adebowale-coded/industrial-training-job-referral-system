<?php
session_start();
if (isset($_POST['login'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	$member = $_POST['member'];

	require("dbconn.php");
	if ($member == "student") {
		$result = mysqli_query($con, "SELECT * FROM `student` WHERE email = '$email' AND password = '$password'");
		if (mysqli_num_rows($result) > 0) {
			$res = mysqli_fetch_array($result);
			$_SESSION['id'] = $res['id'];
			$_SESSION['firstname'] = $res['firstname'];
			$_SESSION['lastname'] = $res['lastname'];
			$_SESSION['email'] = $res['email'];
			$_SESSION['role'] = $member;
			header("Location: userprofile.php");
		}else {
			?>
			<script>
            alert("No username found !")
            window.location.href = "login.php"
        </script>
		<?php
		}
	} else {
		$result = mysqli_query($con, "SELECT * FROM `company` WHERE email = '$email' AND password = '$password'");
		if (mysqli_num_rows($result)) {
			$res = mysqli_fetch_array($result);
			$_SESSION['name'] = $res['name'];
			$_SESSION['email'] = $res['email'];
			$_SESSION['role'] = $member;
			header("Location: companyprofile.php");
		}else {
			?>
			<script>
            alert("No username found !")
            window.location.href = "login.php"
        </script>
		<?php
		}
	}
}

?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Log In</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="img/lg.png" rel="icon">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">


	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center">
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
			      			<h3 class="mb-4">Log In</h3>
			      		</div>
								
			      	</div>
							<form action="#" class="signin-form" method="post">
			      		<div class="form-group mb-3">
			      			<label class="label" for="name"></label>
			      			<input type="text" class="form-control" placeholder="Email" name="email" required>
			      		</div>
						  <div class="form-group mb-3">
							<label class="label" for="name"></label>
							<select type="text" class="form-control" name="member" required>
								<option value="company">Company</option>
								<option value="student">Student</option>
							</select>
						</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password"></label>
		              <input type="password" class="form-control" placeholder="Password" name="password" required>
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3" name="login">Sign In</button>
		            </div>
		            
		          </form>
		          <p class="text-center">Not a member? <a href="signup.php">Sign Up</a></p>
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

