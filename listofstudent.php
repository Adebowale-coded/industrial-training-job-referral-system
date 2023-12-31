<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>List of Students | Dashboard</title>
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
          <h2 class="fs-2 m-0">Hi user</h2>
        </div>
      </nav>

      <div class="mb-3 ms-5">
        <img src="img/close.jpg" alt="" height="50px">
        <label><Strong style="font-size: 29px;">Dangote PLC</Strong></label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <span class="" style="font-size: 15px;">Ratings: 4/5</span>
      </div>
      
    <div>
       <span class="ms-5" style="font-size: 18px;"><strong>List of Students</strong></span>
        <a href="reviewpg.php"><button class="btn btn-success">Reviews</button></a> 
    </div><hr>

            <div class="container mt-3">
                <div class="table-responsive ms-4 w-100">
                    <table class="table mt-3">
                        <thead style="background-color: rgb(0, 0, 0); color: white;">
                            <tr>
                                <th scope="col">S/N</th>
                                <th scope="col">Student's Name</th>
                                <th scope="col">Job Title</th>
                            </tr>
                        </thead>
                        <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Adegbenga Olusegun</td>
                                        <td>IT Intern</td>
                                    </tr>
                        </tbody>

                        <tbody>
                            <tr>
                                <th scope="row">2</th>
                                <td>Obasanjo David</td>
                                <td>Mass Comm Intern</td>
                            </tr>
                </tbody>
                    </table>
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