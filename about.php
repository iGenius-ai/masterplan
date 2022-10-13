<?php 
  include('path.php');
  include(ROOT_PATH . '/app/database/db.php'); 
  include(ROOT_PATH . '/app/controllers/users.php');
?>

  <?php include(ROOT_PATH . '/app/includes/head.php'); ?>

    <title>About - Masterplan Educational Centre</title>
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
          <li class="nav-item"><a href="index.php" class="nav-link">Home</a></li>
          <li class="nav-item active"><a href="about.php" class="nav-link">About</a></li>
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
    
    <div class="about-us">
      <div class="container">
        <div class="services-head">
          <div class="services-info">
            <span class="uppercase subheading">About Us</span>
            <h2>Learn More About Us</h2>
          </div>
        </div>
      </div>
      <div class="row about">
        <div class="about-info">
          <div class="about-overlay"></div>
          <div class="container">
            <div class="about-body">
              <h2 class="owner">The Master Plan</h2>
              <p class="lead">
                Masterplan Educational Centre seeks to deliver a balanced and rigorous Pre-university education, and
                provide students with the tools, confidence, and motivation to excel in their various proposed tertiary
                institutions within and outside the country. We also seek to provide a balanced qualitative education to inspire
                excellence in academics.
              </p>
              <p>
                We will fulfill our mission by committing to:
                <ol>
                  <li>Enhancing the learning ability, curiosity, and self-motivation of our students.</li>
                  <li>Providing our stakeholders a safe and nurturing environment.</li>
                  <li>Preparing our students to be global citizens by ensuring an international perspective for learning and promoting a diverse student body.</li>
                  <li>Developing our students as multifaceted, responsible, and socially aware citizens who pursue their goals with passion and integrity.</li>
                  <li>Attracting the best available faculty and staff, providing supportive working conditions and continuous training for optimum professional development.</li>
                </ol>
              </p>
            </div>
          </div>
        </div>
        <div class="about-info-alt">
          <div class="about-overlay"></div>
          <div class="container">
            <div class="about-body">
              <h2 class="owner">The Vision</h2>
              <p class="lead">
                At Masterplan Educational Centre, we hold ourselves responsible to every student who joins
                our community. We seek to create an environment in which students want to learn, teachers want
                to teach, and parents want to support their children's education. MEC strives for educational 
                excellence in all that we do through engagement, innovation, and a world-class international
                education that graduates students ready for colleges, polytechnics and universities.
              </p>
              <p>
                Our vision at MEC is to empower students to acquire, demonstrate, articulate and value knowledge
                and skills that will support them, as life-long learners, to participate in, and contribute to the world.
                We will provide our students with the opportunities to reach their own personal level of excellence 
                within a highly regarded edeucational program focused on academics.
              </p>
          </div>
          </div>
        </div>
      </div>
    </div>

    <div class="services">
      <div class="container">
        <div class="services-head">
          <div class="services-info">
            <span class="uppercase subheading">Meet the founder</span>
            <h2>The Man Behind Masterplan</h2>
          </div>
        </div>
        <div class="founder">
          <div class="img-circle">
            <img src="assets/images/person_4.jpg" alt="">
          </div>
          <div class="founder-info">
            <h2 class="owner">Mr. Adeniran (Masterplan)</h2>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis vero tempora, quasi voluptas eos possimus non error quas ipsum aut minima inventore quia deserunt ipsa sed consequatur dignissimos beatae maiores.
              Dolores laboriosam provident excepturi voluptatum, fugiat ipsa praesentium asperiores porro quo quia fugit, eum itaque, placeat neque. A porro fuga vel, fugiat sed odio adipisci illum libero voluptate aspernatur tenetur?
              Voluptatibus ad nam doloribus, odit optio quae unde ipsum, autem alias eius at illo aperiam, magni voluptate a quibusdam cupiditate similique laborum voluptatum. Asperiores, exercitationem impedit. Nisi beatae cum nemo?
            </p>
          </div>
        </div>
      </div>
    </div>

    <footer class="footer">
      <div class="container">
        <div class="row grid-alt">
          <div class="footer-flex">
            <div class="footer-widget">
              <h2 class="navbar-brand uppercase">
                <i class="las la-graduation-cap"></i> 
                <strong><span>Masterplan</span><span>Educational</span><span>Centre</span></strong>
              </h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
            </div>
            <ul class="footer-social list-unstyled">
              <li class="ftco-animate"><a href="#"><i class="lab la-twitter"></i></a></li>
              <li class="ftco-animate"><a href="#"><i class="lab la-facebook"></i></a></li>
              <li class="ftco-animate"><a href="#"><i class="lab la-instagram"></i></a></li>
            </ul>
          </div>
          <div class="footer-flex">
            <div class="footer-widget m-left">
              <h2 class="heading">Quick Links</h2>
              <ul class="list-unstyled">
                <li><a href="#" class="py-2 d-block">About Us</a></li>
                <li><a href="#" class="py-2 d-block">Student Community</a></li>
                <li><a href="#" class="py-2 d-block">Meet the Founder</a></li>
                <li><a href="#" class="py-2 d-block">Gallery</a></li>
                <li><a href="#" class="py-2 d-block">Code of Conduct</a></li>
                <li><a href="#" class="py-2 d-block">Terms & Conditions</a></li>
              </ul>
            </div>
          </div>
          <div class="footer-flex">
             <div class="footer-widget mb-4">
              <h2 class="heading">Contact Information</h2>
              <ul class="list-unstyled">
                <li>Block 167, First floor, Ijaiye Housing Estate, Meiran, Lagos</li>
                <li>Dimeji Int'l School Premises, Agbe Road, Abule-Egba, Lagos</li>
              </ul>
            </div>
          </div>
          <div class="footer-flex">
            <div class="footer-widget mb-4">
              <div class="block-23 mb-3">
                <ul class="list-unstyled">
                  <li><i class="las la-map-marker"></i><span class="text"> Consulting Office: 27 Adeogun Street, Off Agbado Road, Ijaiye Ojokoro, Lagos</span></li>
                  <li><a href="tel:08108478775"><i class="las la-phone"></i><span class="text"> +234 813 315 5603</span></a></li>
                  <li><a href="mailto:masterplan.edu@gmail.com"><i class="las la-mail-bulk"></i><span class="text"> masterplan.edu@gmail.com</span></a></li>
                  <li><i class="las la-clock"></i><span class="text"> Mondays &mdash; Fridays 8:00am - 5:00pm</span></li>
                  <li><i class="las la-clock"></i><span class="text"> Saturdays 9:00am - 3:00pm</span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
  
    <!-- JavaScript -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="assets/js/main.js"></script>
    
  </body>
</html>