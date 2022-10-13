<?php 
  
  include('../path.php');
  include(ROOT_PATH . '/app/database/db.php');
  include(ROOT_PATH . '/app/helpers/middleware.php');
  include(ROOT_PATH . '/app/controllers/users.php');

  onlyUsers();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Masterplan educational centre website">
  <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
  <link rel="stylesheet" href="../assets/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="../admin/assets/css/portal.css">
  <link rel="stylesheet" href="../assets/lineawesome/css/line-awesome.css">

  <title>Profile | Masterplan</title>
</head>
<body>

  <input type="checkbox" id="nav-toggle">
  <div class="sidebar">
    <div class="sidebar-brand">
      <h2>
        <a href="<?php echo (BASE_URL . "index.php"); ?>"><span class="la la-xing"></span><span>Masterplan</span></a>
      </h2>
    </div>
    <div class="sidebar-menu">
      <ul>
        <?php if (isset($_SESSION['id'])): ?>
          <?php if (!empty($_SESSION['admin'])): ?>
            <li>
              <a href="<?php echo (BASE_URL . "admin/index.php"); ?>"><span class="las la-igloo"></span><span>Dashboard</span></a>
            </li>
            <li>
              <a href="<?php echo (BASE_URL . "st/profile.php"); ?>" class="active"><span class="las la-user"></span> <span>Profile</span></a>
            </li>
            <li>
              <a href="<?php echo (BASE_URL . "admin/views/users/index.php"); ?>"><span class="las la-users"></span> <span>Manage Students</span></a>
            </li>
            <li>
              <a href="<?php echo (BASE_URL . "admin/views/gallery/index.php"); ?>"><span class="las la-image"></span> <span>Manage Gallery</span></a>
            </li>
            <li>
              <a href="<?php echo (BASE_URL . "admin/views/gallery/add.php"); ?>"><span class="las la-folder-open"></span> <span>Add Image Category</span></a>
            </li>
            <li>
              <a href="<?php echo (BASE_URL . "admin/views/images/index.php"); ?>"><span class="la la-images"></span> <span>Manage Images</span></a>
            </li>
            <li>
              <a href="<?php echo (BASE_URL . "admin/views/images/add.php"); ?>"><span class="las la-door-open"></span> <span>Add Image</span></a>
            </li>
          <?php else: ?>
            <li>
              <a href="<?php echo (BASE_URL . "index.php"); ?>"><span class="las la-igloo"></span> <span>Homepage</span></a>
            </li>
            <li>
              <a href="<?php echo (BASE_URL . "st/profile.php"); ?>" class="active"><span class="las la-user"></span> <span>Profile</span></a>
            </li>
          <?php endif; ?>
        <?php endif; ?>
        <li>
          <a href="pay.php"><span class="las la-wallet"></span> <span>View Receipts</span></a></li>
        <li>
          <a href="<?php echo (BASE_URL . "/logout.php"); ?>"><span class="la la-sign-out"></span> <span>Logout</span></a>
        </li>
		  </ul>
    </div>
	</div>

	<div class="main-content">
      <header>
		<h2>
		  <label for="nav-toggle"><span class="las la-bars"></span></label> Dashboard
		</h2>

		<div class="user-wrapper">

		  <?php if (isset($_SESSION["id"])): ?>
		    <img src="<?php echo BASE_URL . '/assets/uploads/' . $_SESSION['image']; ?>" alt="profile picture" width="40px" height="40px">
		    <div>
		      <h4><?php echo $_SESSION["full_name"]; ?></h4>
		      <small><?php echo $_SESSION["nin"]; ?></small>
		    </div>
		  <?php else: ?>
		    <li><a href="">Signup</a></li>
            <li><a href="">Login</a></li>
		  <?php endif; ?>

		</div>
      </header>
      
      <main>
		<?php include(ROOT_PATH . "/app/includes/messages.php"); ?>
			
		<div class="profile-card">
          <div class="single-card">
            <div>
              <h3><?php echo $_SESSION["full_name"]; ?></h3>
              <span>NIN: <?php echo $_SESSION["nin"]; ?></span>
              <span>Email: <?php echo $_SESSION["email"]; ?></span>
            </div>
            <div>
              <span class="lab la-hubspot"></span>
            </div>
          </div>
        </div>

		<div class="recent-grid">
		  <div class="projects">
		    <div class="card">
          <div class="detail__head">
		        <h2>Institution Details</h2>
          </div>
          <div class="details">
            <div class="school">
              <?php if(!empty($_SESSION['one_uni'])): ?>
                <p>First Choice: <strong><?php echo $_SESSION["one_uni"]; ?></strong></p>
                <p>Course: <strong><?php echo $_SESSION["course1"] ?></strong></p>
              <?php else: ?>
                <p>First Choice: <strong>Not set yet</strong></p>
                <p>Course: <strong>Not set yet</strong></p>
              <?php endif; ?>
            </div>
                
            <div class="school">
              <?php if(!empty($_SESSION['two_uni'])): ?>
                <p>Second Choice: <strong><?php echo $_SESSION["two_uni"]; ?></strong></p>
                <p>Course: <strong><?php echo $_SESSION["course2"]; ?></strong></p>
              <?php else: ?>
                <p>Second Choice: <strong>Not set yet</strong></p>
                <p>Course: <strong>Not set yet</strong></p>
              <?php endif; ?>
            </div>
              
            <div class="school">
              <?php if(!empty($_SESSION['three_uni'])): ?>
                <p>Third Choice: <strong><?php echo $_SESSION["three_uni"]; ?></strong></p>
                <p>Course: <strong><?php echo $_SESSION["course3"]; ?></strong></p>
              <?php else: ?>
                <p>Third Choice: <strong>Not set yet</strong></p>
                <p>Course: <strong>Not set yet</strong></p>
              <?php endif; ?>
            </div>
          </div>
        </div>
            
        <div class="card-grid">
          <div class="card">
            <div class="detail__head">
              <h2>UTME Subject Combination</h2>
            </div>
            <div class="details block_0">
              <div class="school">
                <ol>
                  <li><p> English Language </p></li>
                  <li><p> Mathematics </p></li>
                  <li><p> Physics </p></li>
                  <li><p> Chemistry</p></li>
                </ol>
              </div>
            </div>
          </div>

          <div class="card">
            <div class="detail__head">
              <h2>O Level Result</h2>
            </div>
            <div class="details">
              <div class="school waec">
                <ol>
                  <li><p> <?php echo $_SESSION['waec1']; ?> </p></li>
                  <li><p> <?php echo $_SESSION['waec2']; ?> </p></li>
                  <li><p> <?php echo $_SESSION['waec3']; ?> </p></li>
                  <li><p> <?php echo $_SESSION['waec4']; ?> </p></li>
                  <li><p> <?php echo $_SESSION['waec5']; ?> </p></li>
                  <li><p> <?php echo $_SESSION['waec6']; ?> </p></li>
                  <li><p> <?php echo $_SESSION['waec7']; ?> </p></li>
                  <li><p> <?php echo $_SESSION['waec8']; ?> </p></li>
                  <li><p> <?php echo $_SESSION['waec9']; ?> </p></li>
                </ol>
                <ol class="un_numbered">
                  <?php if(!empty($_SESSION['grade1'])): ?>
                    <li><p> <?php echo $_SESSION['grade1']; ?> </p></li>
                  <?php else: ?>
                    <li><p> A/R </p></li>
                  <?php endif; ?>
                  <?php if(!empty($_SESSION['grade2'])): ?>
                    <li><p> <?php echo $_SESSION['grade2']; ?> </p></li>
                  <?php else: ?>
                    <li><p> A/R </p></li>
                  <?php endif; ?>
                  <?php if(!empty($_SESSION['grade3'])): ?>
                    <li><p> <?php echo $_SESSION['grade3']; ?> </p></li>
                  <?php else: ?>
                    <li><p> A/R </p></li>
                  <?php endif; ?>
                  <?php if(!empty($_SESSION['grade4'])): ?>
                    <li><p> <?php echo $_SESSION['grade4']; ?> </p></li>
                  <?php else: ?>
                    <li><p> A/R </p></li>
                  <?php endif; ?>
                  <?php if(!empty($_SESSION['grade5'])): ?>
                    <li><p> <?php echo $_SESSION['grade5']; ?> </p></li>
                  <?php else: ?>
                    <li><p> A/R </p></li>
                  <?php endif; ?>
                  <?php if(!empty($_SESSION['grade6'])): ?>
                    <li><p> <?php echo $_SESSION['grade6']; ?> </p></li>
                  <?php else: ?>
                    <li><p> A/R </p></li>
                  <?php endif; ?>
                  <?php if(!empty($_SESSION['grade7'])): ?>
                    <li><p> <?php echo $_SESSION['grade7']; ?> </p></li>
                  <?php else: ?>
                    <li><p> A/R </p></li>
                  <?php endif; ?>
                  <?php if(!empty($_SESSION['grade8'])): ?>
                    <li><p> <?php echo $_SESSION['grade8']; ?> </p></li>
                  <?php else: ?>
                    <li><p> A/R </p></li>
                  <?php endif; ?>
                  <?php if(!empty($_SESSION['grade9'])): ?>
                    <li><p> <?php echo $_SESSION['grade9']; ?> </p></li>
                  <?php else: ?>
                    <li><p> A/R </p></li>
                  <?php endif; ?>
                </ol>
              </div>
            </div>
          </div>
        </div>
		  </div>
		</div>
      </main>
      
    </div>

</body>
</html>