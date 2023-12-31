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

$sql1 = "SELECT * FROM `review` where applicantid = $id";
$result1 = mysqli_query($con, $sql1);

$sql2 = "SELECT * FROM `jobsapplied` where applicantid = $id";
$result2 = mysqli_query($con, $sql2);
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
        <div class="main-body">

          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">

                    <div class="mt-3">
                      <h4><?php echo $row['firstname'] . $row['lastname'] ?></h4>
                      <p class=" mb-1">Full Stack Developer</p>
                      <p class="text-muted font-size-sm"><?php echo $row['address'] ?></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="card mt-3" style=" width: 100%;">
                <ul class="list-group list-group-flush">
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-globe mr-2 icon-inline">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="2" y1="12" x2="22" y2="12"></line>
                        <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z"></path>
                      </svg>Reviews</h6>
                    <span class=""><?php echo mysqli_num_rows($result1) ?></span>
                  </li>
                  <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                    <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-github mr-2 icon-inline">
                        <path d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22"></path>
                      </svg>Applications</h6>
                    <span class="text"><?php echo mysqli_num_rows($result2) ?></span>
                  </li>
                </ul>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9">
                      <?php echo $row['firstname'] . ' ' . $row['lastname'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9">
                      <?php echo $row['email'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9">
                      <?php echo $row['phone'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9">
                      <?php echo $row['address'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">About</h6>
                    </div>
                    <div class="col-sm-9">
                      <?php echo $row['about'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Age</h6>
                    </div>
                    <div class="col-sm-9">
                      <?php echo $row['age'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">School</h6>
                    </div>
                    <div class="col-sm-9">
                      <?php echo $row['school'] ?>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                      <a class="btn btn-info " target="__blank" href="updateprofile.php">Edit</a>
                    </div>
                  </div>
                </div>
              </div>







            </div>

          </div>
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