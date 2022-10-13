<?php 
  include("path.php");
  include(ROOT_PATH . "/app/database/db.php");
  include(ROOT_PATH . "/app/controllers/users.php");
  include(ROOT_PATH . "/app/controllers/waec_users.php");
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
  <link rel="stylesheet" href="assets/css/edit.css">
  <link rel="stylesheet" href="assets/css/form.css">
  <link rel="stylesheet" href="assets/css/responsive.css">
  
  <title>Login - Masterplan Educational Centre</title>
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
        <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
        <?php if (isset($_SESSION["id"])): ?>
          <li class="nav-item in_use"><a href="st/profile.php" class="nav-link">
            <?php echo $_SESSION['full_name']; ?>
          </a></li>
          <li class="nav-item active"><a href="logout.php" class="nav-link">Sign out</a></li>
        <?php else: ?>
          <li class="nav-item active"><a href="login.php" class="nav-link">Sign In</a></li>
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
          <span class="uppercase subheading">Login</span>
          <h2>Welcome back</h2>
        </div>
      </div>
      <form action="login.php" method="POST" class="form" style="width: 21rem;">
        <!-- Steps -->
        <div class="form-step form-step-active">
          <!-- Personal Information & Enquiries -->
          <?php include(ROOT_PATH . "/app/includes/messages.php"); ?>
          <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>         

          <div class="input-group">
            <label for="full_name">Full Name (Surname First)</label>
            <input type="text" name="full_name" value="<?php echo $full_name; ?>" placeholder="e.g: Surname Firstname" required>
          </div>
          <div class="input-group">
            <label for="password">Password</label>
            <input type="password" name="password" value="<?php echo $password; ?>" placeholder="e.g: 00Abc9999" required>
          </div>
          <div class="">
            <button name="login-btn" class="btn">Sign In</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/main.js"></script>
</body>
</html>