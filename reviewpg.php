<?php
session_start();
require("dbconn.php");
if (!isset($_SESSION['role']) && $_SESSION['role'] != "student") {
  header("Location: login.php");
}

$id = $_GET["id"];
$sql1 = "SELECT * FROM  `company` WHERE id = $id";
$result1 = mysqli_query($con, $sql1);
$row1 = mysqli_fetch_assoc($result1);

$sql = "SELECT * FROM `review` WHERE companyid = $id";
$result = mysqli_query($con, $sql);
$sql2 = "SELECT * FROM `review` WHERE companyid = $id";
$result2 = mysqli_query($con, $sql2);

$avg = 0;
$rating = 0;
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $avg += $row["rating"];
  }
  $rating = $avg / mysqli_num_rows($result);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reviews | Dashboard</title>
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
          <h2 class="fs-2 m-0">Hi <?php echo $_SESSION['firstname'] .  ' ' . $_SESSION['lastname'] ?></h2>
        </div>
      </nav>

      <div class="mb-3 ms-5">
        <img src="<?php echo $row1["image"] ?>" alt="" height="50px">
        <label><Strong style="font-size: 29px;"><?php echo $row1["name"] ?></Strong></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <span class="" style="font-size: 15px;">Ratings: <?php echo $rating ?>/5</span>
      </div>

      <div class="ms-5">
        <span style="font-size: 18px;">Reviews</span>&nbsp;&nbsp;
        <?php
        $comid = $_GET["id"];
        $n = "SELECT * FROM `jobsapplied` WHERE `companyid` = $comid";
        $r = mysqli_query($con, $n);

        ?>
        <span style="font-size: 18px;">No of applicant: <?php echo mysqli_num_rows($r) ?></span>&nbsp;&nbsp;
      </div>
      <hr>

      <?php
      if (mysqli_num_rows($result) > 0) {
        while ($row2 = mysqli_fetch_assoc($result2)) {
      ?>
          <section class="p-4 p-md-4 text-center text-lg-start shadow-1-strong rounded">
            <div class="row d-flex justify-content-center">
              <div class="col-md-10">
                <div class="card">
                  <div class="card-body m-3">
                    <div class="row">
                      <div class="col-lg-10">
                        <p class="text-muted fw-light mb-3">
                          <?php echo $row2['comments'] ?>
                        </p>
                        <p class="fw-bold lead mb-0"><strong><?php echo $row2['applicantname'] ?></strong></p>
                        <?php
                        $applicantid = $row2['applicantid'];
                        $sql = "SELECT * FROM `student` where id = $applicantid";
                        $result = mysqli_query($con, $sql);
                        $row = mysqli_fetch_array($result);
                        ?>
                        <p class="fw-bold text-muted mb-0"><?php echo $row['school'] ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
      <?php
        }
      } else {
        echo '<p class="text-muted fw-light m-5">No review yet</p>';
      }
      ?>


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