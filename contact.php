<?php 
  include('path.php');
  include(ROOT_PATH . '/app/database/db.php'); 
  include(ROOT_PATH . '/app/controllers/users.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Stylesheets -->
  <!-- <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800" rel="stylesheet"> -->
  <link rel="stylesheet" href="assets/lineawesome/css/line-awesome.min.css">
  <link rel="stylesheet" href="assets/css/main.css">
  <link rel="stylesheet" href="assets/css/form.css">
  <link rel="stylesheet" href="assets/css/responsive.css">
  
  <title>Contact Us - Masterplan Educational Centre</title>
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
          <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>
          <li class="nav-item"><a href="gallery.php" class="nav-link">Gallery</a></li>
          <li class="nav-item active"><a href="contact.php" class="nav-link">Contact</a></li>
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

  <div class="about-us contact_form">
    <div class="contact_image"></div>
    <div class="container">
      <div class="services-head">
        <div class="services-info">
          <span class="uppercase subheading">Contact Us</span>
          <h2>Reach out to Us</h2>
          <p>
            For general enquiries, appointment scheduling, counseling, we're always available to assist.
            All you have to do, is fill the form to get in touch.
          </p>
        </div>
      </div>
      <form action="" class="form enquiry">
    
        <!-- Steps -->
        <div class="form-step form-step-active">
          <!-- Personal Information & Enquiries -->
          <div class="input-group">
            <label for="name">Full Name (Surname First)<strong>*</strong></label>
            <input type="text" name="name" id="txtStudentName" placeholder="E.g: John Doe" required>
          </div>
          <div class="input-group">
            <label for="email">Email Address<strong>*</strong></label>
            <input type="email" name="email" id="txtClass" placeholder="E.g: example@example.com" required>
          </div>
          <div class="input-group">
            <label for="message">Your Enquiry<strong>*</strong></label>
            <textarea name="message" id="msg" cols="30" rows="5" placeholder="E.g: I would like to ..." required></textarea>
          </div>
          <div class="">
            <input type="submit" value="Submit" class="btn">
          </div>
        </div>
      </form>
    </div>
  </div>

  <script src="assets/js/main.js"></script>
</body>
</html>