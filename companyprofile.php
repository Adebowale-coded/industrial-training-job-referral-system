<?php
session_start();
require("dbconn.php");


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Company's Profile | Dashboard</title>
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

            <section class="bg-light">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 mb-4 mb-sm-5">
                            <div class="card card-style1 border-0">
                                <div class="card-body p-1-9 p-sm-2-3  p-lg-7">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6 mb-4 mb-lg-0">
                                            <img src="assets/img/nestle.jpg" alt="...">
                                        </div>
                                        <div class="col-lg-6 px-xl-10">
                                            <div class="bg-secondary d-lg-inline-block py-1-9 px-1-9 px-sm-6 mb-1-9 rounded">
                                                <h3 class="h2 text-white mb-0">Nestle Beverages</h3>
                                                <span class="text-primary">CEO: Adebowale Ibrahim</span>
                                            </div>
                                            <ul class="list-unstyled mb-1-9">
                                                <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Founded:</span> 2010</li>
                                                <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Companies Size:</span>20,000+</li>
                                                <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Email:</span> nestlecontact@gmail.com</li>
                                                <li class="mb-2 mb-xl-3 display-28"><span class="display-26 text-secondary me-2 font-weight-600">Website:</span> www.nestle.com</li>
                                                <li class="display-28"><span class="display-26 text-secondary me-2 font-weight-600">Phone:</span> 507 - 541 - 4567</li>
                                            </ul>
                                            <ul class="social-icon-style1 list-unstyled mb-0 ps-0">
                                                <li><a href="#!"><i class="ti-twitter-alt"></i></a></li>
                                                <li><a href="#!"><i class="ti-facebook"></i></a></li>
                                                <li><a href="#!"><i class="ti-pinterest"></i></a></li>
                                                <li><a href="#!"><i class="ti-instagram"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12 mb-4 mb-sm-5">
                            <div>
                                <span class="section-title text-primary mb-3 mb-sm-4">About the Company</span>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum qui sed esse nam delectus praesentium fuga odio sit ad error ipsam totam corporis suscipit rerum id accusantium hic eaque ex quaerat quis, amet architecto, consequatur inventore? Maiores eaque omnis mollitia laborum, minus, nihil, neque excepturi facere id rerum error animi dicta officia! Harum quo pariatur magni dolorem aspernatur ut eaque numquam culpa explicabo? Ratione, nemo modi, omnis odit quas autem illo ab nostrum id quos obcaecati inventore officia nihil mollitia perferendis dolorem expedita aperiam repellendus natus consequatur quia facilis fuga quo! Illum tempora dolore nam magnam placeat in asperiores sapiente, repellendus accusamus repudiandae, sunt facere totam modi optio! Vero recusandae soluta cupiditate quae quidem in voluptatibus laboriosam consectetur animi? Nihil doloremque eos, expedita voluptates quibusdam dolorem inventore nam pariatur dolor mollitia laboriosam, vel illo ex nesciunt, deleniti enim accusantium eaque at labore? Sint, ad, labore ducimus neque voluptatibus cupiditate vel, illo porro vero tempore laborum architecto magnam numquam perferendis repudiandae quibusdam ipsa sed quos suscipit amet exercitationem dolor commodi consequatur corporis? Autem veritatis sapiente corrupti in, hic voluptates soluta, quis reprehenderit, consequatur tempore odit cumque dolores. Ipsa omnis doloremque voluptatibus numquam fugit quisquam perspiciatis, autem quam molestias blanditiis impedit! Perspiciatis?</p>
                                <p class="mb-0">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed.</p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-12 mb-4 mb-sm-5">

                                    <div>
                                        <span class="section-title text-primary mb-3 mb-sm-4">Review this company</span>
                                        <form class="container flex-column mt-3 ms-2" style="width: 100%;" method="post"></form>
                                        <div class="mb-3 row">
                                            <div class="col">
                                                <label class="form-label"><strong>Job title</strong></label>
                                                <input type="type" class="form-control" name="dob" placeholder="" required>
                                            </div>
                                            <div class="col">
                                                <label class="form-label"><strong>Location</strong></label>
                                                <input type="type" class="form-control" name="dob" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label"><strong>Your Review</strong></label>
                                        <input type="textarea" class="form-control" name="occupation" required>
                                    </div>
                                    <button class="btn btn-success" style="background: #15395A;">Send</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>








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