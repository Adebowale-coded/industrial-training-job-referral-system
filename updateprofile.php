<?php
session_start();
require("dbconn.php");
if (!isset($_SESSION['role']) && $_SESSION['role'] != "student") {
    header("Location: login.php");
}

$id = $_SESSION['id'];
$sql = "SELECT * FROM `student` where id = $id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

if (isset($_POST['update'])) {
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$about = $_POST['about'];
	$age = $_POST['age'];
	$school = $_POST['school'];

	$sql = "UPDATE `student` SET `firstname`='$firstname',`lastname`='$lastname',`email`='$email',`address`='$address',`phone`='$phone',`about`='$about',`age`='$age',`school`='$school' WHERE id = $id";
	$result = mysqli_query($con, $sql);

	if ($result) {
?>
		<script>
			alert("Profile updated successfully")
			window.location.href = "userprofile.php"
		</script>
	<?php
	} else {
	?>
		<script>
			alert("there was an error")
			window.location.href = window.location.href
		</script>
<?php
	}
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User's Profile | Dashboard</title>
	<link rel="icon" href="img/logo2.png" type="image/x-icon">
	<link href="assets3/css/bootstrap.min.css" rel="stylesheet">
	<script src="assets3/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="font-6/css/all.css">
	<link rel="stylesheet" href="css/dashboard.css">


</head>

<body>
	<div class="d-flex" id="wrapper">

		<div class="text-white" id="sidebar-wrapper" style="background: rgb(0, 0, 0);">

			<div class="sidebar-heading text-center py-4  fs-4 fw-bold ">
				<label class="fw-light" style="color: rgb(255, 255, 255); font-weight: bold; font-family: poppins;">Internship</label>JRS
			</div>

			<div class="list-group list-group-flush my-3">
				<a href="userprofile.php" class="list-group-item list-group-item-action bg-transparent second-text active text-white">
					<i class="fas fa-plus me-2"></i>Profile
				</a>
				<a href="myjobs.php" class="list-group-item list-group-item-action bg-transparent second-text active text-white">
					<i class="fas fa-tachometer-alt me-2"></i>MyJobs
				</a>
				<a href="myreview.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold text-white">
					<i class="fas fa-list me-2"></i>My Review
				</a>

				<a href="logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
					<i class="fas fa-project-diagram me-2"></i>Sign out
				</a>
			</div>

		</div>


		<div id="page-content-wrapper">

			<nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
				<div class="d-flex align-items-center">
					<i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
					<h2 class="fs-2 m-0">Hi <?php echo $row['firstname'] . ' ' . $row['lastname'] ?></h2>
				</div>

			</nav>

			<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />

			<div class="container">
				<div class="row">
					<div class="col-12">
						<!-- Page title -->
						<div class="my-3">
							<h3>My Profile</h3>
							<hr>
						</div>
						<!-- Form START -->
						<form class="file-upload" method="post">
							<div class="row mb-5 gx-5">
								<!-- Contact detail -->
								<div class="col-xxl-8 mb-5 mb-xxl-0">
									<div class="bg-secondary-soft px-4 py-5 rounded">
										<div class="row g-3">
											<h4 class="mb-4 mt-0">Contact detail</h4>
											<!-- First Name -->
											<div class="col-md-6">
												<label class="form-label">First Name *</label>
												<input type="text" class="form-control" placeholder="" aria-label="First name" value="<?php echo $row['firstname'] ?>" name="firstname" required>
											</div>
											<!-- Last name -->
											<div class="col-md-6">
												<label class="form-label">Last Name *</label>
												<input type="text" class="form-control" placeholder="" aria-label="Last name" value="<?php echo $row['lastname'] ?>" name="lastname" required>
											</div>
											<!-- Phone number -->
											<div class="col-md-6">
												<label class="form-label">Phone number *</label>
												<input type="text" class="form-control" placeholder="090 --------" aria-label="Phone number" value="<?php echo $row['phone'] ?>" name="phone" required>
											</div>
											<!-- Email -->
											<div class="col-md-6">
												<label for="inputEmail4" class="form-label">Email *</label>
												<input type="email" class="form-control" id="inputEmail4" placeholder="@gmail.com" value="<?php echo $row['email'] ?>" name="email" required>
											</div>
											<div class="col-md-6">
												<label for="inputEmail4" class="form-label">Address</label>
												<input type="text" class="form-control" id="inputEmail4" placeholder="" value="<?php echo $row['address'] ?>" name="address" required>
											</div>
											<div class="col-md-6">
												<label for="inputEmail4" class="form-label">About</label>
												<input type="text" class="form-control" id="inputEmail4" placeholder="" value="<?php echo $row['about'] ?>" name="about" required>
											</div>
											<div class="col-md-6">
												<label for="inputEmail4" class="form-label">Age</label>
												<input type="text" class="form-control" id="inputEmail4" placeholder="" value="<?php echo $row['age'] ?>" name="age" required>
											</div>
											<div class="col-md-6">
												<label for="inputEmail4" class="form-label">School</label>
												<input type="text" class="form-control" id="inputEmail4" placeholder="" value="<?php echo $row['school'] ?>" name="school" required>
											</div>
										</div> <!-- Row END -->
									</div>
								</div>
							</div> <!-- Row END -->


					</div> <!-- Row END -->
					<!-- button -->
					<div class="gap-3 d-md-flex justify-content-md text-center">
						<button type="submit" class="btn btn-primary btn-lg" name="update">Update profile</button>
					</div>
					</form> <!-- Form END -->
				</div>
			</div>
		</div>








	</div>














	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
	<script>
		var el = document.getElementById("wrapper")
		var toggleButton = document.getElementById("menu-toggle")

		toggleButton.onclick = function() {
			el.classList.toggle("toggled")
		}
	</script>
</body>

</html>