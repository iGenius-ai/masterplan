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
  <link rel="stylesheet" href="assets/css/form.css">
  <link rel="stylesheet" href="assets/css/responsive.css">
  
  <title>Enroll - Masterplan Educational Centre</title>
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
          <li class="nav-item"><a href="logout.php" class="nav-link">Sign out</a></li>
        <?php else: ?>
          <li class="nav-item"><a href="login.php" class="nav-link">Sign In</a></li>
          <li class="nav-item active"><a href="enroll.php" class="nav-link">Enroll Now</a></li>
        <?php endif; ?>
        
      </ul>
    </div>
  </nav>
  <!-- // Navbar -->

  <div class="about-us">
    <div class="container">
      <div class="services-head">
        <div class="services-info">
          <span class="uppercase subheading">Fill a form</span>
          <h2>Enroll Here</h2>
        </div>
      </div>
      <form action="enroll.php" method="POST" class="form" enctype="multipart/form-data">
        <h1 class="text-center">Registration Form</h1>
    
        <!-- Progress bars -->
        <div class="progressBar">
          <div class="progress" id="progress"></div>
    
          <div class="progress-step progress-step-active" data-title="Personal"></div>
          <div class="progress-step" data-title="Contact"></div>
          <div class="progress-step" data-title="Institution"></div>
          <div class="progress-step" data-title="Upload"></div>
        </div>
    
        <!-- Steps -->
        <div class="form-step form-step-active">
          <!-- Personal Information -->
          <small>Fields marked (<span>*</span>) are compulsory</small>
          <?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
          
          <div class="input-group">
            <label for="full_name">Full Name (Surname First)<strong>*</strong></label>
            <input type="text" name="full_name" value="<?php echo $full_name; ?>" placeholder="e.g: Surname Firstname">
          </div>
          <div class="input-group">
            <label for="nin">National Identification Number<strong>*</strong></label>
            <input type="text" name="nin" value="<?php echo $nin; ?>" placeholder="e.g: 12345678912">
          </div>
          <div class="input-group-flex">
            <div class="input-group">
              <label for="dob">Date of Birth<strong>*</strong></label>
              <input type="date" name="dob" value="<?php echo $dob; ?>">
            </div>
            <div class="input-group">
              <label for="gender">Gender</label>
              <select name="gender" value="<?php echo $gender; ?>" id="gender">
                <option value="">Select a Gender</option>
                <option value="male">Male</option>
                <option value="female">Female</option>
              </select>
            </div>
          </div>
          <div class="input-group-flex">
            <div class="input-group">
              <label for="m-status">Marital Status</label>
              <select name="m_status" value="<?php echo $m_status; ?>" id="m_status">
                <option value="">What's your marital status?</option>
                <option value="single">Single</option>
                <option value="married">Married</option>
                <option value="divorced">Divorced</option>
              </select>
            </div>
            <div class="input-group">
              <label for="disabled">Disabilities</label>
              <select name="disabled" value="<?php echo $disabled; ?>" id="disabled">
                <option value="">What are your disabilities?</option>
                <option value="none">None</option>
                <option value="blind">Blind</option>
                <option value="deaf">Deaf</option>
                <option value="physically handicapped">Physically Handicapped</option>
              </select>
            </div>
          </div>
          <div class="input-group-flex">
            <div class="input-group">
              <label for="password">Create Password<strong>*</strong></label>
              <input type="password" name="password" value="<?php echo $password; ?>" placeholder="e.g: 01Jan2022">
            </div>
            <div class="input-group">
              <label for="c_password">Confirm Password<strong>*</strong></label>
              <input type="password" name="c_password" value="<?php echo $c_password; ?>">
            </div>
          </div>
          <div class="">
            <a href="#" class="btn btn-next width-50 ml-auto">Next</a>
          </div>
        </div>
    
        <!-- Contact Information -->
        <div class="form-step">
          <div class="input-group-flex">
            <div class="input-group">
              <label for="email">Email Address<strong>*</strong></label>
              <input type="email" name="email" value="<?php echo $email; ?>" placeholder="e.g: example@example.com">
            </div>
            <div class="input-group">
              <label for="phone">Mobile Number<strong>*</strong></label>
              <input type="tel" name="phone" value="<?php echo $phone; ?>">
            </div>
          </div>
          <div class="input-group">
            <label for="address">Residential Address</label>
            <textarea name="address" value="<?php echo $address; ?>" cols="40" rows="3"></textarea>
          </div>
          <div class="input-group-flex">
            <div class="input-group">
              <label for="nationality">Nationality</label>
              <input type="text" name="nationality" value="<?php echo $nationality; ?>">
            </div>
            <div class="input-group">
              <label for="s_origin">State of Origin</label>
              <select onchange="toggleLGA(this);" name="s_origin" value="<?php echo $s_origin; ?>" id="state">
                <option value="" selected>Select state</option>
                <option value="Abia">Abia</option>
                <option value="Adamawa">Adamawa</option>
                <option value="AkwaIbom">AkwaIbom</option>
                <option value="Anambra">Anambra</option>
                <option value="Bauchi">Bauchi</option>
                <option value="Bayelsa">Bayelsa</option>
                <option value="Benue">Benue</option>
                <option value="Borno">Borno</option>
                <option value="Cross River">Cross River</option>
                <option value="Delta">Delta</option>
                <option value="Ebonyi">Ebonyi</option>
                <option value="Edo">Edo</option>
                <option value="Ekiti">Ekiti</option>
                <option value="Enugu">Enugu</option>
                <option value="FCT">FCT</option>
                <option value="Gombe">Gombe</option>
                <option value="Imo">Imo</option>
                <option value="Jigawa">Jigawa</option>
                <option value="Kaduna">Kaduna</option>
                <option value="Kano">Kano</option>
                <option value="Katsina">Katsina</option>
                <option value="Kebbi">Kebbi</option>
                <option value="Kogi">Kogi</option>
                <option value="Kwara">Kwara</option>
                <option value="Lagos">Lagos</option>
                <option value="Nasarawa">Nasarawa</option>
                <option value="Niger">Niger</option>
                <option value="Ogun">Ogun</option>
                <option value="Ondo">Ondo</option>
                <option value="Osun">Osun</option>
                <option value="Oyo">Oyo</option>
                <option value="Plateau">Plateau</option>
                <option value="Rivers">Rivers</option>
                <option value="Sokoto">Sokoto</option>
                <option value="Taraba">Taraba</option>
                <option value="Yobe">Yobe</option>
                <option value="Zamfara">Zamafara</option>
              </select>
            </div>
          </div>
          <div class="input-group">
            <label for="lga">Local Government Area</label>
            <select class="select-lga" name="lga" value="<?php echo $lga; ?>" id="lga"></select>
          </div>
          <div class="btns-group">
            <a href="#" class="btn btn-prev">Previous</a>
            <a href="#" class="btn btn-next">Next</a>
          </div>
        </div>
    
        <!-- Choice of Institution -->
        <div class="form-step">
          <div class="input-group">
            <label for="p_name">Parent's Name</label>
            <input type="text" name="p_name" id="p_name" value="<?php echo $p_name; ?>">
          </div>
          <div class="input-group-flex">
            <div class="input-group">
              <label for="p_mobile">Parent's Mobile</label>
              <input type="text" name="p_mobile" id="p_mobile" value="<?php echo $p_mobile; ?>">
            </div>
            <div class="input-group">
              <label for="p_nin">Parent's NIN</label>
              <input type="text" name="p_nin" id="p_nin" value="<?php echo $p_nin; ?>">
            </div>
          </div>
          <div class="input-group-flex">
            <div class="input-group">
              <label for="program">Select programme<strong>*</strong></label>
              <select name="program" id="program">
                <option value="utme">UTME</option>
                <option value="waec">WAEC/NECO/GCE/NABTEB</option>
              </select>
            </div>
          </div>
          <small id="smallText"><strong>Please click next to continue</strong></small>
          <div class="input-group" id="utmeDiv">
            <label for="one_uni">First Choice (University / Polytechnic)</label>
            <input type="text" name="one_uni" id="one_uni" value="<?php echo $one_uni; ?>">
            <label for="course1">Course</label>
            <input type="text" name="course1" id="course1" value="<?php echo $course1; ?>">
          </div>
          <div class="input-group" id="utmeDiv2">
            <label for="two_uni">Second Choice (University / Polytechnic)</label>
            <input type="text" name="two_uni" id="two_uni" value="<?php echo $two_uni; ?>">
            <label for="course2">Course</label>
            <input type="text" name="course2" id="course2" value="<?php echo $course2; ?>">
          </div>
          <div class="input-group" id="utmeDiv3">
            <label for="three_uni">Third Choice (Polytechnic / Monotechnic)</label>
            <input type="text" name="three_uni" id="three_uni" value="<?php echo $three_uni; ?>">
            <label for="course3">Course</label>
            <input type="text" name="course3" id="course3" value="<?php echo $course3; ?>">
          </div>
          <div class="btns-group">
            <a href="#" class="btn btn-prev">Previous</a>
            <a href="#" class="btn btn-next">Next</a>
          </div>
        </div>
    
        <!-- Document Upload -->
        <div class="form-step">
          <div class="input-group">
            <label for="image" style="text-align: center;">Picture</label>
            <input type="file" name="image" value="<?php echo $image; ?>">
          </div>
          <div class="input-group-flex">
            <div class="input-group" id="utmeDiv4" style="flex: 0 0 35%;">
              <label for="table">UTME Subject Combinations</label>
              <table class="table">
                <thead>
                  <tr>
                    <th style="width: 50px;">S/N</th>
                    <th>UTME Subjects</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td><input type="text" name="subject1" value="<?php echo $subject1; ?>" placeholder="Enter subject here"></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td><input type="text" name="subject2" value="<?php echo $subject2; ?>" placeholder="Enter subject here"></td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td><input type="text" name="subject3" value="<?php echo $subject3; ?>" placeholder="Enter subject here"></td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td><input type="text" name="subject4" value="<?php echo $subject4; ?>" placeholder="Enter subject here"></td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="input-group" style="flex: 0 0 55%;">
              <label for="table">O'Level Type (WAEC, NECO, GCE, etc.)</label>
              <table class="table">
                <thead>
                  <tr>
                    <th style="width: 50px;">S/N</th>
                    <th>O'Level Subjects</th>
                    <th style="width: 50px;">Grades</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td><input type="text" name="waec1" value="<?php echo $waec1; ?>" placeholder="Enter subject here"></td>
                    <td><input type="text" name="grade1" value="<?php echo $grade1; ?>" placeholder="_"></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td><input type="text" name="waec2" value="<?php echo $waec2; ?>" placeholder="Enter subject here"></td>
                    <td><input type="text" name="grade2" value="<?php echo $grade2; ?>" placeholder="_"></td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td><input type="text" name="waec3" value="<?php echo $waec3; ?>" placeholder="Enter subject here"></td>
                    <td><input type="text" name="grade3" value="<?php echo $grade3; ?>" placeholder="_"></td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td><input type="text" name="waec4" value="<?php echo $waec4; ?>" placeholder="Enter subject here"></td>
                    <td><input type="text" name="grade4" value="<?php echo $grade4; ?>" placeholder="_"></td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td><input type="text" name="waec5" value="<?php echo $waec5; ?>" placeholder="Enter subject here"></td>
                    <td><input type="text" name="grade5" value="<?php echo $grade5; ?>" placeholder="_"></td>
                  </tr>
                  <tr>
                    <td>6</td>
                    <td><input type="text" name="waec6" value="<?php echo $waec6; ?>" placeholder="Enter subject here"></td>
                    <td><input type="text" name="grade6" value="<?php echo $grade6; ?>" placeholder="_"></td>
                  </tr>
                  <tr>
                    <td>7</td>
                    <td><input type="text" name="waec7" value="<?php echo $waec7; ?>" placeholder="Enter subject here"></td>
                    <td><input type="text" name="grade7" value="<?php echo $grade7; ?>" placeholder="_"></td>
                  </tr>
                  <tr>
                    <td>8</td>
                    <td><input type="text" name="waec8" value="<?php echo $waec8; ?>" placeholder="Enter subject here"></td>
                    <td><input type="text" name="grade8" value="<?php echo $grade8; ?>" placeholder="_"></td>
                  </tr>
                  <tr>
                    <td>9</td>
                    <td><input type="text" name="waec9" value="<?php echo $waec9; ?>" placeholder="Enter subject here"></td>
                    <td><input type="text" name="grade9" value="<?php echo $grade9; ?>" placeholder="_"></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
          <div class="btns-group" id="utme_btn">
            <a href="#" class="btn btn-prev">Previous</a>
            <input type="submit" name="register-btn" value="Enroll for UTME" class="btn">
          </div>
          <div class="btns-group" id="waec_btn">
            <a href="#" class="btn btn-prev">Previous</a>
            <input type="submit" name="register-waec" value="Enroll for WAEC" class="btn">
          </div>
        </div>
      </form>
    </div>
  </div>

  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/lga.min.js"></script>
  <script>
    $("#program").change(function() {
      if ($(this).val() == "utme") {
        $('#utmeDiv').show();        
        $('#utmeDiv2').show();        
        $('#utmeDiv3').show();
        $('#utmeDiv4').show();
        $('#smallText').hide();
        $('#waec_btn').hide();
        $('#utme_btn').show();
      } else {
        $('#smallText').show();
        $('#utmeDiv').hide();        
        $('#utmeDiv2').hide();        
        $('#utmeDiv3').hide();
        $('#utmeDiv4').hide();
        $('#waec_btn').show();
        $('#utme_btn').hide();
      }
    });
    $("#program").trigger("change");
  </script>
</body>
</html>