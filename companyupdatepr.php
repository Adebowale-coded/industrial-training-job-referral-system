<?php
session_start();
require("dbconn.php");
if (!isset($_SESSION['role']) && $_SESSION['role'] != "student") {
    header("Location: login.php");
}


$id = $_SESSION['id'];
$sql = "SELECT * FROM `company` where id = $id";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

if (isset($_POST['dpupdate'])) {
    $image = addslashes(file_get_contents($_FILES['dp']['tmp_name']));
    $image_name = addslashes($_FILES['dp']['name']);
    $image_size = getimagesize($_FILES['dp']['tmp_name']);

    move_uploaded_file($_FILES["dp"]["tmp_name"], "img/" . $_FILES["dp"]["name"]);
    $imagelocation = "img/" . $_FILES["dp"]["name"];


    $sql = "UPDATE `company` SET `image`='$imagelocation' WHERE id = $id";
    $result = mysqli_query($con, $sql);

    if ($result) {
        ?>
            <script>
              alert("Profile picture updated successfully")
              window.location.href = "companyprofile.php"
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


if (isset($_POST['update'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $image = $_POST['image'];
    $facebook = $_POST['facebook'];
    $instagram = $_POST['instagram'];
    $twitter = $_POST['twitter'];
    $linkedin = $_POST['linkedin'];
    $website = $_POST['website'];


    $sql = "UPDATE `company` SET `name`='$name',`email`='$email',`phone`='$phone',`address`='$address',`image`='$image',`facebook`='$facebook',`instagram`='$instagram',`twitter`='$twitter',`linkedin`='$linkedin',`website`='$website' WHERE id = $id";
    $result = mysqli_query($con, $sql);

    if ($result) {
?>
        <script>
            alert("Profile updated successfully")
            window.location.href = "companyprofile.php"
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
    <title>Company's Profile Update | Dashboard</title>
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
                <a href="companyprofile.php" class="list-group-item list-group-item-action bg-transparent second-text active text-white">
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
                    <h2 class="fs-2 m-0">Hi <?php echo $_SESSION['name'] ?></h2>
                </div>

            </nav>

            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <!-- Page title -->
                        <div class="my-3">
                            <h3>Company Profile</h3>
                            <hr>
                        </div>
                        <!-- Form START -->
                        <div class="col-lg-6 mb-4 mb-lg-0">
                            <img src="<?php echo $row['image'] ?>"  alt="">
                            <form method="post" enctype = "multipart/form-data">
                                <div>
                                    <input id="dp" type="file" name="dp" required />
                                    <button type="submit" name="dpupdate">Update</button>
                                </div>
                            </form>


                        </div>
                        <form class="file-upload" method="post">
                            <div class="row mb-5 gx-5">
                                <!-- Contact detail -->
                                <div class="col-xxl-8 mb-5 mb-xxl-0">
                                    <div class="bg-secondary-soft px-4 py-5 rounded">
                                        <div class="row g-3">

                                            <h4 class="mb-4 mt-0">Contact detail</h4>

                                            <!-- First Name -->
                                            <div class="col-md-6">
                                                <label class="form-label"> Name *</label>
                                                <input type="text" class="form-control" placeholder="" aria-label="First name" value="<?php echo $row['name'] ?>" name="name" required>
                                            </div>
                                            <!-- Phone number -->
                                            <div class="col-md-6">
                                                <label class="form-label">Phone number *</label>
                                                <input type="text" class="form-control" placeholder="+234 90 --------" aria-label="Phone number" value="<?php echo $row['phone'] ?>" name="phone" required>
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
                                        </div> <!-- Row END -->
                                    </div>
                                </div>
                            </div> <!-- Row END -->

                            <!-- Social media detail -->
                            <div class="row mb-5 gx-5">
                                <div class="col-xxl-6 mb-5 mb-xxl-0">
                                    <div class="bg-secondary-soft px-4 py-5 rounded">
                                        <div class="row g-3">
                                            <h4 class="mb-4 mt-0">Social media detail</h4>
                                            <!-- Facebook -->
                                            <div class="col-md-6">
                                                <label class="form-label"><i class="fab fa-fw fa-facebook me-2 text-facebook"></i>Facebook *</label>
                                                <input type="text" class="form-control" placeholder="" aria-label="Facebook" value="<?php echo $row['facebook'] ?>" name="facebook" required>
                                            </div>
                                            <!-- Twitter -->
                                            <div class="col-md-6">
                                                <label class="form-label"><i class="fab fa-fw fa-twitter text-twitter me-2"></i>Twitter *</label>
                                                <input type="text" class="form-control" placeholder="" aria-label="Twitter" value="<?php echo $row['twitter'] ?>" name="twitter" required>
                                            </div>
                                            <!-- Linkedin -->
                                            <div class="col-md-6">
                                                <label class="form-label"><i class="fab fa-fw fa-linkedin-in text-linkedin me-2"></i>Linkedin *</label>
                                                <input type="text" class="form-control" placeholder="" aria-label="Linkedin" value="<?php echo $row['linkedin'] ?>" name="linkedin" required>
                                            </div>
                                            <!-- Instragram -->
                                            <div class="col-md-6">
                                                <label class="form-label"><i class="fab fa-fw fa-instagram text-instagram me-2"></i>Instagram *</label>
                                                <input type="text" class="form-control" placeholder="" aria-label="Instragram" value="<?php echo $row['instagram'] ?>" name="instagram" required>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="form-label"><i class="fab fa-fw fa-globe text-globe me-2"></i>Website *</label>
                                                <input type="text" class="form-control" placeholder="" aria-label="website" value="<?php echo $row['website'] ?>" name="website" required>
                                            </div>
                                        </div> <!-- Row END -->
                                    </div>
                                </div>

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