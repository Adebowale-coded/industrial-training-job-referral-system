<?php
require("dbconn.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jobs | Dashboard</title>
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
            <a href="updateprofile.html" class="list-group-item list-group-item-action bg-transparent second-text active text-white" >
                <i class="fas fa-plus me-2"></i>Profile
            </a>
            <a href="" class="list-group-item list-group-item-action bg-transparent second-text active text-white" >
            <i class="fas fa-tachometer-alt me-2"></i>MyJobs
            </a>
            <a href="" class="list-group-item list-group-item-action bg-transparent second-text fw-bold text-white">
            <i class="fas fa-list me-2"></i>My Review
            </a>
            
            <a href="" class="list-group-item list-group-item-action bg-transparent text-danger fw-bold">
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

        

        
       <div class="container mt-3">
        <div class="card " style="background-color: rgb(203, 206, 206);">
            <div class="row">
                <div class="col-md-4">
                    <img src="img/close.jpg" class="img-fluid"/>
                </div>
                <div class="col-md-8 pt-4 first">
                    <h3><strong>Gooro Internship program</strong></h3>
                    <p>Gooro Consulting Limited</p>
                    <p>Lagos | <strong style="font-size: 12px;">Part Time +2</strong></p>
                    <div>
                        <span>This Role is for</span>
                        <ul>
                            <li>Anyone who wants to grow their career but is still struggling to gain practical experience</li>
                            <li>Anyone who wants to secure job experience for better positioning in the job market</li>
                            <li>Anyone who already understands and implements the concepts but...<span style="font-style: italic; cursor: pointer; text-decoration: none;"><a href="onepgjob.html">View More</a></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--second css card--> <!--second css card--> <!--second css card--> <!--second css card-->
    <div class="container mt-2">
        <div class="card" style="background-color: rgb(203, 206, 206);">
            <div class="row">
                <div class="col-md-4">
                    <img src="img/close.jpg" class="img-fluid"/>
                </div>
                <div class="col-md-8 pt-4 first" >
                    <h3 ><strong>ZOHO One Tech Expert</strong></h3>
                    <p>Sterlings Career Limited</p>
                    <p>Lagos | <strong style="font-size: 12px;">Contract</strong></p>
                    <div>
                        <span>This Role is for</span>
                        <ul>
                            <li>Anyone who wants to grow their career but is still struggling to gain practical experience</li>
                            <li>Anyone who wants to secure job experience for better positioning in the job market</li>
                            <li>Anyone who already understands and implements the concepts but...<span style="font-style: italic; cursor: pointer; text-decoration: none;"><a href="onepgjob.html">View More</a></span></li>
                        </ul>
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

        toggleButton.onclick = function (){
            el.classList.toggle("toggled")
        }
    </script>
</body>
</html>