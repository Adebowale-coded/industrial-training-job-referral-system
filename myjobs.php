<?php
require("dbconn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyJobs | Dashboard</title>
    <link rel="icon" href="img/logo2.png" type="image/x-icon">
    <link href="assets3/css/bootstrap.min.css" rel="stylesheet">
    <script src="assets3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                <h2 class="fs-2 m-0">Hi User</h2>
            </div>

        </nav>

        <!--<nav class="m-auto">
            <div class="dropdown">
                <button class="btn  dropdown-toggle" type="button" id="dropdownMenu2" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fas fa-user me-2"></i>
                </button>
                <ul style="" class="dropdown-menu" aria-labelledby="dropdownMenu2">
                  <li><button class="dropdown-item" type="button">Profile</button></li>
                  <li><button class="dropdown-item" type="button">My Jobs</button></li>
                  <li><button class="dropdown-item" type="button">My Review</button></li>
                  <li><button class="dropdown-item" type="button">Sign Out</button></li>
                </ul>
              </div>
        </nav>-->

        
        <div class="ms-3">
            <h4> My Jobs</h3>
            <a href="jobs.php"><button class="btn btn-primary">Find Jobs</button></a>
        </div>
        
    <div class="container mt-3">
        <div class="table-responsive ms-4 w-100">
            <table class="table mt-3 ">
                <thead style="background-color: rgb(0, 0, 0); color: white;">
                  <tr>
                    <th scope="col">S/N</th>
                    <th scope="col">Company's Name</th>
                    <th scope="col">Date Applied</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead> 
                <tbody>
                    <?php
                    $sql = "SELECT * FROM `jobsapplied` where applicantid = ''";
                    $result = mysqli_query($con, $sql);
                    if(mysqli_num_rows($result) > 0){
                        while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                      <tr>
                        <th scope="row"><?php echo $row['id'] ?></th>
                        <td><?php echo $row['companyname'] ?></td>
                        <td><?php echo $row['dateapplied'] ?></td>
                        <td><?php echo $row['status'] ?></td>
                      </tr>
                        <?php
                        }
                    }else {
                        echo "<tr><td>No record found</td></tr>";
                    }
                        ?>
                    </tbody>
                  </table>
                  </div>
    </div>

        



    </div>


        











    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script>
        var el = document.getElementById("wrapper")
        var toggleButton = document.getElementById("menu-toggle")

        toggleButton.onclick = function (){
            el.classList.toggle("toggled")
        }
    </script>
</body>
</html>