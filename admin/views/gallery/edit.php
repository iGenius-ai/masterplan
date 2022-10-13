<?php include("../../../path.php"); ?>
<?php include(ROOT_PATH . "/app/database/db.php"); ?>
<?php include(ROOT_PATH . "/app/helpers/middleware.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/gallery.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../../../assets/lineawesome/css/line-awesome.css">
  <link rel="stylesheet" href="../../assets/css/portal.css">
  <link rel="stylesheet" href="../../assets/css/table.css">
  <link rel="stylesheet" href="../../assets/css/form.css">
  <link rel="stylesheet" href="../../../assets/css/form.css">
  <link rel="stylesheet" href="../../../assets/css/responsive.css">

  <title>Edit Category | Masterplan</title>
</head>
<body>
<input type="checkbox" id="nav-toggle">
	<div class="sidebar">
		<div class="sidebar-brand">
		<h2><a href="<?php echo (BASE_URL . "index.php"); ?>"><span class="la la-xing"></span><span>Masterplan</span></a></h2>
		</div>
		<div class="sidebar-menu">
			<ul>
				<li><a href="<?php echo (BASE_URL . "admin/index.php"); ?>"><span class="las la-igloo"></span> <span>Dashboard</span></a></li>
				<li><a href="<?php echo (BASE_URL . "st/profile.php"); ?>"><span class="las la-user"></span> <span>Profile</span></a></li>
				<li><a href="<?php echo (BASE_URL . "admin/views/users/index.php"); ?>"><span class="las la-users"></span> <span>Manage Students</span></a></li>
				<li><a href="<?php echo (BASE_URL . "admin/views/gallery/index.php"); ?>"><span class="las la-image"></span> <span>Manage Gallery</span></a></li>
				<li><a href="<?php echo (BASE_URL . "admin/views/gallery/add.php"); ?>"><span class="las la-folder-open"></span> <span>Add Image Category</span></a></li>
				<li><a href="<?php echo (BASE_URL . "admin/views/images/index.php"); ?>"><span class="la la-images"></span> <span>Manage Images</span></a></li>
				<li><a href="<?php echo (BASE_URL . "admin/views/images/add.php"); ?>"><span class="las la-door-open"></span> <span>Add Image</span></a></li>
				<!-- <li><a href="#"><span class="las la-wallet"></span> <span>View Receipts</span></a></li> -->
				<li><a href="<?php echo (BASE_URL . "/logout.php"); ?>"><span class="la la-sign-out"></span> <span>Logout</span></a></li>
			</ul>
		</div>
	</div>

	<div class="main-content">
		<header>
			<h2>
				<label for="nav-toggle">
					<span class="las la-bars"></span>
				</label> Dashboard
			</h2>
			
			<!-- <div class="search-wrapper">
				<span class="las la-search"></span>
				<input type="search" placeholder="Search here">
			</div> -->

			<div class="user-wrapper">
				<img src="<?php echo BASE_URL . '/assets/uploads/' . $_SESSION['image']; ?>" width="40px" height="40px">
				<div>
					<h4><?php echo $_SESSION["full_name"]; ?></h4>
					<small><?php echo $_SESSION["nin"]; ?></small>
				</div>
			</div>
		</header>

		<main>
			<div class="profile">
        <div class="profile-heading">
          <h3 class="profile-title">Edit Category</h3>
        </div>
        <div class="profile-body">
          <div class="profile-container">
						
						<form action="add.php" method="POST" class="form" enctype="multipart/form-data">
        			<h1 class="text-center">Edit Image Category</h1>
    
							<!-- Steps -->
							<div class="form-step form-step-active">
								<!-- Personal Information -->
								<?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
								<input type="hidden" name="id" value="<?php echo $id; ?>">
								<div class="input-group">
									<label for="year_name">Image Category</label>
									<input type="text" name="year_name" value="<?php echo $year_name; ?>" placeholder="e.g: 2022">
								</div>
								<div class="input-group">
									<label for="nin">Short Description</label>
									<textarea name="description" cols="30" rows="2"><?php echo $description; ?></textarea>
								</div>
								<div class="">
									<input type="submit" name="edit_imgYear" value="Update Category" class="btn">
								</div>
							</div>
            </form>
					</div>
				</div>
			</div>
		</main>
	</div>

</body>
</html>