<?php
session_start();
require("dbconn.php");
if (!isset($_SESSION['role']) && $_SESSION['role'] != "student") {
    header("Location: login.php");
}
$id = $_SESSION['id'];
$name = $_SESSION['firstname'] .  ' ' . $_SESSION['lastname'];

if (isset($_POST['submit'])) {
    $companyid = $_POST['companyid'];
    $sql = "SELECT * FROM `company` where id = $companyid";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $companyname = $row['name'];
    $rating = $_POST['rating'];
    $review = $_POST['review'];

    require("dbconn.php");
    $result = mysqli_query($con, "INSERT INTO `review`(`applicantid`, `applicantname`, `companyid`, `companyname`, `rating`, `comments`) VALUES ('$id','$name','$companyid','$companyname','$rating','$review')");

    if ($result) {
?>
        <script>
            alert("Review Successful");
            window.location.href = 'myreview.php'
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("An error occured");
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
    <title>WriteReview | Dashboard</title>
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
                    <h2 class="fs-2 m-0">Hi <?php echo $_SESSION['firstname'] .  ' ' . $_SESSION['lastname']?></h2>
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
                <h4> Write Review</h3>
            </div>

            <div class="container">
                <form class="file-upload" method="post">
                    <div class="row mb-5 gx-5">
                        <!-- Contact detail -->
                        <div class="col-xxl-8 mb-5 mb-xxl-0">
                            <div class="bg-secondary-soft px-4 py-5 rounded">
                                <div class="row g-3">
                                    <h4 class="mb-4 mt-0"></h4>
                                    <!-- First Name -->
                                    <div class="col-md-6">
                                        <label class="form-label"> Name</label>
                                        <input type="text" class="form-control" placeholder="" aria-label="First name" name="name" value="<?php echo $name ?>" disabled>
                                    </div>
                                    <!-- Last name -->
                                    <div class="col-md-6">
                                        <label class="form-label">Company Name *</label>
                                        <select class="form-control" name="companyid">
                                            <?php
                                            $sql = "SELECT * FROM `company`";
                                            $result = mysqli_query($con, $sql);

                                            while ($row = mysqli_fetch_assoc($result)) {
                                            ?>
                                                <option value="<?php echo $row['id'] ?>"><?php echo $row['name'] ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!-- Email -->

                                    <label for="inputEmail4" class="form-label">Rating</label>
                                    <div class="col-md-12 row">
                                        <div class="col">
                                            <input type="radio" name="rating" value="1" />
                                            <label for="inputEmail4" class="form-label">1</label>
                                        </div>
                                        <div class="col">
                                            <input type="radio" name="rating" value="2" />
                                            <label for="inputEmail4" class="form-label">2</label>
                                        </div>
                                        <div class="col">
                                            <input type="radio" name="rating" value="3" />
                                            <label for="inputEmail4" class="form-label">3</label>
                                        </div>
                                        <div class="col">
                                            <input type="radio" name="rating" value="4" />
                                            <label for="inputEmail4" class="form-label">4</label>
                                        </div>
                                        <div class="col">
                                            <input type="radio" name="rating" value="5" />
                                            <label for="inputEmail4" class="form-label">5</label>
                                        </div>

                                    </div>

                                    <div class="col-md-12">
                                        <label for="inputEmail4" class="form-label">Your Review</label>
                                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="review"></textarea>
                                    </div>
                                    <button class="btn btn-success" type="submit" name="submit">Send Review</button>
                                </div> <!-- Row END -->
                            </div>
                        </div>
                    </div> <!-- Row END -->
            </div>
        </div>
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