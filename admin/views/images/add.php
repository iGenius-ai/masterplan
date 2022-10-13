<?php include("../../../path.php"); ?>
<?php include(ROOT_PATH . "/app/database/db.php"); ?>
<?php include(ROOT_PATH . "/app/helpers/middleware.php"); ?>
<?php include(ROOT_PATH . "/app/controllers/images.php"); ?>

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

  <title>Add Images | Masterplan</title>
</head>
<body>
<input type="checkbox" id="nav-toggle">
	<div class="sidebar">
		<div class="sidebar-brand">
		<h2><a href="<?php echo (BASE_URL . "index.php"); ?>"><span class="la la-xing"></span><span>Masterplan</span></a></h2>
		</div>
		<div class="sidebar-menu">
			<ul>
				<li><a href="<?php echo (BASE_URL . "admin/index.php"); ?>"><span class="la la-igloo"></span> <span>Dashboard</span></a></li>
				<li><a href="<?php echo (BASE_URL . "st/profile.php"); ?>"><span class="las la-user"></span> <span>Profile</span></a></li>
				<li><a href="<?php echo (BASE_URL . "admin/views/users/index.php"); ?>"><span class="las la-users"></span> <span>Manage Students</span></a></li>
				<li><a href="<?php echo (BASE_URL . "admin/views/gallery/index.php"); ?>"><span class="las la-image"></span> <span>Manage Gallery</span></a></li>
				<li><a href="<?php echo (BASE_URL . "admin/views/gallery/add.php"); ?>"><span class="las la-folder-open"></span> <span>Add Image Category</span></a></li>
				<li><a href="<?php echo (BASE_URL . "admin/views/images/index.php"); ?>"><span class="la la-images"></span> <span>Manage Images</span></a></li>
				<li><a href="<?php echo (BASE_URL . "admin/views/images/add.php"); ?>" class="active"><span class="las la-door-open"></span> <span>Add Image</span></a></li>
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
          <h3 class="profile-title">Add Image</h3>
        </div>
        <div class="profile-body">
          <div class="profile-container">
						
						<form action="add.php" method="POST" class="form" enctype="multipart/form-data">
        			<h1 class="text-center">Add Image</h1>
    
							<!-- Steps -->
							<div class="form-step form-step-active">
								<!-- Personal Information -->
								<?php include(ROOT_PATH . "/app/helpers/formErrors.php"); ?>
								<div class="input-group">
									<label for="title">Image Name</label>
									<input type="text" name="title" value="<?php echo $title; ?>" placeholder="e.g: Enter image title">
								</div>
								<div class="input-group">
									<label for="image">Image Upload</label>
									<input type="file" name="image" value="<?php echo $image; ?>">
								</div>
								<div class="input-group">
									<label for="description">Short Description</label>
									<textarea name="description" cols="30" rows="3"><?php echo $description; ?></textarea>
								</div>
								<div class="input-group">
									<label for="">Image Category</label>
									<select name="year_id" class="text-input">
										<option value="">Please select a Topic</option>
										<?php foreach ($years as $key => $year): ?>
											<?php if (!empty($year_id) && $year_id == $year['id'] ): ?>
												<option selected value="<?php echo $year['id'] ?>"><?php echo $year['year_name'] ?></option>
											<?php else: ?>
												<option value="<?php echo $year['id'] ?>"><?php echo $year['year_name'] ?></option>
											<?php endif; ?>
										<?php endforeach; ?>
									</select>
								</div>
								<div class="">
									<input type="submit" name="add_img" value="Upload Image" class="btn">
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