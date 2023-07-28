<?php
session_start();
require("dbconn.php");

$id = $_SESSION['id'];

if (isset($_POST['submit'])) {
  $jobtitle = $_POST['jobtitle'];
  $location = $_POST['location'];
  $salary = $_POST['salary'];
  $type = $_POST['type'];
  $jobrole = $_POST['jobrole'];
  $deadline = $_POST['deadline'];

  $image= addslashes(file_get_contents($_FILES['jobimage']['tmp_name']));
					$image_name= addslashes($_FILES['jobimage']['name']);
					$image_size= getimagesize($_FILES['jobimage']['tmp_name']);
		
					move_uploaded_file($_FILES["jobimage"]["tmp_name"],"img/" . $_FILES["jobimage"]["name"]);			
					$imagelocation="img/" . $_FILES["jobimage"]["name"];

  $sql = "INSERT INTO `offers`(`companyid`, `image`, `jobtitle`, `location`, `salary`, `type`, `jobrole`, `deadline`) 
  VALUES ('$id','$imagelocation','$jobtitle','$location','$salary','$type','$jobrole','$deadline')";
  $result = mysqli_query($con, $sql);

  if ($result) {
?>
    <script>
      alert("Job posted successfully")
      window.location.href = "companyjobs.php"
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
  <title>Company | Post Job</title>
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
        <a href="postjob.php" class="list-group-item list-group-item-action bg-transparent second-text active text-white">
          <i class="fas fa-plus me-2"></i>Post a Job
        </a>
        <a href="companyjobs.php" class="list-group-item list-group-item-action bg-transparent second-text active text-white">
          <i class="fas fa-tachometer-alt me-2"></i>Jobs
        </a>
        <a href="companyreview.php" class="list-group-item list-group-item-action bg-transparent second-text active text-white">
          <i class="fas fa-tachometer-alt me-2"></i>Reviews
        </a>
        <a href="candidates.php" class="list-group-item list-group-item-action bg-transparent second-text fw-bold text-white">
          <i class="fas fa-paperclip me-2"></i> Candidates
        </a>
        <a href="logout.php" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
          <i class="fas fa-project-diagram me-2"></i>Log out
        </a>
      </div>

    </div>


    <div id="page-content-wrapper">

      <nav class="navbar navbar-expand-lg navbar-light bg-transparent py-4 px-4">
        <div class="d-flex align-items-center">
          <i class="fas fa-align-left primary-text fs-4 me-3" id="menu-toggle"></i>
          <h2 class="fs-2 m-0">Hi User</h2>
        </div>

      </nav>

      <!--After the dashboard nav-->
      <!--<div class="container mt-5" style="padding: 5%; border-radius: 10px; background-color: #f17f94   ;">
          <h2>Your Employer Account</h2>
        </div>-->
      <form class="container flex-column mt-3 ms-2" style="width: 100%;" method="post" enctype = "multipart/form-data">
        <div class="heading" style="color: white; font-size: 10px;">
          <h5>Post a Job</h5>
        </div>

        <div class="mb-3">
          <label class="form-label">Image</label>
          <input type="file" class="form-control" name="jobimage" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Job Title</label>
          <input type="text" class="form-control" placeholder="" name="jobtitle" required>
        </div>

        <div class="mb-3">
          <label class="form-label">What type of job is it? </label>
          <select type="select" class="form-control" name="type" required>
            <option value="Full-Time">Full Time </option>
            <option value="Part-Time">Part Time</option>
            <option value="Temporary">Temporary</option>
            <option value="Contract">Contract</option>
            <option value="Internship">Internship</option>
            <option value="Commission">Commission</option>
            <option value="Graduate Trainee">Graduate Trainee</option>
          </select>
        </div>

        <div class=" flex-column mt-2" style="width: 100%;">
          <div class="heading" style=" color: white; font-size: 10px;">
            <h5>Job Details</h5>
          </div>
          <div class="mb-3">
            <label class="form-label">Job Description/Role/Requirements</label><br>
            <p class="text-danger text-uppercase small">NOTE: Kindly end each point with a semicolon(;)</p>
            <textarea class="form-control" name="jobrole" required></textarea>
          </div>
          <div class="mb-3 row">
            <div class="col">
              <label class="form-label">Salary</label>
              <input type="text" class="form-control" name="salary" placeholder="₦" required>
            </div>
            <div class="col">
              <label class="form-label">Location</label>
              <input type="text" class="form-control" name="location" required>
            </div>
            <div class="col">
              <label class="form-label">Deadline</label>
              <input type="date" class="form-control" name="deadline" required>
            </div>
          </div>


          <!-- <div class="mb-3">
            <label class="form-label">Upload a PDF or a DOCX</label>
            <input type="file" class="form-control" name="" required>
          </div> -->

          <button type="submit" class="btn btn-primary" name="submit">Post</button>
      </form>





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