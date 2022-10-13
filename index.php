<?php 
  include('path.php');
  include(ROOT_PATH . '/app/database/db.php'); 
  include(ROOT_PATH . '/app/controllers/users.php');
?>

  <?php include(ROOT_PATH . '/app/includes/head.php'); ?>
  
  <title>Masterplan Educational Centre</title>
</head>
<body>
  
  <!-- Navbar -->
  <nav class="navbar">
    <div class="container">
      <a class="navbar-brand uppercase" href="index.php">
        <i class="las la-graduation-cap"></i> 
        <span>Masterplan</span><span>Educational</span><span>Centre</span>
      </a>
      <button class="navbar-toggler uppercase" onclick="toggler();" aria-controls="navbar-nav">
        <span class="las la-bars"></span> Menu
      </button>
      <ul class="navbar-nav ml-auto" id="navbar-nav" data-visible="false">
        <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
        <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
        <li class="nav-item"><a href="gallery.php" class="nav-link">Gallery</a></li>
        <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
        <?php if (isset($_SESSION["id"])): ?>
          <li class="nav-item in_use"><a href="st/profile.php" class="nav-link">
            <?php echo $_SESSION['full_name']; ?>
          </a></li>
          <li class="nav-item"><a href="logout.php" class="nav-link">Sign out</a></li>
        <?php else: ?>
          <li class="nav-item"><a href="login.php" class="nav-link">Sign In</a></li>
          <li class="nav-item"><a href="enroll.php" class="nav-link">Enroll Now</a></li>
        <?php endif; ?>
        
      </ul>
    </div>
  </nav>
  <!-- // Navbar -->

  <!-- Content Container -->
  <div class="fullheight hero">
    <div class="hero-overlay"></div>
    <div class="container">
      <div class="row align-center">
        <div class="col-medium">
          <h2 class="welcome">Welcome to</h2>
          <h2><strong>Masterplan Educational</strong> Centre</h2>
          <p class="hero-text">
            We are an institution geared at providing students with the confidence, and motivation to excel in their various 
            proposed tertiary institutions within and outside the country. Want to know more?
          </p>
          <p>
            <a href="about.php" class="btn-outline">Read more</a>
            <?php if (isset($_SESSION["id"])): ?>
              <a href="st/profile.php" class="btn-outline">Welcome back</a>
            <?php else: ?>
              <a href="enroll.php" class="btn-outline">Enroll now</a>
            <?php endif; ?>
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-- Services -->
  <div class="services">
    <marquee behavior="normal" direction="rtl" style="color: #dc3545; font-weight: 600;">
      N<i class="las la-info-circle"></i>TICE: This is to inform all students of Masterplan Educational Centre, 
      that UTME exams will begin in a week. You are all advised to revise accordingly. Best of Luck. -Masterplan
    </marquee>
    <div class="container">
      <div class="services-head">
        <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>
        <div class="services-info">
          <span class="uppercase subheading">Our Services</span>
          <h2>What We Offer</h2>
          <p>
            We have constantly strived to maintain consistency in moulding young minds for the future. Putting a few things in place,
            we know how to get the best out of our students.
          </p>
        </div>
      </div>
      <div class="column">
        <div class="d-flex">
          <div class="flex-head">
            <i class="las la-book-open"></i>
          </div>
          <div class="flex-body">
            <h3>Pre-University Lectures</h3>
            <p>Offering pre-university lectures, we give our students an incentive of being a university-like learning environment.</p>
          </div>
        </div>
        <div class="d-flex">
          <div class="flex-head">
            <i class="las la-graduation-cap"></i>
          </div>
          <div class="flex-body">
            <h3>Certified Lecturers</h3>
            <p>We have a plethora of seasoned, certified and experienced lecturers to meet our student learning standard.</p>
          </div>
        </div>
        <div class="d-flex">
          <div class="flex-head">
            <i class="las la-school"></i>
          </div>
          <div class="flex-body">
            <h3>Admission Processing</h3>
            <p>We offer admission processing into various citadels of learning, within and without the shores of Nigeria.</p>
          </div>
        </div>
        <div class="d-flex">
          <div class="flex-head">
            <i class="las la-users"></i>
          </div>
          <div class="flex-body">
            <h3>UTME Reg. Centre</h3>
            <p>Our centre is accredited by JAMB for the registration of prospective students for UTME and Post-UTME</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Achievements -->
  <div class="achievement" id="mp-counter">
    <div class="container">
      <div class="services-head">
        <div class="services-info">
          <span class="uppercase subheading">The Story So Far</span>
          <h2>Our Achievements</h2>
          <p>Established well over 15 years ago, we have come a long way in grooming young minds for the future. Our achievements are well outlined below.</p>
        </div>
      </div>
      <div class="row counter">
        <div class="story">
          <strong class="number" data-number="3000">0</strong>
          <span>Students</span>
        </div>
        <div class="story">
          <strong class="number" data-number="3">0</strong>
          <span>Tutorial Centres</span>
        </div>
        <div class="story">
          <strong class="number" data-number="500">0</strong>
          <span>Examinations</span>
        </div>
      </div>
    </div>
  </div>

  <!-- Enrollment -->
  <div class="services">
    <div class="container">
      <div class="services-head">
        <div class="services-info">
          <span class="uppercase subheading">Apply Now</span>
          <h2>Enroll with Us</h2>
          <p>
            We have constantly strived to maintain consistency in moulding young minds for the future. Putting a few things in place,
            we know how to get the best out of our students.
          </p>
        </div>
      </div>
      <div class="column">
        <div class="d-flex enroll">
          <div class="flex-head">
            <i class="las la-book-open"></i>
          </div>
          <div class="flex-body">
            <h3>Apply for UTME</h3>
            <p>Offering pre-university lectures, we give our students an incentive of being in a university-like learning environment.</p>
            <p class="img-btn"><a href="enroll.php" class="btn-green">Enroll Now</a></p>
          </div>
        </div>
        <div class="d-flex enroll">
          <div class="flex-head">
            <i class="las la-graduation-cap"></i>
          </div>
          <div class="flex-body">
            <h3>Apply for WAEC</h3>
            <p>We have a plethora of seasoned, certified and experienced lecturers to meet our student learning standard.</p>
            <p class="img-btn"><a href="enroll.php" class="btn-green">Enroll Now</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Gallery -->
  <div class="gallery">
    <div class="container">
      <div class="services-head">
        <div class="services-info">
          <span class="uppercase subheading">Our Gallery</span>
          <h2>View Our Gallery</h2>
          <p>Since inception, we have had a lot of moments that are worth remembering. Follow us as we go down memory lane.</p>
        </div>
      </div>
      <div class="grid-column">
        <div class="d-flex-alt">
          <div class="flex-body">
            <img src="assets/images/person_1.jpg" alt="">
            <p>2022/2023 Graduating Set</p>
          </div>
        </div>
        <div class="d-flex-alt">
          <div class="flex-body">
            <img src="assets/images/person_2.jpg" alt="">
            <p>2022/2023 Graduating Set</p>
          </div>
        </div>
        <div class="d-flex-alt">
          <div class="flex-body">
            <img src="assets/images/person_3.jpg" alt="">
            <p>2022/2023 Graduating Set</p>
          </div>
        </div>
        <div class="d-flex-alt">
          <div class="flex-body">
            <img src="assets/images/person_4.jpg" alt="">
            <p>2022/2023 Graduating Set</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php include(ROOT_PATH . '/app/includes/footer.php'); ?>
  
  <!-- JavaScript -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/jquery-migrate-3.0.1.min.js"></script>
  <script src="assets/js/jquery.waypoints.min.js"></script>
  <script src="assets/js/jquery.animateNumber.min.js"></script>
  <script src="assets/js/jquery.mkinfinite.js"></script>
  <script src="assets/js/main.js"></script>
  <script>
    $(document).ready(function () {
      $('.fullheight').mkinfinite({
        maxZoom: 1.4,
        animationTime: 4000,
        imagesRatio: (940 / 720),
        isFixedBG: true,
        zoomIn: true,
        imagesList: new Array(
          'assets/images/about.jpg',
          'assets/images/cat-2.jpg',
          'assets/images/cat-3.jpg',
          'assets/images/cat-4.jpg',
          'assets/images/f-2.jpg'
        )
      });
    });
  </script>

</body>
</html>