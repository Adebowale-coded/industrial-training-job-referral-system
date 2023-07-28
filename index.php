<?php
require("dbconn.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Internships</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="img/lg.png" rel="icon">
  <link href="img/lg.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo"><img src="img/logo2.png" class="img-fluid" /></a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="" href="signup.php">Sign Up</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div class="hero-container">
      
      <h1>We're Job Agency</h1>
      <h2>A team of Hardworking Individuals thriving to give you top Notch Updates</h2>
      <a href="#about" class="btn-get-started scrollto">Get Started</a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container">

        <div class="section-title">
          <h2>How it works</h2>
          <h3>Learn More <span>on how the system works</span></h3>
          <p>The 3 steps to improve the three-tier relationship.</p>
        </div>

        <div class="row content">
          <div class="col-lg-6 mb-5">
            <h1><strong>01</strong></h1>
            <h2>As a Student</h2>
            <p>
              Air your honest views on Companies/Organizations by rating and writing a concise review. 
              It educates others and provides the insights required to make informed decisions. Conversely, 
              read reviews on companies and other students' opinions. Send an email if you think you are up to the task!
            </p>
            <!--<ul>
              <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
              <li><i class="ri-check-double-line"></i> Duis aute irure dolor in reprehenderit in voluptate velit</li>
              <li><i class="ri-check-double-line"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat</li>
            </ul>-->
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <h1><strong>02</strong></h1>
            <h2>As a School</h2>
            <p>
              Sit on the sidelines and watch your students get competitive. Step in and give them a boost by recommending them for internship. 
              You can only recommend three students per session. Oh! you can write reviews too.
            </p>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0">
            <h1><strong>03</strong></h1>
            <h2>As a Company/Organization</h2>
            <p>
              Join other companies in the quest for the spotlight. Get in-depth reviews written by the internal team and see the interactions flow in. 
              Post available Internship opportunities for prospective Interns to apply and take care of student recommendation by schools!
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container">

        <div class="section-title">
          <h2>Services</h2>
          <h3>Available <span>IT Offers</span></h3>
          <p>View and apply for the available positions</p>
        </div>

        <div class="row" style=" border: none;">
        <?php
          $sql1 = "SELECT * FROM `offers`";
          $result1 = mysqli_query($con, $sql1);
          $idarray1 = [];
          $idarraynew1 = [];
          while ($row1 = mysqli_fetch_assoc($result1)) {
            array_push($idarray1, $row1["companyid"]);
          }
          while (count($idarraynew1) < 4) {
            $ran1 =  rand(1, count($idarray1));
            if (!in_array($ran1, $idarraynew1)) {
              array_push($idarraynew1, $ran1);
            }
          }

          for ($i = 0; $i < 4; $i++) {
            $sql = "SELECT * FROM `offers` WHERE id = $idarraynew1[$i]";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result);
            $sql1 = "SELECT `name` FROM  `company` WHERE id = $idarraynew1[$i]";
            $result1 = mysqli_query($con, $sql1);
            $row1 = mysqli_fetch_assoc($result1)
          ?>
          <div class="col-md-6 col-lg-3  mb-4 mb-lg-0">
            <div class="icon-box" style="text-align: left;">
              <h4 class="title"><a href="signup.php"><?php echo $row["jobtitle"] ?></a></h4>
              <p><?php echo $row1["name"] ?></p>
              <p class="description"><?php echo $row["type"] ?></p>
              <p class="description"><?php echo $row["location"] ?></p>
              <p style="background-color: grey; padding: 10px; color: white; border-radius: 20px;"><?php echo $row["salary"] ?></p>
            </div>
          </div >
          <?php
          }
          ?>
          

        </div>
        <a href="jobs.php" class=""><button class="btn mt-4" style="background: #ea6981; color: white;"><strong>View More</strong></button></a>
      </div>
      
    </section><!-- End Services Section -->

    

    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq">
      <div class="container">

        <div class="section-title">
          <h2>F.A.Q</h2>
          <h3>Frequently Asked <span>Questions</span></h3>
        </div>

        <ul class="faq-list">

          <li>
            <div data-bs-toggle="collapse" class="collapsed question" href="#faq1">1. How long will it take me to land a job after graduation?<i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq1" class="collapse" data-bs-parent=".faq-list">
              <p>
                The time it will take you to land a job after graduation is not certain because different factors contribute to how soon it will take you to land a job. The earlier you get the right information and tools to land a job (CV, cover letter) the sooner you land the job.
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq2" class="collapsed question">2. Is searching for a job online the best job search method? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq2" class="collapse" data-bs-parent=".faq-list">
              <p>
                In today's job market, the internet is a core tool because the world has evolved and anyone you may need to connect 
                with is available online. Yes, searching for a job online is a great job search strategy that is most useful when 
                combined with other job search methods. The truth is that it will be difficult for you to engage in an effective job
                 search without using the internet. The internet is a needed tool, whether you are searching for a job on the internet, 
                 connecting with people, creating networks, researching companies, or sending in your CV or cover letter. Not having access 
                 to the internet will make your job search a challenging one.
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq3" class="collapsed question">3. How much will I likely earn in my first job? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq3" class="collapse" data-bs-parent=".faq-list">
              <p>
                How much you will earn in your first job is dependent on some factors like your skills, the experience you have been able 
                to gather, your negotiation skills, etc. Gone are the days when companies display their salary structures publicly and
                when getting a university degree guarantees a high earning power. These days, the job market is more skill-based, 
                this means that the more in-demand skills you have, the more you may earn. We surveyed to help you know what you would earn
                 on your first job as a Nigerian. According to the survey, the average first monthly salary an employed Nigerian Graduate
                will likely earn is N47, 223. You can earn more than this depending on your qualification, the industry, your skills, etc. 
                The company that you eventually work for will also affect what you will earn in your first salary. 
                You can search for salaries of entry-level staff in any company of your choice on mysalaryscale.com
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq4" class="collapsed question">4. Do i need a good CV to land a job? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq4" class="collapse" data-bs-parent=".faq-list">
              <p>
                Yes, Having a CV is the only way you can be noticed by employers. If you do not have a CV how would employers know that 
                you have the skills and the ability to do the job? Of course, you cannot go around telling employers that you are a good 
                fit without a CV. A good CV will attract employers that will invite you for a job interview, and then who knows you may 
                just land the job. When you create a good CV, you will be on your way to a job interview in no time. In conclusion, 
                a CV highlights why you are the best person for the job.
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq5" class="collapsed question">5. Is writing a cover letter necessary? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq5" class="collapse" data-bs-parent=".faq-list">
              <p>
                We know that sometimes job seekers skip job adverts that require them to write a cover letter because they want to quickly apply for the job and move on with their lives. Does it make sense to keep applying for a job for the sake of it?
                When you are applying for a job, you are sending in your application because you want to get the job right? This is why you should always write a cover letter when you are applying for a job even if it is not required.
                Why should you write a cover letter?
                Writing a cover letter when applying for a job allows you to sell yourself to the employer and explain why you think you are the best fit for the job
              </p>
            </div>
          </li>

          <li>
            <div data-bs-toggle="collapse" href="#faq6" class="collapsed question">6. Can i apply for a job in person? <i class="bi bi-chevron-down icon-show"></i><i class="bi bi-chevron-up icon-close"></i></div>
            <div id="faq6" class="collapse" data-bs-parent=".faq-list">
              <p>
                Yes. You can apply for a job in person, but this method of application does not work for every kind of job. Gone are the days when you can go in person to apply for any kind of job, these day companies post their vacancies online or use a recruitment agency.
                Many companies do their recruitment online; because it allows them to manage the process easily without too much paper works.
                If you are looking for a job that deals directly with the customer (like sales, marketing, etc.) then you can apply in person. If you are looking for a job that requires you to use a computer, then you may have to apply online.
              </p>
            </div>
          </li>

        </ul>

      </div>
    </section><!-- End F.A.Q Section -->


    <section id="team" class="team">
      <div class="container">

        <div class="section-title">
          <h2>Companies</h2>
          <h3>Top leading <span>Organizations</span></h3>
          <p>There are leading organizations in Nigeria, you can follow them up for available opportunities</p>
        </div>

        <div class="row">

        <div class="row">
          <?php
          $sql = "SELECT * FROM `company`";
          $result = mysqli_query($con, $sql);
          $idarray = [];
          $idarraynew = [];
          while ($row = mysqli_fetch_assoc($result)) {
            array_push($idarray, $row["id"]);
          }
          while (count($idarraynew) < 4) {
            $ran =  rand(1, count($idarray));
            if (!in_array($ran, $idarraynew)) {
              array_push($idarraynew, $ran);
            }
          }

          for ($i = 0; $i < 4; $i++) {
            $sql = "SELECT * FROM `company` WHERE id = $idarraynew[$i]";
            $result = mysqli_query($con, $sql);
            $row = mysqli_fetch_assoc($result)
          ?>
            <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
              <div class="member">
                <div class="member-img">
                  <img src="assets/img/mtn.jpg" class="img-fluid" alt="">
                  <div class="social">
                    <a href="<?php echo $row["twitter"] ?>"><i class="bi bi-twitter"></i></a>
                    <a href="<?php echo $row["facebook"] ?>"><i class="bi bi-facebook"></i></a>
                    <a href="<?php echo $row["instagram"] ?>"><i class="bi bi-instagram"></i></a>
                    <a href="<?php echo $row["linkedin"] ?>"><i class="bi bi-linkedin"></i></a>
                  </div>
                </div>
                <div class="member-info">
                  <h4><?php echo $row["name"] ?></h4>
                </div>
              </div>
            </div>
          <?php
          }
          ?>

        </div>

          <a href="listcompany.php" class="align-items-center"><button class="btn mt-4" style="background: #ea6981; color: white;"><strong>View More</strong></button></a>
        </div>

      </div>
    </section><!-- End  Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title">
          <h2>Contact</h2>
          <h3>Contact <span>Us</span></h3>
          <p>Send us a feedback on your experience</p>
        </div>

        

        <div class="row mt-5">

          <div class="col-lg-4">
            <div class="info">
              <div class="address">
                <i class="bi bi-geo-alt"></i>
                <h4>Location:</h4>
                <p>Ikeja, Lagos</p>
              </div>

              <div class="email">
                <i class="bi bi-envelope"></i>
                <h4>Email:</h4>
                <p>info@interns.com</p>
              </div>

              <div class="phone">
                <i class="bi bi-phone"></i>
                <h4>Call:</h4>
                <p>+234 90 434 343</p>
              </div>

            </div>

          </div>

          <div class="col-lg-8 mt-5 mt-lg-0">

            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="row">
                <div class="col-md-6 form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
              </div>
              <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>

          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

 

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>


  <script src="assets/js/main.js"></script>

</body>

</html>