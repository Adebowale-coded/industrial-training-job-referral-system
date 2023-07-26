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
    <title>Jobs | Dashboard</title>
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
                <a href="updateprofile.php" class="list-group-item list-group-item-action bg-transparent second-text active text-white">
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




            <div class="container mt-3">
                <div class="card " style="background-color: rgb(203, 206, 206);">
                    <?php
                    $id = $_GET['id'];
                    $sql = "SELECT * FROM `offers` WHERE id = $id";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_assoc($result);

                    $companyid = $row['companyid'];
                    $sql1 = "SELECT `name` FROM  `company` WHERE id = $companyid";
                    $result1 = mysqli_query($con, $sql1);
                    $row1 = mysqli_fetch_assoc($result1);
                    ?>
                    <div class="row">
                        <div class="col pt-4 first">
                            <h3><strong><?php echo $row["jobtitle"] ?></strong></h3>
                            <p><?php echo $row1["name"] ?></p>
                            <p><?php echo $row["location"] ?> | <strong style="font-size: 12px;"><?php echo $row["type"] ?></strong></p>
                            <div>
                                <span>This Role is for</span>
                                <ul>
                                    <li>Anyone who wants to grow their career but is still struggling to gain practical experience</li>
                                    <li>Anyone who wants to secure job experience for better positioning in the job market</li>
                                    <li>Anyone who already understands and implements the concepts but wants to improve their skills, especially with current tools and techniques</li>
                                    <li>Anyone who has a lingering interest and formal training in product management, agile project management, or operations and wants to explore it further</li>
                                </ul>
                            </div>

                            <div>
                                <span>Qualification and Requirements</span>
                                <p>To be eligible for the Gooro Internship Program, applicants must have the following qualifications:</p>
                                <ul>
                                    <li>At least 1 year of experience in related roles.</li>
                                    <li>Must have taken formal training and have an undeniable interest in Product, Project, or Operations Management.</li>
                                    <li>Familiarity with project management tools, showcasing a willingness to adopt modern practices.</li>
                                    <li>Excellent written and verbal communication skills</li>
                                    <li>Problem-solving and conflict-resolution abilities.</li>
                                    <li>Outstanding organizational, time management, and planning skills.</li>
                                    <li>Attention to detail and a commitment to delivering high-quality work.</li>
                                    <li>Eagerness to learn and develop business acumen.</li>
                                    <li>Self-motivated and proactive, with the ability to work independently as well as in a team environment.</li>
                                    <li>Ability to work both independently and collaboratively in a team.</li>
                                </ul>
                            </div>
                            <div>
                                <span>Start and Duration</span>
                                <p>The Gooro Internship Program will begin on 4th September, 2023, and run for 3 months.</p>
                                <span>About</span>
                                <p>Gooro Consulting is a leading provider of Product, Project and Operations Management services.

                                    We help businesses of all sizes achieve their goals by providing them with the expertise and resources they need to succeed.

                                    Join us at Gooro Consulting to embark on an exciting journey towards a rewarding career! Apply now to be part of our second cohort Internship Program.

                                    We look forward to hearing from you!</p>

                                <p>Job Types: Part-time, Temporary, Internship</p>
                                <p>Contract length: 3 months</p>
                                <p>Part-time hours: 15 - 20 per week</p>
                                <p>Application Deadline: 31/07/2023<br />Expected Start Date: 04/09/2023</p>
                                <p>Send Application to <span class="font-style: italics;">goorohr@yahoomail.com</span></p>
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